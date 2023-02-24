<?php

namespace Beon\IntranetBundle\Controller;

use Beon\IntranetBundle\Lib\PaginationHelper;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Beon\IntranetBundle\Entity\AccessLevel;
use Beon\IntranetBundle\Form\AccessLevelType;

/**
 * AccessLevel controller.
 *
 */
class AccessLevelController extends Controller
{

    const ITEMS_ON_PAGE = 10;
    /**
     * Lists all AccessLevel entities.
     *
     */
    public function indexAction(Request $request)
    {
        return PaginationHelper::composeIndexWithUserCheck($this, $request, 'AccessLevel', self::ITEMS_ON_PAGE);
    }
    /**
     * Creates a new AccessLevel entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new AccessLevel();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('accesslevel_show', array('id' => $entity->getId())));
        }

        return $this->render('IntranetBundle:AccessLevel:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a AccessLevel entity.
     *
     * @param AccessLevel $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(AccessLevel $entity)
    {
        $form = $this->createForm(new AccessLevelType(), $entity, array(
            'action' => $this->generateUrl('accesslevel_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create','attr'=> array('class' =>'btn btn-table-actions')));

        return $form;
    }

    /**
     * Displays a form to create a new AccessLevel entity.
     *
     */
    public function newAction()
    {
        $entity = new AccessLevel();
        $form   = $this->createCreateForm($entity);

        return $this->render('IntranetBundle:AccessLevel:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a AccessLevel entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IntranetBundle:AccessLevel')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AccessLevel entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $duplicateForm = $this->createDuplicateForm($id);

        return $this->render('IntranetBundle:AccessLevel:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
            'duplicate_form' => $duplicateForm->createView()
        ));
    }

    /**
     * Displays a form to edit an existing AccessLevel entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IntranetBundle:AccessLevel')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AccessLevel entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IntranetBundle:AccessLevel:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a AccessLevel entity.
    *
    * @param AccessLevel $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(AccessLevel $entity)
    {
        $form = $this->createForm(new AccessLevelType(), $entity, array(
            'action' => $this->generateUrl('accesslevel_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update','attr'=> array('class' =>'btn btn-table-actions')));

        return $form;
    }
    /**
     * Edits an existing AccessLevel entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IntranetBundle:AccessLevel')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AccessLevel entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('accesslevel_edit', array('id' => $id)));
        }

        return $this->render('IntranetBundle:AccessLevel:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a AccessLevel entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IntranetBundle:AccessLevel')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find AccessLevel entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('accesslevel'));
    }

    /**
     * Creates a form to delete a AccessLevel entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('accesslevel_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete','attr'=> array('class' =>'btn btn-table-actions')))
            ->getForm()
        ;
    }

     public function duplicateAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('IntranetBundle:AccessLevel')->find($id);
        $newAccessLevel = clone $entity;
        $em->persist($newAccessLevel);
        $em->flush();
        return $this->redirect($this->generateUrl('accesslevel_edit', array('id' => $newAccessLevel->getId())));
     }

    private function createDuplicateForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('accesslevel_duplicate', array('id' => $id)))
            ->setMethod('POST')
            ->add('submit', 'submit', array('label' => 'Duplicate','attr'=> array('class' =>'btn btn-table-actions')))
            ->getForm();
    }

}
