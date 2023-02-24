<?php

namespace Beon\IntranetBundle\Controller;

use Beon\IntranetBundle\Lib\PaginationHelper;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\Query\Expr;

use Beon\IntranetBundle\Entity\FacebookUrl;
use Beon\IntranetBundle\Form\FacebookUrlType;
use Beon\IntranetBundle\Entity\Repository\FacebookUrlRepository;
use Symfony\Component\Security\Core\SecurityContext;
use Beon\IntranetBundle\Entity\User;
use Beon\IntranetBundle\Enums\LogActionEnum;
use Beon\IntranetBundle\Entity\Log;

/**
 * FacebookUrl controller.
 *
 */
class FacebookUrlController extends Controller
{


    const ITEMS_ON_PAGE = 10;

    /**
     * Lists all Note entities.
     *
     */
    public function indexAction(Request $request)
    {
        $dqlParts = array(
            array('join', array('obj' => new Expr\Join(Expr\Join::LEFT_JOIN, 'obj.customerfacebookurls', 'cf', 'WITH', 'cf.isOwn <> 0'))),
            array('join', array('obj' => new Expr\Join(Expr\Join::LEFT_JOIN, 'cf.customer', 'c', 'WITH', 'c.contractend is NULL OR c.contractend > CURRENT_DATE()'))),
            array('groupBy', 'obj.id'),
            array('select', new Expr\Select('c.id - c.id AS HIDDEN has_active_customer')), // this is a hack for stupid doctrine. same as "c.id IS NOT NULL"
            array('orderBy', 'has_active_customer DESC'),
            array('orderBy', 'obj.last_post ASC'),
        );
        return PaginationHelper::composeIndexWithUserCheck($this, $request, 'FacebookUrl', self::ITEMS_ON_PAGE, $dqlParts);
    }

    public function postedNowAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IntranetBundle:FacebookUrl')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FacebookUrl entity.');
        }

        $entity->setLastPost(new \DateTime());

        $em->persist($entity);
        $em->flush();

        //Make a log entry.
		$securityContext = $this->get('security.context');
		$user = $securityContext->getToken()->getUser();
		$logEntity = new Log();
		$logEntity->setUser( $user );
		$logEntity->setAction( LogActionEnum::FACEBOOK_URL );
        $logEntity->setFacebookUrl( $entity );
		$logEntity->setCreatedAt( new \DateTime() );
		$em->persist( $logEntity );
		$em->flush();
		

        return new Response(date('d.m.Y H:i'));
    }

    /**
     * Creates a new FacebookUrl entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new FacebookUrl();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        /** @var $facebookUrlRepository FacebookUrlRepository */
        $facebookUrlRepository = $em->getRepository('IntranetBundle:FacebookUrl');
        $alias = $facebookUrlRepository->createAlias($entity->getUrl());
        $duplicateUrl = $facebookUrlRepository->checkDuplicateUrl($alias);
        $entity->setAlias($alias);

        if(empty($duplicateUrl)){

           if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($entity);
                $em->flush();

                return $this->redirect($this->generateUrl('facebookurl_show', array('id' => $entity->getId())));
           }

        }

        return $this->render('IntranetBundle:FacebookUrl:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a FacebookUrl entity.
    *
    * @param FacebookUrl $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(FacebookUrl $entity)
    {
        $form = $this->createForm(new FacebookUrlType(), $entity, array(
            'action' => $this->generateUrl('facebookurl_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create','attr'=> array('class' =>'btn btn-table-actions')));

        return $form;
    }

    /**
     * Displays a form to create a new FacebookUrl entity.
     *
     */
    public function newAction()
    {
        $entity = new FacebookUrl();
        $form   = $this->createCreateForm($entity);

        return $this->render('IntranetBundle:FacebookUrl:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a FacebookUrl entity.
     *
     */
    public function showAction( Request $request )
    {
        $em = $this->getDoctrine()->getManager();
        
        $id = $request->attributes->get('id');
        
        $entity = $em->getRepository('IntranetBundle:FacebookUrl')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FacebookUrl entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        $page = 0;
        $pageFromRequest = $request->request->get( 'currentPage' );
        $page = $pageFromRequest ? $pageFromRequest : $page;

        $logs = $em->getRepository( 'IntranetBundle:Log' )
            ->getUrlLog( $id, $page );

        $pagesCount = $em->getRepository( 'IntranetBundle:Log' )
            ->getUrlPageCount( $id );

        if ($request->isXmlHttpRequest()) {
            return $this->render('IntranetBundle:FacebookUrl:logList.html.twig', array(
                'logs'        => $logs,
                'pagesCount'  => $pagesCount
            ));
        } else {
            return $this->render('IntranetBundle:FacebookUrl:show.html.twig', array(
                'entity'      => $entity,
                'delete_form' => $deleteForm->createView(),
                'logs'        => $logs,
                'pagesCount' => $pagesCount 
            ) );
        }

        
    }

    /**
     * Displays a form to edit an existing FacebookUrl entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IntranetBundle:FacebookUrl')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FacebookUrl entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IntranetBundle:FacebookUrl:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a FacebookUrl entity.
    *
    * @param FacebookUrl $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(FacebookUrl $entity)
    {
        $form = $this->createForm(new FacebookUrlType(), $entity, array(
            'action' => $this->generateUrl('facebookurl_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update','attr'=> array('class' =>'btn btn-table-actions')));

        return $form;
    }
    /**
     * Edits an existing FacebookUrl entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IntranetBundle:FacebookUrl')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FacebookUrl entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);
        $em = $this->getDoctrine()->getManager();

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('facebookurl_edit', array('id' => $id)));
         }



        return $this->render('IntranetBundle:FacebookUrl:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a FacebookUrl entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IntranetBundle:FacebookUrl')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find FacebookUrl entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('facebookurl'));
    }

    /**
     * Creates a form to delete a FacebookUrl entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('facebookurl_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete','attr'=> array('class' =>'btn btn-table-actions')))
            ->getForm()
        ;
    }
}
