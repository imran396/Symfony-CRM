<?php

namespace Beon\IntranetBundle\Controller;

use Beon\IntranetBundle\Entity\SupplierGroupContact;
use Beon\IntranetBundle\Entity\Upload;
use Beon\IntranetBundle\Form\SupplierType;
use Beon\IntranetBundle\Helper\FormHelper;
use Beon\IntranetBundle\Lib\PaginationHelper;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Beon\IntranetBundle\Entity\SupplierGroup;
use Beon\IntranetBundle\Form\SupplierGroupType;
use Beon\IntranetBundle\Entity\Repository\CampaignRepository;
use Beon\IntranetBundle\Entity\Supplier;

/**
 * SupplierGroup controller.
 *
 */
class SupplierGroupController extends Controller
{
    const ITEMS_ON_PAGE = 10;

    /**
     * Lists all SupplierGroup entities.
     *
     */
    public function indexAction(Request $request)
    {
	    /* applying filters */
	    $userFilterService = $this->get('UserCustomerFilterService');
	    $filterData =  $userFilterService->handleRequest('SupplierGroup', $this, $request);
	    $repository = $filterData['repository'];
	
        $callback = function($qb) use($repository) {
            if ($repository->getPlainTextFilter()) {
                $qb->andWhere('obj.id = :id OR obj.name LIKE :query');
                $qb->setParameter('id', intval($repository->getPlainTextFilter()));
                $qb->setParameter('query', '%' . $repository->getPlainTextFilter() . '%');
            }
            $qb->orderBy('obj.name', 'ASC');
	    };
        
        return PaginationHelper::composeFilterIndex($this, $request, 'SupplierGroup', self::ITEMS_ON_PAGE, $callback, $filterData);
    }

    /**
     * Creates a new SupplierGroup entity.
     *
     */

    public function createAction(Request $request)
    {
        $entity = new SupplierGroup();
        $form = $this->createCreateForm($entity);
        $form->add('contact_id', 'hidden', array('mapped' => false));
        $formData = $request->request->get('beon_intranetbundle_suppliergroup');
        $contactId = isset($formData['contact_id'])?$formData['contact_id']:null;
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

             if($contactId){
                $backPath = $this->generateUrl('contact_show', array('id' => $contactId));
                $contact = $em->getRepository('IntranetBundle:Contact')->find($contactId);
                $contact->addSupplierGroup($entity);
                $em->persist($contact);
                $em->flush();
                return $this->redirect($backPath);
            }

            return $this->redirect($this->generateUrl('suppliergroup_show', array('id' => $entity->getId())));
        }

        return $this->render(
            'IntranetBundle:SupplierGroup:new.html.twig',
            array(
                'entity' => $entity,
                'form' => $form->createView(),
            )
        );
    }

    /**
     * Creates a form to create a SupplierGroup entity.
     *
     * @param SupplierGroup $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(SupplierGroup $entity)
    {
        $form = $this->createForm(
            new SupplierGroupType(),
            $entity,
            array(
                'action' => $this->generateUrl('suppliergroup_create'),
                'method' => 'POST',
            )
        );

        $form->add('submit', 'submit', array('label' => 'Create','attr'=> array('class' =>'btn btn-table-actions')));

        return $form;
    }

    /**
     * Displays a form to create a new SupplierGroup entity.
     *
     */
    public function newAction(Request $request)
    {
        $entity = new SupplierGroup();
        $form = $this->createCreateForm($entity);

        $formData = $request->request->get('form');

        if (isset($formData['contact_id'])) {
            $contactId = $formData['contact_id'];
            $backPath = $this->generateUrl('contact_edit', array('id' => $contactId));
            $form->add('contact_id', 'hidden', array('data' => $contactId, 'mapped' => false));
            $form->remove('contact');
        }

        return $this->render(
            'IntranetBundle:SupplierGroup:new.html.twig',
            array(
                'entity' => $entity,
                'form' => $form->createView(),
            )
        );
    }

    /**
     * Finds and displays a SupplierGroup entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IntranetBundle:SupplierGroup')->find($id);
        $campaign = $em->getRepository('IntranetBundle:Campaign')->getSupplierGroupCampaign($entity);
        $task = $em->getRepository('IntranetBundle:Task')->getSupplierGroupCampaignTask($entity);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SupplierGroup entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render(
            'IntranetBundle:SupplierGroup:show.html.twig',
            array(
                'entity' => $entity,
                'campaign' => $campaign,
                'task' => $task,
                'delete_form' => $deleteForm->createView(),
            )
        );
    }

    /**
     * Creates a form to delete a SupplierGroup entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('suppliergroup_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete','attr'=> array('class' =>'btn btn-table-actions')))
            ->getForm();
    }

    /**
     * Displays a form to edit an existing SupplierGroup entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        /** @var $entity SupplierGroup */
        $entity = $em->getRepository('IntranetBundle:SupplierGroup')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SupplierGroup entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        $uploadDorms = array();
        /** @var $upload Upload */

        foreach ($entity->getUploads() as $upload) {
            $uploadDorms[$upload->getId()] = FormHelper::composeDeleteForm(
                $this,
                array(
                    'action' => 'upload_delete',
                    'actionParameters' => array('id' => $upload->getId()),
                    'redirectPath' => 'suppliergroup_edit',
                    'redirectParams' => array('id' => $entity->getId()),
                )
            );
        }

        $uploadFileForm = $this->createFormBuilder()
            ->setAction($this->generateUrl('upload_new'))
            ->add('presenter', 'hidden', array('data' => 'supplierGroup'))
            ->add('presenterId', 'hidden', array('data' => $entity->getId()))
            ->add('submit', 'submit', array('label' => 'Upload file','attr'=> array('class' =>'btn btn-table-actions')))
            ->getForm();

        return $this->render(
            'IntranetBundle:SupplierGroup:edit.html.twig',
            array(
                'entity' => $entity,
                'edit_form' => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
                'upload_file_form' => $uploadFileForm->createView(),
                'uploadDeleteForms' => $uploadDorms
            )
        );
    }

    /**
     * Creates a form to edit a SupplierGroup entity.
     *
     * @param SupplierGroup $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(SupplierGroup $entity)
    {
        $form = $this->createForm(
            new SupplierGroupType(),
            $entity,
            array(
                'action' => $this->generateUrl('suppliergroup_update', array('id' => $entity->getId())),
                'method' => 'PUT',
            )
        );

        $form->add('submit', 'submit', array('label' => 'Update','attr'=> array('class' =>'btn btn-table-actions')));

        return $form;
    }

    /**
     * Edits an existing SupplierGroup entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IntranetBundle:SupplierGroup')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SupplierGroup entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('suppliergroup_edit', array('id' => $id)));
        }

        return $this->render(
            'IntranetBundle:SupplierGroup:edit.html.twig',
            array(
                'entity' => $entity,
                'edit_form' => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
            )
        );
    }

    /**
     * Deletes a SupplierGroup entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IntranetBundle:SupplierGroup')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find SupplierGroup entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('suppliergroup'));
    }

    public function supplierGroupContactDeleteAction(Request $request, $id,$contactId){
         $em = $this->getDoctrine()->getManager();
         $contact = $em->getRepository('IntranetBundle:Contact')->find($contactId);
         $supplierGroup = $em->getRepository('IntranetBundle:SupplierGroup')->find($id);
         $contact->removeSupplierGroup($supplierGroup);
         $em->flush();
        return $this->redirect($this->generateUrl('contact_show', array('id' => $contactId)));

    }

    public function contactSupplierGroupRelationAction(Request $request){
         $em = $this->getDoctrine()->getManager();

        if ($request->isMethod('POST')) {

                $postData = $request->request->get('form');
                $contactId = $postData['contact_id'];
                $supplierGroupId = $postData['supplierGroup_id'];
                $backPath = $this->generateUrl('contact_show', array('id' => $contactId));
                $contact = $em->getRepository('IntranetBundle:Contact')->find($contactId);
                $supplier = $em->getRepository('IntranetBundle:SupplierGroup')->find($supplierGroupId);
                $contact->addSupplierGroup($supplier);
                $em->persist($contact);
                $em->flush();
                return $this->redirect($backPath);

            }
    }

    public function newRelatedAction($id, $name){
        $em = $this->getDoctrine()->getManager();
        $supplierGroup = $em->getRepository('IntranetBundle:SupplierGroup')->find($id);
        $entity = new Supplier();
        $entity->setGroup($supplierGroup);
        $form = $this->createEditFormWithType($entity, new SupplierType(), $name);
        $view = 'IntranetBundle:Supplier:new.html.twig';

        return $this->render(
            $view,
            array(
                'entity' => $entity,
                'form' => $form->createView(),
            )
        );
    }

    private function createEditFormWithType($entity, $formType, $name)
    {
        /** @var $entity Supplier */
        $form = $this->createForm(
            $formType,
            $entity,
            array(
                'action' => $this->generateUrl($name . '_create'),
                'method' => 'POST',
            )
        );

        $form
            ->add('submit', 'submit', array('label' => 'Create', 'attr' => array('class' => 'btn btn-table-actions')))
            ->add(
                'redirect',
                'hidden',
                [
                    'data' => $this->generateUrl('suppliergroup_show', ['id' => $entity->getGroup()->getId()]),
                    'mapped' => false
                ]
            );
        return $form;
    }



}
