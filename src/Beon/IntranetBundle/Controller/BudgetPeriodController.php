<?php

namespace Beon\IntranetBundle\Controller;

use Beon\IntranetBundle\Entity\Customer;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Beon\IntranetBundle\Entity\BudgetPeriod;
use Beon\IntranetBundle\Lib\CheckAccess;
use Beon\IntranetBundle\Form\BudgetPeriodType;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * BudgetPeriod controller.
 *
 */
class BudgetPeriodController extends Controller
{

    /**
     * Lists all BudgetPeriod entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('IntranetBundle:BudgetPeriod')->findAll();

        return $this->render('IntranetBundle:BudgetPeriod:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new BudgetPeriod entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new BudgetPeriod();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);

            $customerId = null;

            if ($form->get('customer_id')->getData()) {
                $customerId = $form->get('customer_id')->getData();
                /** @var $customer Customer */
                $customer = $em->getRepository('IntranetBundle:Customer')->find($customerId);
                $customer->addBudgetPeriod($entity);
                $em->persist($customer);
            }

            $em->flush();

            if ($customerId) {
                return $this->redirect($this->generateUrl('customer_show', ['id' => $customerId]));
            }

            return $this->redirect($this->generateUrl('budgetperiod_show', array('id' => $entity->getId())));
        }

        return $this->render('IntranetBundle:BudgetPeriod:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a BudgetPeriod entity.
     *
     * @param BudgetPeriod $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(BudgetPeriod $entity)
    {
        $form = $this->createForm(new BudgetPeriodType(), $entity, array(
            'action' => $this->generateUrl('budgetperiod_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create','attr'=> array('class' =>'btn btn-table-actions')));

        return $form;
    }

    /**
     * Displays a form to create a new BudgetPeriod entity.
     *
     */
    public function newAction(Request $request)
    {

        /** @var $budgetPeriod BudgetPeriod */
        $budgetPeriod = new BudgetPeriod();
        $form = $this->createCreateForm($budgetPeriod);

        if (isset($request->request->get('form')['customer_id'])) {
            $customerId = $request->request->get('form')['customer_id'];

            /** @var $repository EntityRepository */
            $repository = $this->getDoctrine()
                ->getRepository('IntranetBundle:BudgetPeriod');

            /** @var $result BudgetPeriod */
            $result = $repository->createQueryBuilder('b')
                ->where('b.customer = :customerId')
                ->setParameter('customerId', $customerId)
                ->orderBy('b.end', 'DESC')
                ->getQuery()
                ->setMaxResults(1)
                ->getOneOrNullResult();

            $start = $result ? $result->getEnd()->add(new \DateInterval('P1D')) : new \DateTime();

            $form->get('start')->setData($start);
            $form->get('end')->setData(new \DateTime($start->format('Y') . '-12-31'));

            $form->get('customer_id')->setData($customerId);
        }

        return $this->render('IntranetBundle:BudgetPeriod:new.html.twig', array(
            'entity' => $budgetPeriod,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a BudgetPeriod entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IntranetBundle:BudgetPeriod')->find($id);
        CheckAccess::userWithBudgetPeriod($entity);
        $customerId = $entity->getCustomer()->getId();

        $campaignRepository = $this->getDoctrine()->getRepository('IntranetBundle:Campaign');

        $piechartData = $campaignRepository->getPieChartData($customerId,$entity);
        if ($piechartData) {
            $piechartData = array($piechartData);
        }

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BudgetPeriod entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        
        $ttArr = $em->getRepository('IntranetBundle:Timetracking')->findByBudgetPeriod($entity);

        return $this->render('IntranetBundle:BudgetPeriod:show.html.twig', array(
            'entity' => $entity,
            'piechart' => $piechartData,
            'delete_form' => $deleteForm->createView(),
            'ttData' => $ttArr['data'],
            'ttMonths' => $ttArr['months'],
        ));
    }

    /**
     * Displays a form to edit an existing BudgetPeriod entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IntranetBundle:BudgetPeriod')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BudgetPeriod entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IntranetBundle:BudgetPeriod:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a BudgetPeriod entity.
     *
     * @param BudgetPeriod $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(BudgetPeriod $entity)
    {
        $form = $this->createForm(new BudgetPeriodType(), $entity, array(
            'action' => $this->generateUrl('budgetperiod_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update','attr'=> array('class' =>'btn btn-table-actions')));

        return $form;
    }

    /**
     * Edits an existing BudgetPeriod entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IntranetBundle:BudgetPeriod')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BudgetPeriod entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('budgetperiod_edit', array('id' => $id)));
        }

        return $this->render('IntranetBundle:BudgetPeriod:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a BudgetPeriod entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        $customerId = null;

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            /** @var $entity BudgetPeriod */
            $entity = $em->getRepository('IntranetBundle:BudgetPeriod')->find($id);
            $customerId = $entity->getCustomer()->getId();

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BudgetPeriod entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        if ($customerId) {
            return $this->redirect($this->generateUrl('customer_show', ['id' => $customerId]));
        }

        return $this->redirect($this->generateUrl('customer'));
    }

    /**
     * Creates a form to delete a BudgetPeriod entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('budgetperiod_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete','attr'=> array('class' =>'btn btn-table-actions')))
            ->getForm();
    }
}
