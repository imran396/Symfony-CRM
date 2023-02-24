<?php

namespace Beon\IntranetBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Beon\IntranetBundle\Entity\CustomerFacebookUrl;
use Beon\IntranetBundle\Form\CustomerFacebookUrlType;

use Beon\IntranetBundle\Lib\CheckAccess;
use Beon\IntranetBundle\Lib\PaginationHelper;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * CustomerFacebookUrl controller.
 *
 */
class CustomerFacebookUrlController extends Controller
{

    const ITEMS_ON_PAGE = 10;

    /**
     * Lists all Note entities.
     *
     */
    public function indexAction(Request $request)
    {

        return PaginationHelper::composeIndexWithUserCheck($this, $request, 'CustomerFacebookUrl', self::ITEMS_ON_PAGE, 'customer');


    }
    /**
     * Creates a new CustomerFacebookUrl entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new CustomerFacebookUrl();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();

        $duplicateUrl = $em->getRepository('IntranetBundle:CustomerFacebookUrl')->checkDuplicateCustomerUrl($entity->getFacebookUrl(),$entity->getCustomer());

        if ($duplicateUrl) {
            throw new AccessDeniedException();
        }

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('customerfacebookurl_show', array('id' => $entity->getId())));
        }

        return $this->render('IntranetBundle:CustomerFacebookUrl:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a CustomerFacebookUrl entity.
    *
    * @param CustomerFacebookUrl $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(CustomerFacebookUrl $entity)
    {
        $form = $this->createForm(new CustomerFacebookUrlType(), $entity, array(
            'action' => $this->generateUrl('customerfacebookurl_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create','attr'=> array('class' =>'btn btn-table-actions')));

        return $form;
    }

    /**
     * Displays a form to create a new CustomerFacebookUrl entity.
     *
     */
    public function newAction()
    {
        $entity = new CustomerFacebookUrl();
        $form   = $this->createCreateForm($entity);

        return $this->render('IntranetBundle:CustomerFacebookUrl:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a CustomerFacebookUrl entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IntranetBundle:CustomerFacebookUrl')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CustomerFacebookUrl entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IntranetBundle:CustomerFacebookUrl:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing CustomerFacebookUrl entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IntranetBundle:CustomerFacebookUrl')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CustomerFacebookUrl entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IntranetBundle:CustomerFacebookUrl:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a CustomerFacebookUrl entity.
    *
    * @param CustomerFacebookUrl $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(CustomerFacebookUrl $entity)
    {
        $form = $this->createForm(new CustomerFacebookUrlType(), $entity, array(
            'action' => $this->generateUrl('customerfacebookurl_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update','attr'=> array('class' =>'btn btn-table-actions')));

        return $form;
    }
    /**
     * Edits an existing CustomerFacebookUrl entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IntranetBundle:CustomerFacebookUrl')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CustomerFacebookUrl entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('customerfacebookurl_edit', array('id' => $id)));
        }

        return $this->render('IntranetBundle:CustomerFacebookUrl:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a CustomerFacebookUrl entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IntranetBundle:CustomerFacebookUrl')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find CustomerFacebookUrl entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('customerfacebookurl'));
    }

    /**
     * Creates a form to delete a CustomerFacebookUrl entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('customerfacebookurl_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete','attr'=> array('class' =>'btn btn-table-actions')))
            ->getForm()
        ;
    }
}
