<?php

namespace Beon\IntranetBundle\Controller;

use Beon\IntranetBundle\Lib\PaginationHelper;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Beon\IntranetBundle\Entity\EnumValue;
use Beon\IntranetBundle\Form\EnumValueType;

/**
 * EnumValue controller.
 *
 */
class EnumValueController extends Controller
{

     const ITEMS_ON_PAGE = 10;

    /**
     * Lists all EnumValue entities.
     *
     */

    public function indexAction(Request $request)
    {
	    /* applying filters */
	    $userFilterService = $this->get('UserCustomerFilterService');
	    $filterData =  $userFilterService->handleRequest('EnumValue', $this, $request);
	    $repository = $filterData['repository'];
	
      $callback = function($qb) use($repository) {
          if ($repository->getPlainTextFilter()) {
              $qb->andWhere('obj.className = :className OR obj.value LIKE :query');
              $qb->setParameter('className', trim($repository->getPlainTextFilter()));
              $qb->setParameter('query', '%' . $repository->getPlainTextFilter() . '%');
          }
          $qb->orderBy('obj.id', 'DESC');
	    };
        
      return PaginationHelper::composeFilterIndex($this, $request, 'EnumValue', self::ITEMS_ON_PAGE, $callback, $filterData);
    }

    /**
     * Finds and displays a EnumValue entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IntranetBundle:EnumValue')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EnumValue entity.');
        }

        return $this->render('IntranetBundle:EnumValue:show.html.twig', array(
            'entity'      => $entity
        ));
    }

    /**
     * Displays a form to edit an existing EnumValue entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IntranetBundle:EnumValue')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EnumValue entity.');
        }

        $editForm = $this->createEditForm($entity);

        return $this->render('IntranetBundle:EnumValue:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a EnumValue entity.
    *
    * @param EnumValue $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(EnumValue $entity)
    {
        $form = $this->createForm(new EnumValueType(), $entity, array(
            'action' => $this->generateUrl('enumvalue_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update' ,'attr' => array('class' => 'btn btn-table-actions')));

        return $form;
    }
    /**
     * Edits an existing EnumValue entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IntranetBundle:EnumValue')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EnumValue entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('enumvalue_edit', array('id' => $id)));
        }

        return $this->render('IntranetBundle:EnumValue:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        ));
    }

}
