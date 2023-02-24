<?php

namespace Beon\IntranetBundle\Controller;

use Beon\IntranetBundle\Lib\PaginationHelper;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Beon\IntranetBundle\Entity\Timetracking;
use Beon\IntranetBundle\Lib\CheckAccess;
use Beon\IntranetBundle\Form\TimetrackingType;

/**
 * Timetracking controller.
 *
 */
class TimetrackingController extends Controller
{

    const ITEMS_ON_PAGE = 10;

    /**
     * Lists all Note entities.
     *
     */
    public function indexAction(Request $request)
    {
	/* applying filters */
	$userFilterService = $this->get('UserCustomerFilterService');
	$filterData =  $userFilterService->handleRequest('Timetracking', $this, $request);
	$repository = $filterData['repository'];
        
        /** @var $securityContext SecurityContext */
        $securityContext = $this->get('security.context');

        $callback = function($qb) use($securityContext, $repository) {
            if (!$securityContext->isGranted('ROLE_TIMETRACKINGS_ALL')) {
                if ($securityContext->isGranted('ROLE_TIMETRACKINGS_OWNGROUP')) {
                    $qb->join('obj.user', 'u');
                    $qb->andWhere('u.group = :group');
                    $qb->setParameter('group', $securityContext->getToken()->getUser()->getGroup());
                } else {
                    $qb->andWhere('obj.user = :user');
                    $qb->setParameter('user', $securityContext->getToken()->getUser());
                }
            }
            
	    if ($repository->getUserFilter()!=null) {
		$qb->andWhere('obj.user = :user');
		$qb->setParameter('user', $repository->getUserFilter());
	    }
	    
	    if ($repository->getCustomerFilter()!=null) {
		$qb->andWhere('obj.customer IN (:customerIds)');
		$qb->setParameter('customerIds', $repository->getCustomerFilter());
	    }
	    
            $qb->orderBy('obj.id', 'DESC');
        };
        
        return PaginationHelper::composeFilterIndexWithUserCheck($this, $request, 'Timetracking', self::ITEMS_ON_PAGE, $callback, $filterData);
    }

    /**
     * Creates a new Timetracking entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Timetracking();
        if (array_key_exists('campaign', $request->request->get('Timetracking'))) {
            $mode = 'campaign';
        } else if (array_key_exists('task', $request->request->get('Timetracking'))) {
            $mode = 'task';
        } else {
            $mode = 'customer';
        }
        $form = $this->createCreateForm($entity, $mode);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $entity->checkConsitency();
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('timetracking_show', array('id' => $entity->getId())));
        }

        return $this->render('IntranetBundle:Timetracking:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Timetracking entity.
     *
     * @param Timetracking $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Timetracking $entity, $mode = 'customer')
    {
        $form = $this->createForm(new TimetrackingType(), $entity, array(
            'action' => $this->generateUrl('timetracking_create'),
            'method' => 'POST',
            'mode' => $mode,
        ));

        $form->add('submit', 'submit', array('label' => 'Create','attr'=> array('class' =>'btn btn-table-actions')));

        return $form;
    }

    /**
     * Displays a form to create a new Timetracking entity.
     *
     */
    public function newAction()
    {
        $entity = new Timetracking();
        $form   = $this->createCreateForm($entity);

        return $this->render('IntranetBundle:Timetracking:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Timetracking entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IntranetBundle:Timetracking')->find($id);

        CheckAccess::userWithTimetracking($entity);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Timetracking entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IntranetBundle:Timetracking:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Timetracking entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IntranetBundle:Timetracking')->find($id);

        CheckAccess::userWithTimetracking($entity);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Timetracking entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IntranetBundle:Timetracking:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Timetracking entity.
    *
    * @param Timetracking $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Timetracking $entity)
    {
        if ($entity->getCampaign()) {
            $mode = 'campaign';
        } else if ($entity->getTask()) {
            $mode = 'task';
        } else {
            $mode = 'customer';
        }
        $form = $this->createForm(new TimetrackingType(), $entity, array(
            'action' => $this->generateUrl('timetracking_update', array('id' => $entity->getId())),
            'method' => 'PUT',
            'mode' => $mode,
        ));

        $form->add('submit', 'submit', array('label' => 'Update','attr'=> array('class' =>'btn btn-table-actions')));

        return $form;
    }
    /**
     * Edits an existing Timetracking entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IntranetBundle:Timetracking')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Timetracking entity.');
        }

        CheckAccess::userWithTimetracking($entity);

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $entity->checkConsitency();
            $em->flush();

            return $this->redirect($this->generateUrl('timetracking_show', array('id' => $id)));
        }

        return $this->render('IntranetBundle:Timetracking:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Timetracking entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IntranetBundle:Timetracking')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Timetracking entity.');
            }

            CheckAccess::userWithTimetracking($entity);

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('timetracking'));
    }

    /**
     * Creates a form to delete a Timetracking entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('timetracking_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete','attr'=> array('class' =>'btn btn-table-actions')))
            ->getForm()
        ;
    }
    
}
