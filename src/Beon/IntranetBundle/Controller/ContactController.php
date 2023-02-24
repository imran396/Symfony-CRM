<?php

namespace Beon\IntranetBundle\Controller;

use Beon\IntranetBundle\Entity\Repository\CityRepository;
use Beon\IntranetBundle\Entity\Repository\SupplierGroupRepository;
use Beon\IntranetBundle\Entity\Supplier;
use Beon\IntranetBundle\Entity\SupplierGroup;
use Beon\IntranetBundle\Enums\LogActionEnum;
use Beon\IntranetBundle\Lib\PaginationHelper;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Beon\IntranetBundle\Entity\Contact;
use Beon\IntranetBundle\Form\ContactType;
use Beon\IntranetBundle\Entity\Repository\ContactRepository;
use Beon\IntranetBundle\Entity\Repository\SupplierRepository;
use Beon\IntranetBundle\Entity\Repository\CustomerRepository;

/**
 * Contact controller.
 *
 */
class ContactController extends Controller
{

       const ITEMS_ON_PAGE = 10;
    /**
     * Lists all Contact entities.
     *
     */
    public function indexAction(Request $request)
    {
	    /* applying filters */
	    $userFilterService = $this->get('UserCustomerFilterService');
	    $filterData =  $userFilterService->handleRequest('Contact', $this, $request);
	    $repository = $filterData['repository'];
	
        $callback = function($qb) use($repository) {
            if ($repository->getCustomerFilter()) {
                $qb->join('obj.customers', 'c', 'WITH', 'c.id IN (:customerIds)');
                $qb->setParameter('customerIds', $repository->getCustomerFilter());
            }
            if ($repository->getPlainTextFilter()) {
                $qb->andWhere('obj.id = :id OR obj.email LIKE :query OR obj.firstName LIKE :query OR obj.lastName LIKE :query');
                $qb->setParameter('id', intval($repository->getPlainTextFilter()));
                $qb->setParameter('query', '%' . $repository->getPlainTextFilter() . '%');
            }
            $qb->orderBy('obj.lastName', 'ASC');
	    };
        
        return PaginationHelper::composeFilterIndex($this, $request, 'Contact', self::ITEMS_ON_PAGE, $callback, $filterData);
    }

    /**
     * Creates a new Contact entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Contact();
        $form = $this->createCreateForm($entity);
        $form->add('supplier_id', 'hidden', array('mapped' => false));
        $formData = $request->request->get('contact');
        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();

        if (isset($formData['supplier_id'])) {

            $supplierId = $formData['supplier_id'];
            $backPath = $this->generateUrl('supplier_edit', array('id' => $supplierId));
            /** @var $supplier Supplier */
            $supplier = $em->getRepository('IntranetBundle:Supplier')->find($supplierId);

        } else {
            $em->persist($entity);
            $em->flush();
            $backPath = $this->generateUrl('contact_show', array('id' => $entity->getId()));
            return $this->redirect($backPath);
        }

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

           if($supplierId){
                $entity->addSupplier($supplier);
                $em->persist($entity);
                $em->flush();
            }

            return $this->redirect($backPath);
        }

        return $this->render('IntranetBundle:Contact:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Contact entity.
     *
     * @param Contact $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Contact $entity)
    {
        $form = $this->createForm(new ContactType(), $entity, array(
            'action' => $this->generateUrl('contact_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create','attr'=> array('class' =>'btn btn-table-actions')));

        return $form;
    }

    /**
     * Displays a form to create a new Contact entity.
     *
     */
    public function newAction(Request $request)
    {
        $entity = new Contact();

        $form = $this->createCreateForm($entity);

        $formData = $request->request->get('form');

        $backPath = $this->generateUrl('contact');

        if (isset($formData['supplier_id'])) {
            $supplierId = $formData['supplier_id'];
            $backPath = $this->generateUrl('supplier_edit', array('id' => $supplierId));
            $form->add('supplier_id', 'hidden', array('data' => $supplierId, 'mapped' => false));
            $form->remove('supplier');
        }


        return $this->render('IntranetBundle:Contact:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
            'backPath' => $backPath
        ));
    }

    /**
     * Finds and displays a Contact entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IntranetBundle:Contact')->find($id);

        $pressReleaseLogs = $em->getRepository('IntranetBundle:Log')->getContactSentLogs($entity,'contact', LogActionEnum::SUBMITTED);
        $pressreleases = $this->getSubmittedContantByPressrelease($pressReleaseLogs);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contact entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        $addSupplierForm = $this->createFormBuilder()
            ->setAction($this->generateUrl('supplier_contact'))
            ->add('contact_id', 'hidden', array('data' => $entity->getId()))
            ->add(
                'supplier_id',
                'entity',
                array(
                    'label' => 'Supplier',
                    'class' => 'IntranetBundle:Supplier',
                    'query_builder' => function (SupplierRepository $repository) use ($entity) {
                            return $repository->getSupplierForContactRelation($entity->getSuppliers());
                        }
                )
            )
            ->getForm();

        $addCityForm = $this->createFormBuilder()
            ->setAction($this->generateUrl('city_contact'))
            ->add('contact_id', 'hidden', array('data' => $entity->getId()))
            ->add(
                'city_id',
                'entity',
                array(
                    'label' => 'City',
                    'class' => 'IntranetBundle:City',
                    'query_builder' => function (CityRepository $repository) use ($entity) {
                            return $repository->getCityForContactRelation($entity->getCities());
                        }
                )
            )
            ->getForm();

        $addSupplierGroupForm = $this->createFormBuilder()
            ->setAction($this->generateUrl('suppliergroup_contact'))
            ->add('contact_id', 'hidden', array('data' => $entity->getId()))
            ->add(
                'supplierGroup_id',
                'entity',
                array(
                     'label' => 'Supplier group',
                    'class' => 'IntranetBundle:SupplierGroup',
                    'query_builder' => function (SupplierGroupRepository $repository) use ($entity) {
                            return $repository->getSupplierGroupForContactRelation($entity->getSuppliergroups());
                        }
                )
            )
            ->getForm();

        $addCustomerForm = $this->createFormBuilder()
            ->setAction($this->generateUrl('customer_contact'))
            ->add('contact_id', 'hidden', array('data' => $entity->getId()))
            ->add(
                'customer_id',
                'entity',
                array(
                     'label' => 'Stakeholder',
                    'class' => 'IntranetBundle:Customer',
                    'query_builder' => function (CustomerRepository $repository) use ($entity) {
                            return $repository->getCustomerForContactRelation($entity->getCustomers());
                        }
                )
            )
            ->getForm();

        return $this->render('IntranetBundle:Contact:show.html.twig', array(
            'entity' => $entity,
            'addSupplierForm' => $addSupplierForm->createView(),
            'addCityForm' => $addCityForm->createView(),
            'addSuppliergroupForm' => $addSupplierGroupForm->createView(),
            'addCustomerForm' => $addCustomerForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'pressreleases' => $pressreleases

            )
        );
    }

    /**
     * Displays a form to edit an existing Contact entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IntranetBundle:Contact')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contact entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IntranetBundle:Contact:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a Contact entity.
     *
     * @param Contact $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Contact $entity)
    {
        $form = $this->createForm(new ContactType(), $entity, array(
            'action' => $this->generateUrl('contact_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update','attr'=> array('class' =>'btn btn-table-actions')));

        return $form;
    }

    /**
     * Edits an existing Contact entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IntranetBundle:Contact')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contact entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('contact_edit', array('id' => $id)));
        }

        return $this->render('IntranetBundle:Contact:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Contact entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IntranetBundle:Contact')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Contact entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('contact'));
    }

    /**
     * Creates a form to delete a Contact entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('contact_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete','attr'=> array('class' =>'btn btn-table-actions')))
            ->getForm();
    }

       /**
     * @param $pressReleaseLogs
     * @return array
     */
    private function getSubmittedContantByPressrelease($pressReleaseLogs)
    {
        $pressrealses = array();

        foreach ($pressReleaseLogs as $pressrelease) {
            $pressrealses[] = $pressrelease->getPressrelease();
        }

        return $pressrealses;
    }
}
