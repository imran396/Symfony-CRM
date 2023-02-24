<?php

namespace Beon\IntranetBundle\Controller;

use Beon\IntranetBundle\Entity\CityContact;
use Beon\IntranetBundle\Lib\PaginationHelper;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Beon\IntranetBundle\Entity\City;
use Beon\IntranetBundle\Form\CityType;

/**
 * City controller.
 *
 */
class CityController extends Controller
{

   const ITEMS_ON_PAGE = 10;

    /**
     * Lists all Note entities.
     *
     */
    public function indexAction(Request $request)
    {
        return PaginationHelper::composeIndexWithUserCheck($this, $request, 'City', self::ITEMS_ON_PAGE);

    }
    /**
     * Creates a new City entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new City();
        $form = $this->createCreateForm($entity);
        $form->add('contact_id', 'hidden', array('mapped' => false));
        $formData = $request->request->get('beon_intranetbundle_city');
        $contactId = $formData['contact_id'];
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            if($contactId){
                $backPath = $this->generateUrl('contact_show', array('id' => $contactId));
                $contact = $em->getRepository('IntranetBundle:Contact')->find($contactId);
                $contact->addCity($entity);
                $em->persist($contact);
                $em->flush();
                return $this->redirect($backPath);
            }

          return $this->redirect($this->generateUrl('city_edit', array('id' => $entity->getId())));
        }

        return $this->render('IntranetBundle:City:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a City entity.
     *
     * @param City $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(City $entity)
    {
        $form = $this->createForm(new CityType(), $entity, array(
            'action' => $this->generateUrl('city_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create','attr'=> array('class' =>'btn btn-table-actions')));

        return $form;
    }

    /**
     * Displays a form to create a new City entity.
     *
     */
    public function newAction(Request $request)
    {
        $entity = new City();
        $form   = $this->createCreateForm($entity);

        $formData = $request->request->get('form');

        $backPath = $this->generateUrl('contact');

        if (isset($formData['contact_id'])) {
            $contactId = $formData['contact_id'];
            $form->add('contact_id', 'hidden', array('data' => $contactId, 'mapped' => false));
            $form->remove('contact');
        }

        return $this->render('IntranetBundle:City:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a City entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IntranetBundle:City')->find($id);


        if (!$entity) {
            throw $this->createNotFoundException('Unable to find City entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        $addContactForm = $this->createFormBuilder()
            ->setAction($this->generateUrl('city_new'))
            ->add('city_id', 'hidden', array('data' => $entity->getId()))
            ->add(
                'submit',
                'submit',
                array('label' => 'Add Contact', 'attr' => array('class' => 'btn btn-table-actions'))
            )
            ->getForm();

        return $this->render('IntranetBundle:City:show.html.twig', array(
            'entity'  => $entity,
            'addContactForm' => $addContactForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing City entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IntranetBundle:City')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find City entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IntranetBundle:City:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a City entity.
    *
    * @param City $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(City $entity)
    {
        $form = $this->createForm(new CityType(), $entity, array(
            'action' => $this->generateUrl('city_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update','attr'=> array('class' =>'btn btn-table-actions')));

        return $form;
    }
    /**
     * Edits an existing City entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IntranetBundle:City')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find City entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('city_edit', array('id' => $id)));
        }

        return $this->render('IntranetBundle:City:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a City entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IntranetBundle:City')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find City entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('city'));
    }

    public function contactCityDeleteAction(Request $request,$id,$contactId){
         $em = $this->getDoctrine()->getManager();
         $contact = $em->getRepository('IntranetBundle:Contact')->find($contactId);
         $city = $em->getRepository('IntranetBundle:City')->find($id);
         $contact->removeCity($city);
         $em->flush();
         return $this->redirect($this->generateUrl('contact_show', array('id' => $contactId)));
    }

    public function contactCityRelationAction(Request $request){
         $em = $this->getDoctrine()->getManager();
         if ($request->isMethod('POST')) {
                $postData = $request->request->get('form');
                $contactId = $postData['contact_id'];
                $cityId = $postData['city_id'];
                $backPath = $this->generateUrl('contact_show', array('id' => $contactId));
                $contact = $em->getRepository('IntranetBundle:Contact')->find($contactId);
                $city = $em->getRepository('IntranetBundle:City')->find($cityId);
                $contact->addCity($city);
                $em->persist($contact);
                $em->flush();
               return $this->redirect($backPath);
            }
    }

    /**
     * Creates a form to delete a City entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('city_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete','attr'=> array('class' =>'btn btn-table-actions')))
            ->getForm()
        ;
    }
}
