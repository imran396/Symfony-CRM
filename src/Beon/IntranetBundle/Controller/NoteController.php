<?php

namespace Beon\IntranetBundle\Controller;

use Beon\IntranetBundle\Entity\Customer;
use Beon\IntranetBundle\Entity\Upload;
use Beon\IntranetBundle\Enums\TaskTypeEnum;
use Beon\IntranetBundle\Form\NoteWithCustomerType;
use Beon\IntranetBundle\Helper\FormHelper;
use Beon\IntranetBundle\Lib\CheckAccess;
use Beon\IntranetBundle\Lib\PaginationHelper;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Beon\IntranetBundle\Entity\Note;
use Beon\IntranetBundle\Form\NoteType;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Note controller.
 *
 */
class NoteController extends Controller
{
    const ITEMS_ON_PAGE = 10;

    /**
     * Lists all Note entities.
     *
     */
    public function indexAction(Request $request)
    {
        $this->getDoctrine()->getManager()->getRepository('IntranetBundle:Note')->repeatYearlyFixedDates();

	    /* applying filters */
	    $userFilterService = $this->get('UserCustomerFilterService');
	    $filterData =  $userFilterService->handleRequest('Note', $this, $request);
	    $repository = $filterData['repository'];	

	    $callback = function($qb)  use($repository) {  
	        if ($repository->getUserFilter()!=null) {
		        $qb->andWhere('obj.user = :user');
		        $qb->setParameter('user', $repository->getUserFilter());
	        }
	        
	        if ($repository->getCustomerFilter()!=null) {
		        $qb->andWhere('obj.customer IN (:customerIds)');	
		        $qb->setParameter('customerIds', $repository->getCustomerFilter());
	        }

            if ($repository->getNoteTypeFilter()) {
                $qb->andWhere('obj.type = :type');
                $qb->setParameter('type', $repository->getNoteTypeFilter());
            }
	        
	        $qb->orderBy('obj.createdat', 'DESC');
	    };
        
        return PaginationHelper::composeFilterIndexWithUserCheck($this, $request, 'Note', self::ITEMS_ON_PAGE, $callback, $filterData);
    }

    /**
     * Creates a new Note entity.
     *
     */
    public function createAction($monitoredUrl, Request $request)
    {
        $entity = new Note();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);


        if ($form->isValid()) {
            $entity->setUser($this->get('security.context')->getToken()->getUser());
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

		    /* upload file */
		    $uploadFileObject= $form->get('uploadFile')->getData();
            $uploadCount = 0;

		    if ($entity && $uploadFileObject) {
			    $fileUploadService = $this->get('UploadFileService');
			    $info = $fileUploadService->upload($uploadFileObject, $entity);
                $uploadCount = count($info['uploads']);
		    }

            if (!$entity->getInternalUseOnly() && ($task = $entity->getTask()) && $task->getType() == TaskTypeEnum::GRAPHICS) {
                $users = array($task->getUser()->getId() => $task->getUser());
                if ($task->getCreatedBy()) {
                    $users[$task->getCreatedBy()->getId()] = $task->getCreatedBy();
                }
                if ($task->getCarbonCopy()) {
                    $users[$task->getCarbonCopy()->getId()] = $task->getCarbonCopy();
                }
                if ($task->getCustomer()) {
                    foreach ($task->getCustomer()->getUsers() as $user) {
                        $users[$user->getId()] = $user;
                    }
                }
                unset($users[$entity->getUser()->getId()]);                

                foreach ($users as $user) {
                    $mailBody = nl2br($this->renderView(
                        'IntranetBundle:Note:mailNotify.html.twig',
                        array(
                            'entity' => $entity,
                            'task' => $task,
                            'user' => $user,
                            'uploadCount' => $uploadCount,
                            'link_task' => $this->generateUrl(
                                    'task_show',
                                    ['id' => $task->getId()],
                                    UrlGeneratorInterface::ABSOLUTE_URL
                                ),
                            'link_note' => $this->generateUrl(
                                    'note_show',
                                    ['id' => $entity->getId()],
                                    UrlGeneratorInterface::ABSOLUTE_URL
                                ),
                        )
                    ));

                    $message = \Swift_Message::newInstance()
                        ->setSubject('Note notification')
                        ->setFrom($this->container->getParameter('fromEmail'))
                        ->setTo($user->getEmail())
                        ->setBody($mailBody, 'text/html', 'utf-8');
                    $send = $this->get('mailer')->send($message);
                }
            }
	    
	        // set flash messages
	        $this->get('session')->getFlashBag()->add('success', 'Note Created Successfully');
	        
	        if ($monitoredUrl) {
		        return  $this->redirect($this->generateUrl('monitoredurl_show', array('id' => $monitoredUrl)));
	        } else {
		        $redirect = $form->get('redirect')->getData();
		        $redirect = ($redirect) ? $redirect : $this->generateUrl('note_show', array('id' => $entity->getId()));
		        return $this->redirect($redirect);
	        }
        }

        return $this->render('IntranetBundle:Note:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Note entity.
     *
     * @param Note $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Note $entity)
    {
	$monitoredUrl = false;
	
	if ($entity->getMonitoredUrl()) {
	    $monitoredUrl = $entity->getMonitoredUrl()->getId();
	} 
	
        $form = $this->createForm(new NoteType(), $entity, array(
            'action' => $this->generateUrl('note_create',array('monitoredUrl'=>$monitoredUrl)),
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
     * Displays a form to create a new Note entity.
     *
     */
    public function newAction($monitoredUrl, Request $request)
    {
	    $em = $this->getDoctrine()->getManager();
        $entity = new Note();
        
        if ($monitoredUrl) {
	    $monitoredUrlEntity =  $em->getRepository('IntranetBundle:MonitoredUrl')->find($monitoredUrl);
	    $entity->setMonitoredUrl($monitoredUrlEntity);
        }
        
        $form = $this->createCreateForm($entity);

        $customer = null;

        $formData = $request->request->get('form');
        $customerId = isset($formData['customer_id']) ? $formData['customer_id'] : null;

        if ($customerId) {

            /** @var $customer Customer */
            $customer = $em->getRepository('IntranetBundle:Customer')->find($customerId);
            $form->remove('customer');
            $form->add('customer', 'hidden', array('data' => $customerId));
        }
	
     
	    return $this->render('IntranetBundle:Note:new.html.twig', array(
	        'entity' => $entity,
	        'form' => $form->createView(),
	        'customer' => $customer,
	        'monitoredUrl' => $monitoredUrl
	    ));
        
    }

    /**
     * Finds and displays a Note entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $em->getRepository('IntranetBundle:Note')->repeatYearlyFixedDates();

        /** @var $entity Note */
        $entity = $em->getRepository('IntranetBundle:Note')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Note entity.');
        }

        CheckAccess::userWithNote($entity);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pressrelease entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IntranetBundle:Note:show.html.twig', array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
            'was_success' => $this->get('session')->getFlashBag()->has('success'),
        ));
    }

    /**
     * Displays a form to edit an existing Note entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        /** @var $entity Note */
        $entity = $em->getRepository('IntranetBundle:Note')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Note entity.');
        }

        CheckAccess::userWithNote($entity);

        $uploadDorms = array();
        /** @var $upload Upload */
        foreach ($entity->getUploads() as $upload) {
            $uploadDorms[$upload->getId()] = FormHelper::composeDeleteForm($this, array(
                'action' => 'upload_delete',
                'actionParameters' => array('id' => $upload->getId()),
                'redirectPath' => 'note_edit',
                'redirectParams' => array('id' => $entity->getId())
            ));
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        $uploadFileForm = $this->createFormBuilder()
            ->setAction($this->generateUrl('upload_new'))
            ->add('presenter', 'hidden', array('data' => 'note'))
            ->add('presenterId', 'hidden', array('data' => $entity->getId()))
            ->add('submit', 'submit', array('label' => 'Upload file','attr'=> array('class' =>'btn btn-table-actions')))
            ->getForm();

        return $this->render('IntranetBundle:Note:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'upload_file_form' => $uploadFileForm->createView(),
            'uploadDeleteForms' => $uploadDorms
        ));
    }

    /**
     * Creates a form to edit a Note entity.
     *
     * @param Note $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Note $entity)
    {
        $form = $this->createForm(new NoteType(), $entity, array(
            'action' => $this->generateUrl('note_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update','attr'=> array('class' =>'btn btn-table-actions')));

        return $form;
    }

    /**
     * Edits an existing Note entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IntranetBundle:Note')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Note entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('note_edit', array('id' => $id)));
        }

        return $this->render('IntranetBundle:Note:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Note entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IntranetBundle:Note')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Note entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('note'));
    }

    /**
     * Creates a form to delete a Note entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('note_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete','attr'=> array('class' =>'btn btn-table-actions')))
            ->getForm();
    }
    
   /**
     * Lists all Note entities.
     *
     */
    public function listAction($monitoredUrl, Request $request)
    {
	$em = $this->getDoctrine()->getManager();
	
	$monitoredUrlEntity =  $em->getRepository('IntranetBundle:MonitoredUrl')->find($monitoredUrl);
	
	$monitoredUrlEntities = $em->getRepository('IntranetBundle:Note')->findBy(array('monitoredurl'=>$monitoredUrl));

	return $this->render('IntranetBundle:Note:list.html.twig', array(
	    'monitoredUrlEntities' => $monitoredUrlEntities,
	));
    }
}
