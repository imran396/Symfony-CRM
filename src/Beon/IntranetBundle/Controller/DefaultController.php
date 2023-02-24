<?php

namespace Beon\IntranetBundle\Controller;

use Beon\IntranetBundle\Entity\Repository\CampaignRepository;
use Beon\IntranetBundle\Entity\Repository\NoteRepository;
use Beon\IntranetBundle\Entity\Repository\PressreleaseRepository;
use Beon\IntranetBundle\Entity\Repository\BudgetPeriodRepository;
use Beon\IntranetBundle\Entity\Repository\TaskRepository;
use Beon\IntranetBundle\Entity\User;
use Beon\IntranetBundle\Enums\TaskTypeEnum;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\SecurityContext;


class DefaultController extends Controller
{
    public function indexAction($id = null)
    {

        $securityContext = $this->get('security.context');

        /** @var $usr User */
        $usr = $securityContext->getToken()->getUser();
        $customerId = 0;
        if ($id) {
            if ($securityContext->isGranted('ROLE_STAKEHOLDERS_ALL')) {
                $customerId = $id;
            } else {
                throw new AccessDeniedException();
            }
        } else if ($customer = $usr->getCustomer()) {
            $customerId = $customer->getId();
        }

        if ($customer = $this->getDoctrine()->getRepository('IntranetBundle:Customer')->find($customerId)) {
            /** @var $campaignRepository CampaignRepository */
            $campaignRepository = $this->getDoctrine()->getRepository('IntranetBundle:Campaign');
            /** @var $noteRepository NoteRepository */
            $noteRepository = $this->getDoctrine()->getRepository('IntranetBundle:Note');
            /** @var $pressreleaseRepository PressreleaseRepository */
            $pressreleaseRepository = $this->getDoctrine()->getRepository('IntranetBundle:Pressrelease');
            /** @var  $taskRepository TaskRepository */
            $taskRepository = $this->getDoctrine()->getRepository('IntranetBundle:Task');
            /** @var $budgetRepository BudgetPeriodRepository */
            $budgetRepository = $this->getDoctrine()->getRepository('IntranetBundle:BudgetPeriod');
            $fblog = $this->getDoctrine()->getRepository('IntranetBundle:CustomerFacebookUrl')->getFlotGraphData($customerId);
            $piechartData = $campaignRepository->getDashBoardPieChartData($customerId);

            $customerIds = array_keys($this->getDoctrine()->getRepository('IntranetBundle:Customer')->getCompleteChildParentMapDown($customerId));
            $customerIds[] = $customerId;
            $campaigns = $campaignRepository->getAllByCustomer($customerIds);
            $notes = $noteRepository->getAllByCustomer($customerIds);
            $press = $pressreleaseRepository->getAllByCustomer($customerIds);
            $tasks = $taskRepository->getAllByCustomer($customerIds);

            $mergeArray = array();

            /** @var $securityContext SecurityContext */
            if ($securityContext->isGranted('ROLE_PRESSRELEASES')) {
                $mergeArray = array_merge($mergeArray, $press);
            }
            if ($securityContext->isGranted('ROLE_CAMPAIGNS')) {
                $mergeArray = array_merge($mergeArray, $campaigns);
            }
            if ($securityContext->isGranted('ROLE_NOTES')) {
                $mergeArray = array_merge($mergeArray, $notes);
            }
            if ($securityContext->isGranted('ROLE_TASKS')) {
                $mergeArray = array_merge($mergeArray, $tasks);
            }

            usort($mergeArray, array($this, 'sortByDate'));

            $budget = $budgetRepository->getAllByCustomer($customerId);

            $parameters = [
                'customerName' => $customer->getName(),
                'unifiedData' => $mergeArray,
                'fixedDates' => $noteRepository->getFutureFixedDates($customer),
                'agenda' => $noteRepository->getAgendaDates($customer),
                'piechart' => $piechartData,
                'fblog' => $fblog,
                'budgets' => $budget,
                'entity' => $customer,
            ];
        } else {
            $parameters = [
                'customerName' => null
            ];
        }

        return $this->render('IntranetBundle:Dashboard:index.html.twig', $parameters);
    }

    public function sortByDate($a, $b)
    {
        /** @var $aCreatedAt \DateTime */
        $aCreatedAt = $a['createdat'];
        /** @var $bCreatedAt \DateTime */
        $bCreatedAt = $b['createdat'];

        return $aCreatedAt->format('Y-m-d H:i:s') < $bCreatedAt->format('Y-m-d H:i:s') ? 1 : -1;

    }
}
