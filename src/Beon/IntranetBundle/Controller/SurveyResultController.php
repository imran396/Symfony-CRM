<?php

namespace Beon\IntranetBundle\Controller;

use Beon\IntranetBundle\Entity\Repository\SurveyResultRepository;
use Beon\IntranetBundle\Entity\User;
use Beon\IntranetBundle\Lib\PaginationHelper;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Beon\IntranetBundle\Entity\SurveyResult;
use Beon\IntranetBundle\Form\SurveyResultType;
use Symfony\Component\Security\Core\SecurityContext;

/**
 * SurveyResult controller.
 *
 */
class SurveyResultController extends Controller
{
    const ITEMS_ON_PAGE = 10;

    /**
     * Lists all SurveyResult entities.
     *
     */
    public function indexAction(Request $request)
    {

        $page = 0;
        $pageFromRequest = $request->request->get('currentPage');
        $page = $pageFromRequest ? $pageFromRequest : $page;

        /** @var $repository SurveyResultRepository */
        $repository = $this->getDoctrine()->getRepository('IntranetBundle:SurveyResult');

        /** @var $securityContext SecurityContext */
        $securityContext = $this->get('security.context');

        /** @var $user User */
        $user = $securityContext->getToken()->getUser();

        $entities = $repository->findAllWithUser($user, $page);
        $pagesCount = $repository->getPagesCount($user);

        if ($request->isXmlHttpRequest()) {
            return $this->render('IntranetBundle:SurveyResult:indexTable.html.twig', array(
                'entities' => $entities
            ));
        } else {
            return $this->render('IntranetBundle:SurveyResult:index.html.twig', array(
                'entities' => $entities,
                'pagesCount' => $pagesCount
            ));
        }

    }

    /**
     * Creates a new SurveyResult entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new SurveyResult();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('surveyresult_show', array('id' => $entity->getId())));
        }

        return $this->render('IntranetBundle:SurveyResult:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a SurveyResult entity.
     *
     * @param SurveyResult $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(SurveyResult $entity)
    {
        $form = $this->createForm(new SurveyResultType(), $entity, array(
            'action' => $this->generateUrl('surveyresult_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create','attr'=> array('class' =>'btn btn-table-actions')));

        return $form;
    }

    /**
     * Displays a form to create a new SurveyResult entity.
     *
     */
    public function newAction()
    {
        $entity = new SurveyResult();
        $form = $this->createCreateForm($entity);

        return $this->render('IntranetBundle:SurveyResult:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SurveyResult entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IntranetBundle:SurveyResult')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SurveyResult entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IntranetBundle:SurveyResult:show.html.twig', array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),));
    }

    /**
     * Displays a form to edit an existing SurveyResult entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IntranetBundle:SurveyResult')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SurveyResult entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IntranetBundle:SurveyResult:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a SurveyResult entity.
     *
     * @param SurveyResult $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(SurveyResult $entity)
    {
        $form = $this->createForm(new SurveyResultType(), $entity, array(
            'action' => $this->generateUrl('surveyresult_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update','attr'=> array('class' =>'btn btn-table-actions')));

        return $form;
    }

    /**
     * Edits an existing SurveyResult entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IntranetBundle:SurveyResult')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SurveyResult entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('surveyresult_edit', array('id' => $id)));
        }

        return $this->render('IntranetBundle:SurveyResult:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a SurveyResult entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IntranetBundle:SurveyResult')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find SurveyResult entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('surveyresult'));
    }

    /**
     * Creates a form to delete a SurveyResult entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('surveyresult_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete','attr'=> array('class' =>'btn btn-table-actions')))
            ->getForm();
    }
}
