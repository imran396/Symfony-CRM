<?php

namespace Beon\IntranetBundle\Controller;

use Beon\IntranetBundle\Form\ComplaintType;
use Proxies\__CG__\Beon\IntranetBundle\Entity\Complaint;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\Query\Expr;

use Beon\IntranetBundle\Entity\MonitoredUrl;
use Beon\IntranetBundle\Form\MonitoredUrlType;
use Symfony\Component\HttpFoundation\Response;
use Beon\IntranetBundle\Lib\PaginationHelper;
use Symfony\Component\Security\Core\SecurityContext;
use Beon\IntranetBundle\Entity\User;
use Beon\IntranetBundle\Enums\LogActionEnum;
use Beon\IntranetBundle\Entity\Log;
use Beon\IntranetBundle\Form\UserFilterType;

/**
 * monitoredurl controller.
 *
 */
class MonitoredUrlController extends Controller
{
    const ITEMS_ON_PAGE = 10;

    public function indexAction(Request $request)
    {
	
	      /* applying filters */
	      $userFilterService = $this->get('UserCustomerFilterService');
	      $filterData =  $userFilterService->handleRequest('MonitoredUrl', $this, $request);
	      $repository = $filterData['repository'];
	
	      $em = $this->getDoctrine()->getManager();
	
        $page = 0;
        $pageFromRequest = $request->request->get('currentPage');
        $pagerName = $request->request->get('pagerName');
        $page = $pageFromRequest ? $pageFromRequest : $page;

        if ($pagerName) {
            $entities = null;

            switch (trim($pagerName)) {
                case 'ownUrl':
		                $entities = $repository->findByIsOwnWebsite($page, self::ITEMS_ON_PAGE, true);
		                break;

                case 'otherUrl':
                    $entities = $repository->findByIsOwnWebsite($page, self::ITEMS_ON_PAGE, false);
                    break;
            }
            
            return $this->render(
                'IntranetBundle:MonitoredUrl:indexRaw.html.twig',
                array(
                    'entities' => $entities
                )
            );

        } else {
     
            $ownUrl = $repository->findByIsOwnWebsite($page, self::ITEMS_ON_PAGE, true);
            $otherUrl = $repository->findByIsOwnWebsite($page, self::ITEMS_ON_PAGE, false);
	          $ownUrlPageCount = $repository->countByIsOwnWebsite($page, self::ITEMS_ON_PAGE, true);
	          $otherUrlPageCount = $repository->countByIsOwnWebsite($page, self::ITEMS_ON_PAGE, false);
	    
            return $this->render(
                'IntranetBundle:MonitoredUrl:index.html.twig',
                array (
                    'ownUrl' => $ownUrl,
                    'otherUrl' => $otherUrl,
                    'ownUrlPageCount' => $ownUrlPageCount,
                    'otherUrlPageCount' => $otherUrlPageCount,
                    'filterForm' => $filterData['filterForm']
                )
            );
        }
    }

    /**
     * Creates a new monitoredurl entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new MonitoredUrl();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('monitoredurl_show', array('id' => $entity->getId())));
        
        }

        return $this->render('IntranetBundle:MonitoredUrl:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a monitoredurl entity.
    *
    * @param MonitoredUrl $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(MonitoredUrl $entity)
    {
        $form = $this->createForm(new MonitoredUrlType(), $entity, array(
            'action' => $this->generateUrl('monitoredurl_create'),
            'method' => 'POST',
        ));

         $form
            ->add('submit', 'submit', array('label' => 'Create','attr'=> array('class' =>'btn btn-table-actions')))
            ->add('redirect', 'hidden', [
                'data' => null,
                'mapped' => false
            ]);

        return $form;
    }

    /**
     * Displays a form to create a new monitoredurl entity.
     *
     */
    public function newAction()
    {
        $entity = new MonitoredUrl();

        $form   = $this->createCreateForm($entity);

        return $this->render('IntranetBundle:MonitoredUrl:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a monitoredurl entity.
     *
     */
    public function showAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $id = $request->attributes->get('id');

        $entity = $em->getRepository('IntranetBundle:MonitoredUrl')->findWithNotes($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MonitoredUrl entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        $page = 0;
        $pageFromRequest = $request->request->get( 'currentPage' );
        $page = $pageFromRequest ? $pageFromRequest : $page;

        $logs = $em->getRepository( 'IntranetBundle:Log' )
            ->getUrlLog( $id, $page, 'monitoredurl' );

        $pagesCount = $em->getRepository( 'IntranetBundle:Log' )
            ->getUrlPageCount( $id, 'monitoredurl' );

       
        if ($request->isXmlHttpRequest()) {
            return $this->render('IntranetBundle:MonitoredUrl:logList.html.twig', array(
                'logs'        => $logs,
                'pagesCount'  => $pagesCount
            ));
        } else {
            return $this->render('IntranetBundle:MonitoredUrl:show.html.twig', array(
                'entity'      => $entity[0],
                'delete_form' => $deleteForm->createView(),
                'logs'        => $logs,
                'pagesCount' => $pagesCount 
            ) );
        }

    }

    /**
     * Displays a form to edit an existing monitoredurl entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IntranetBundle:MonitoredUrl')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MonitoredUrl entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IntranetBundle:MonitoredUrl:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a monitoredurl entity.
    *
    * @param MonitoredUrl $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(MonitoredUrl $entity)
    {
        $form = $this->createForm(new MonitoredUrlType(), $entity, array(
            'action' => $this->generateUrl('monitoredurl_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update','attr'=> array('class' =>'btn btn-table-actions')));

        return $form;
    }
    /**
     * Edits an existing monitoredurl entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IntranetBundle:MonitoredUrl')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MonitoredUrl entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('monitoredurl_edit', array('id' => $id)));
        }

        return $this->render('IntranetBundle:MonitoredUrl:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a monitoredurl entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IntranetBundle:MonitoredUrl')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find MonitoredUrl entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('monitoredurl'));
    }

     public function postedNowAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
	    	$entity = $em->getRepository('IntranetBundle:MonitoredUrl')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MonitoredUrl  entity.');
        }

        $entity->setlastCheck(new \DateTime());

        $em->persist($entity);
        $em->flush();
		
		    //Make a log entry.
		    $securityContext = $this->get('security.context');
		    $user = $securityContext->getToken()->getUser();
		    $logEntity = new Log();
		    $logEntity->setUser( $user );
		    $logEntity->setAction( LogActionEnum::MONITORED_URL );
		    $logEntity->setMonitoredUrl( $entity );
		    $logEntity->setCreatedAt( new \DateTime() );
		    $em->persist( $logEntity );
		    $em->flush();
		
		    if ($request->isXmlHttpRequest()) {
          return new Response( date('d.m.Y H:i') );
        } else {
          return $this->redirect($this->generateUrl('monitoredurl_show', array('id' => $id)));
        }
    }


    /**
     * Creates a form to delete a monitoredurl entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('monitoredurl_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete','attr'=> array('class' =>'btn btn-table-actions')))
            ->getForm()
        ;
    }

     public function newRelatedAction($id, $name)
    {
        $em = $this->getDoctrine()->getManager();

        /** @var $complaint Customer */
        $monitoredUrl = $em->getRepository('IntranetBundle:MonitoredUrl')->find($id);

        $entity = null;
        $form = null;
        $view = null;

        switch ($name) {
            case "complaint":

                $entity = new Complaint();

                $entity->setCustomer($monitoredUrl->getCustomer());
                $form = $this->createEditFormWithType($entity, new ComplaintType(), 'complaint',$id);
                $view = 'IntranetBundle:Complaint:new.html.twig';
                break;

            default:
                throw new Exception('There is no entity');
                break;
        }

        return $this->render(
            $view,
            array(
                'entity' => $entity,
                'form' => $form->createView(),
            )
        );

    }

    private function createEditFormWithType($entity, $formType, $name,$id)
    {
        /** @var $entity Complaint*/
        $form = $this->createForm(
            $formType,
            $entity,
            array(
                'action' => $this->generateUrl($name . '_create'),
                'method' => 'POST',
            )
        );

        $form
            ->add('submit', 'submit', array('label' => 'Create','attr'=> array('class' =>'btn btn-table-actions')))
            ->add(
                'redirect',
                'hidden',
                [
                    'data' => $this->generateUrl('monitoredurl_show', ['id' => $id]),
                    'mapped' => false
                ]
            );

        return $form;
    }


}
