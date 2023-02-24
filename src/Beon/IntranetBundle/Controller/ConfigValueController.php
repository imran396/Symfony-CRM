<?php

namespace Beon\IntranetBundle\Controller;

use Beon\IntranetBundle\Lib\PaginationHelper;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Beon\IntranetBundle\Entity\ConfigValue;
use Beon\IntranetBundle\Form\ConfigValueType;
use Beon\IntranetBundle\Lib\CheckAccess;

/**
 * ConfigValue controller.
 *
 */
class ConfigValueController extends Controller
{

   const ITEMS_ON_PAGE = 10;
    /**
     * Lists all ConfigValue entities.
     *
     */
    public function indexAction(Request $request)
    {

        $securityContext = $this->get('security.context');
        /** @var $usr User */
        $usr = $securityContext->getToken()->getUser();

         return PaginationHelper::composeIndexWithUserCheck($this, $request, 'ConfigValue', self::ITEMS_ON_PAGE);
    }


    /**
     * Finds and displays a ConfigValue entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IntranetBundle:ConfigValue')->find($id);
        CheckAccess::userWithConfigValue($entity->getRole());
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ConfigValue entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IntranetBundle:ConfigValue:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ConfigValue entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IntranetBundle:ConfigValue')->find($id);
        CheckAccess::userWithConfigValue($entity->getRole());

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ConfigValue entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IntranetBundle:ConfigValue:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a ConfigValue entity.
    *
    * @param ConfigValue $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ConfigValue $entity)
    {
        $form = $this->createForm(new ConfigValueType(), $entity, array(
            'action' => $this->generateUrl('configvalue_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update','attr'=> array('class' =>'btn btn-table-actions')));

        return $form;
    }
    /**
     * Edits an existing ConfigValue entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IntranetBundle:ConfigValue')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ConfigValue entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('configvalue_edit', array('id' => $id)));
        }

        return $this->render('IntranetBundle:ConfigValue:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a ConfigValue entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IntranetBundle:ConfigValue')->find($id);
            CheckAccess::userWithConfigValue($entity->getRole());
            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ConfigValue entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('configvalue'));
    }

    /**
     * Creates a form to delete a ConfigValue entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('configvalue_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete','attr'=> array('class' =>'btn btn-table-actions')))
            ->getForm()
        ;
    }
}
