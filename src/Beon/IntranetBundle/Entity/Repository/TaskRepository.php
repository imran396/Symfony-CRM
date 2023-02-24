<?php
/**
 * User: LITVAN
 * Date: 4/16/14
 * Time: 10:22 PM
 */

namespace Beon\IntranetBundle\Entity\Repository;


use Beon\IntranetBundle\Entity\Customer;
use Beon\IntranetBundle\Entity\User;
use Beon\IntranetBundle\Enums\CustomerLevelEnum;
use Beon\IntranetBundle\Enums\TaskStatusEnum;
use Beon\IntranetBundle\Enums\LogActionEnum;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Beon\IntranetBundle\Enums\TaskApprovalReminderDelayEnum;

class TaskRepository extends EntityRepository
{
    const ITEMS_ON_PAGE = 10;

    public function findDuplicates($taskIds, $exclude = 0) {
        if (!is_array($taskIds)) {
            $task = $taskIds;
            $exclude = $task->getId();
            $taskIds = array($task->getId() => 1);
            if ($task->getDuplicateOf()) {
                $taskIds[$task->getDuplicateOf()->getId()] = 1;
            }
        }
        $result = $this->createQueryBuilder('t')
            ->select( 't.id as tid, IDENTITY(t.duplicateOf) as parent' )
            ->where('t.duplicateOf IN (:taskIds) OR t.id IN (:taskIds)')
            ->setParameter(':taskIds', array_keys($taskIds))
            ->getQuery()
            ->getResult();

        $needsRerun = false;
        foreach ($result as $row) {
            if (!isset($taskIds[$row['tid']])) {
                $taskIds[$row['tid']] = 1;
                $needsRerun = true;
            }
            if ($row['parent'] && !isset($taskIds[$row['parent']])) {
                $taskIds[$row['parent']] = 1;
                $needsRerun = true;
            }
        }

        if ($needsRerun) {
            return $this->findDuplicates($taskIds, $exclude);
        } else {
            return $this->createQueryBuilder('t')
            ->where('t.id IN (:taskIds) AND t.id != :exclude')
            ->setParameter(':taskIds', array_keys($taskIds))
            ->setParameter(':exclude', $exclude)
            ->getQuery()
            ->getResult();
        }
    }

    public function forCustomerView(Customer $customer, $type = null)
    {
        if (!$customer) {
            return null;
        }

        /** @var $customerRepository CustomerRepository */
        $customerRepository = $this->getEntityManager()->getRepository('IntranetBundle:Customer');

        $qb = $this->qbTasksForCustomer($customer);
        $customers = $customerRepository->findStakeholdersRegardingToLevel($customer);

        if ($customers) {
            $qb->orWhere('t.customer IN (:customerChildren)')->setParameter(':customerChildren', $customers);
        }

        if ($type !== null) {
            $qb->andWhere($qb->expr()->eq('t.type', $type));
        }

        return $qb
            ->addOrderBy('t.dueDate', 'ASC')
            ->addOrderBy('t.status', 'DESC')
            ->getQuery()->getResult();
    }

    private function qbTasksForCustomer($customer, $qb = null, $isParent = false)
    {
        /** @var $qb QueryBuilder */
        $qb = $qb ? $qb : $this->createQueryBuilder('t');

        /** @var $customer Customer */
        $qb->orWhere('t.customer=:customerid')
            ->setParameter(':customerid', $customer->getId());

//        if (!$isParent) {
//            $qb->orWhere('t.campaign in (:campaigns' . $customer->getId() . ')')
//               ->setParameter(':campaigns' . $customer->getId(), $customer->getCampaigns()->toArray());
//        }

        return $qb;
    }


    /**
     * @param int $page
     * @param \Beon\IntranetBundle\Entity\User|null $chosenUser
     * @param \Beon\IntranetBundle\Entity\Customer|null $chosenCustomer
     * @param int $itemsOnPage
     * @return array
     */
    public function findDone($page = 0, $chosenUser = null, $chosenCustomer = null, $itemsOnPage = self::ITEMS_ON_PAGE)
    {
        $qb = $this->qbWithStatus(TaskStatusEnum::DONE);

        return $this->postProcessSelect($qb, $page, $chosenUser, $chosenCustomer, $itemsOnPage);
    }

    /**
     * @param int $page
     * @param \Beon\IntranetBundle\Entity\User|null $chosenUser
     * @param \Beon\IntranetBundle\Entity\Customer|null $chosenCustomer
     * @param int $itemsOnPage
     * @return array
     */
    public function findAborted(
        $page = 0,
        $chosenUser = null,
        $chosenCustomer = null,
        $itemsOnPage = self::ITEMS_ON_PAGE
    ) {
        $qb = $this->qbWithStatus(TaskStatusEnum::ABORTED);

        return $this->postProcessSelect($qb, $page, $chosenUser, $chosenCustomer, $itemsOnPage);
    }


    /**
     * @param int $page
     * @param \Beon\IntranetBundle\Entity\User|null $chosenUser
     * @param \Beon\IntranetBundle\Entity\Customer|null $chosenCustomer
     * @param int $itemsOnPage
     * @return array
     */
    public function findInProgress(
        $page = 0,
        $chosenUser = null,
        $chosenCustomer = null,
        $itemsOnPage = self::ITEMS_ON_PAGE
    ) {
        $qb = $this->qbWithStatus(TaskStatusEnum::IN_PROGRESS);

        return $this->postProcessSelect($qb, $page, $chosenUser, $chosenCustomer, $itemsOnPage);
    }

    /**
     * @param int $page
     * @param \Beon\IntranetBundle\Entity\User|null $chosenUser
     * @param \Beon\IntranetBundle\Entity\Customer|null $chosenCustomer
     * @param int $itemsOnPage
     * @return array
     */
    public function findInternalWait(
        $page = 0,
        $chosenUser = null,
        $chosenCustomer = null,
        $itemsOnPage = self::ITEMS_ON_PAGE
    ) {
        $qb = $this->createQueryBuilder('t')
            ->andWhere('t.status IN (:approvalstates)')
            ->setParameter('approvalstates', TaskStatusEnum::getApprovalStates())
            ->andWhere('t.internalapprovalmailsent = true')
            ->andWhere('t.approvalmailsent = false')
            ->andWhere('t.approved = false')
            ->orderBy('t.dueDate', 'DESC');

        return $this->postProcessSelect($qb, $page, $chosenUser, $chosenCustomer, $itemsOnPage);
    }

    /**
     * @param int $page
     * @param \Beon\IntranetBundle\Entity\User|null $chosenUser
     * @param \Beon\IntranetBundle\Entity\Customer|null $chosenCustomer
     * @param int $itemsOnPage
     * @return array
     */
    public function findExternalWait(
        $page = 0,
        $chosenUser = null,
        $chosenCustomer = null,
        $itemsOnPage = self::ITEMS_ON_PAGE
    ) {
        $qb = $this->createQueryBuilder('t')
            ->andWhere('t.status IN (:approvalstates)')
            ->setParameter('approvalstates', TaskStatusEnum::getApprovalStates())
            ->andWhere('t.approvalmailsent = true')
            ->andWhere('t.approved = false')
            ->orderBy('t.dueDate', 'DESC');

        return $this->postProcessSelect($qb, $page, $chosenUser, $chosenCustomer, $itemsOnPage);
    }


    /**
     * @param int $page
     * @param \Beon\IntranetBundle\Entity\User|null $chosenUser
     * @param \Beon\IntranetBundle\Entity\Customer|null $chosenCustomer
     * @param int $itemsOnPage
     * @return array
     */
    public function findApproved(
        $page = 0,
        $chosenUser = null,
        $chosenCustomer = null,
        $itemsOnPage = self::ITEMS_ON_PAGE
    ) {
        $qb = $this->createQueryBuilder('t')
            ->andWhere('t.status IN (:approvalstates)')
            ->setParameter('approvalstates', TaskStatusEnum::getApprovalStates())
            ->andWhere('t.approved = true')
            ->orderBy('t.dueDate', 'DESC');

        return $this->postProcessSelect($qb, $page, $chosenUser, $chosenCustomer, $itemsOnPage);
    }


    /**
     * @param int $page
     * @param \Beon\IntranetBundle\Entity\User|null $chosenUser
     * @param \Beon\IntranetBundle\Entity\Customer|null $chosenCustomer
     * @param int $itemsOnPage
     * @return array
     */
    public function findPrinting(
        $page = 0,
        $chosenUser = null,
        $chosenCustomer = null,
        $itemsOnPage = self::ITEMS_ON_PAGE
    ) {
        $qb = $this->qbWithStatus(TaskStatusEnum::PRINTING);

        return $this->postProcessSelect($qb, $page, $chosenUser, $chosenCustomer, $itemsOnPage);
    }

    /**
     * @param int $page
     * @param \Beon\IntranetBundle\Entity\User|null $chosenUser
     * @param \Beon\IntranetBundle\Entity\Customer|null $chosenCustomer
     * @param int $itemsOnPage
     * @return array
     */
    public function findThirdPartyWait(
        $page = 0,
        $chosenUser = null,
        $chosenCustomer = null,
        $itemsOnPage = self::ITEMS_ON_PAGE
    ) {
        $qb = $this->qbWithStatus(TaskStatusEnum::THIRD_PARTY_WAIT);

        return $this->postProcessSelect($qb, $page, $chosenUser, $chosenCustomer, $itemsOnPage);
    }


    /**
     * @param int $page
     * @param \Beon\IntranetBundle\Entity\User|null $chosenUser
     * @param \Beon\IntranetBundle\Entity\Customer|null $chosenCustomer
     * @param int $itemsOnPage
     * @return array
     */
    public function findNotStarted(
        $page = 0,
        $chosenUser = null,
        $chosenCustomer = null,
        $itemsOnPage = self::ITEMS_ON_PAGE
    ) {
        $qb = $this->qbWithStatus(TaskStatusEnum::NOT_STARTED);

        return $this->postProcessSelect($qb, $page, $chosenUser, $chosenCustomer, $itemsOnPage);
    }


    /**
     * @param $status
     * @param \Beon\IntranetBundle\Entity\User $chosenUser
     * @return \Doctrine\ORM\QueryBuilder
     */
    private function qbWithStatus($status, $chosenUser = null)
    {
        $qb = $this->createQueryBuilder('t')
            ->where('t.status = :status')
            ->setParameter(':status', $status)
            ->orderBy('t.dueDate', 'ASC');

        if (in_array($status, TaskStatusEnum::getApprovalStates())) {
            $qb->andWhere('t.internalapprovalmailsent = false');
            $qb->andWhere('t.approvalmailsent = false');
            $qb->andWhere('t.approved = false');
        }

        return $qb;
    }

    public function getSupplierTask($supplier)
    {
        return $this
            ->createQueryBuilder('c')
            ->leftJoin('c.campaign', 's')
            ->where('s.supplier = :supplier')
            ->setParameter('supplier', $supplier)
            ->getQuery()
            ->getResult();

    }

    public function getSupplierGroupCampaignTask($supplierGroup)
    {
        return $this
            ->createQueryBuilder('b')
            ->leftJoin('b.campaign', 'c')
            ->leftJoin('c.supplier', 's')
            ->where('s.group = :supplierGroup')
            ->setParameter('supplierGroup', $supplierGroup)
            ->getQuery()
            ->getResult();
    }

    public function insertDuplicateTaskByStakeHolderChildren($task, $customer)
    {

        $uploads = $this->getEntityManager()->getRepository('IntranetBundle:Upload')->findBy(
            array('task' => $task)
        );
        $newTask = clone $task;
        $newTask->setCustomer($customer);
        $newTask->setDuplicateOf($task);
        $newTask->resetState();
        $this->_em->persist($newTask);

        foreach ($uploads as $upload) {
            $newupload = clone $upload;
            $newupload->setTask($newTask);
            $this->_em->persist($newupload);
        }

        $this->_em->flush();
    }


    private function postProcessSelect(QueryBuilder $qb, $page, $chosenUser, $chosenCustomer, $itemsOnPage)
    {
        if ($chosenUser && !is_array($chosenUser)) {
            $qb->andWhere('t.user = :user')
                ->setParameter(':user', $chosenUser);
        } elseif ($chosenUser && is_array($chosenUser)) {
            $qb->andWhere('t.user IN (:users)')
                ->setParameter(':users', $chosenUser);
        }

        if ($chosenCustomer) {
            $qb->andWhere('t.customer IN (:customers)')
                ->setParameter(':customers', $chosenCustomer);
        }

        if ($page >= 0) {
            $qb->setFirstResult($page * $itemsOnPage);
            $qb->setMaxResults($itemsOnPage);

            return $qb->getQuery()->getResult();
        } else {
            $qb->select('count(t.id)');

            return ceil($qb->getQuery()->getSingleScalarResult() / $itemsOnPage);
        }
    }

    public function findCronApprovalData()
    {
        $qb = $this->createQueryBuilder('t')
            ->andWhere('t.approved = false')
            ->andWhere('t.serializedApprovalMail is not NULL')
            ->andWhere('t.status IN (:status)')
            ->setParameter('status', TaskStatusEnum::getApprovalStates());

        TaskApprovalReminderDelayEnum::amendQueryBuilder($qb);

        return $qb->getQuery()->execute();
    }

    public function findCronOverdueData($dueDate)
    {
        $result = $this->createQueryBuilder('t')
            ->leftJoin('t.logs', 'l', 'WITH', 'l.action IN (:action)')
            ->andWhere('t.dueDate < :dueDate')
            ->having('COALESCE(MAX(l.createdAt), 0) < :dueDate')
    	    ->andWhere('t.internalapprovalmailsent = false')
    	    ->andWhere('t.approvalmailsent = false')
            ->andWhere('t.approved = false')

            ->andWhere('t.status IN (:status)')
            ->groupBy('t.id')
            ->orderBy('t.dueDate')
            ->setParameter('action', [LogActionEnum::NOTIFIED, LogActionEnum::OVERDUE_REMINDER_SENT])
            ->setParameter('status', TaskStatusEnum::getApprovalStates())
            ->setParameter('dueDate', $dueDate);

        return $result->getQuery()->execute();
    }
    
    public function getAllByCustomer($customer_ids = null)
    {
        $result = $this
            ->createQueryBuilder('t')
            ->select(
                't.title,t.id,t.dueDate,t.description,t.createdAt as createdat ,t.id as task, t.approved, t.approvalmailsent'
            )
            ->where('t.customer IN(:customers)')
            ->setParameter('customers', $customer_ids)
            ->orderBy('t.createdAt', 'DESC')
            ->getQuery()
            ->getResult();

        return $this->reformateTimelineTaskResult($result);
    }

    public function reformateTimelineTaskResult($result)
    {
        foreach ($result as $key => $value) {
            if ($value['createdat'] == null) {
                $result[$key]['createdat'] = $value['dueDate'];
            }
            if ($value['title'] == null) {
                $cut = substr($value['description'], 0, 40);
                $result[$key]['title'] = ($value['description'] == $cut) ? $cut : $cut . ' ...';
            }
        }

        return $result;
    }
}
