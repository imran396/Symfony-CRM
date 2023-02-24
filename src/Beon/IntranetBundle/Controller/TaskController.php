<?php

namespace Beon\IntranetBundle\Controller;

use Beon\IntranetBundle\Entity\MailQueue;
use Beon\IntranetBundle\Entity\Repository\TaskRepository;
use Beon\IntranetBundle\Entity\Upload;
use Beon\IntranetBundle\Entity\User;
use Beon\IntranetBundle\Entity\Repository\UserRepository;
use Beon\IntranetBundle\Enums\LogActionEnum;
use Beon\IntranetBundle\Enums\CampaignStatusEnum;
use Beon\IntranetBundle\Helper\ApprovementFormComposer;
use Beon\IntranetBundle\Helper\FormHelper;
use Beon\IntranetBundle\Lib\CheckAccess;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Beon\IntranetBundle\Entity\Task;
use Beon\IntranetBundle\Entity\Timetracking;
use Beon\IntranetBundle\Entity\ConfigValue;
use Beon\IntranetBundle\Form\TaskType;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\SecurityContext;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Beon\IntranetBundle\Form\NoteType;
use Beon\IntranetBundle\Form\TimetrackingType;
use Beon\IntranetBundle\Entity\Note;
use Beon\IntranetBundle\Enums\TaskStatusEnum;
use Beon\IntranetBundle\Enums\TaskTypeEnum;
use Beon\IntranetBundle\Enums\UserGroupEnum;
use Beon\IntranetBundle\Enums\TimetrackingTariffEnum;
use Symfony\Component\HttpFoundation\Response;
use Beon\IntranetBundle\Entity\Log;

/**
 * Task controller.
 *
 */
class TaskController extends Controller
{


    private function composeUserChoiceForm($taskType = null)
    {
        return $this->createFormBuilder(
            null,
            [
                'action' => $this->generateUrl('task')

            ]
        )
            ->add(
                'user',
                'entity',
                [
                    'attr' => ['class' => 'searchSelect'],
                    'class' => 'IntranetBundle:User',
                    'empty_value' => '',
                    'required' => false,
                    'query_builder' => function ($repository) use ($taskType) {
                            /** @var $repository UserRepository */
                            return $repository->getUsersForTask($taskType);
                        }
                ]
            )
             ->add(
               'stakeholder',
                'entity',
                [
                    'attr' => ['class' => 'searchSelect'],
                    'class' => 'IntranetBundle:Customer',
                    'empty_value' => '',
                    'required' => false,
                    'query_builder' => function ($repository) {
                            /** @var $repository CustomerRepository */
                            $security = $this->container->get('security.context');
                            $qb = $repository->createQueryBuilder('c');
                            if ($security->getToken()->getUser()->getCustomer()) {
                                $qb->where('c.id = :cid')->setParameter('cid', $security->getToken()->getUser()->getCustomer()->getId());
                            }
                            return $qb;
                        }
                ]
             )
            ->add('submit', 'submit', array('label' => 'Filter', 'attr' => ['class' => 'btn btn-table-actions']))
            ->add(
                'clear',
                'submit',
                array('label' => 'Clear', 'attr' => ['value' => 1, 'class' => 'btn btn-table-actions'])
            );
    }

    /**
     * Lists all Task entities.
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        /** @var $repository TaskRepository */
        $repository = $em->getRepository('IntranetBundle:Task');

        $page = 0;
        $pageFromRequest = $request->request->get('currentPage');
        $pagerName = $request->request->get('pagerName');
        $page = $pageFromRequest ? $pageFromRequest : $page;

        /** @var $securityContext SecurityContext */
        $securityContext = $this->get('security.context');
        /** @var $userRepository UserRepository */
        $userRepository = $em->getRepository('IntranetBundle:User');
        $customerRepository = $em->getRepository('IntranetBundle:Customer');
        $chosenUserId = null;
        $chosenCustomerId = null;
        $taskType = null;

        if ($securityContext->isGranted('ROLE_TASKS_CUSTOMER')) {
            $taskType = TaskTypeEnum::GRAPHICS;
            $chosenUserId = $userRepository->getUsersForTask($taskType)->getQuery()->getResult();
            $cid = $securityContext->getToken()->getUser()->getCustomer()->getId();
            $chosenCustomerId = array_keys($customerRepository->getCompleteChildParentMapDown($cid));
            $chosenCustomerId[] = $cid;
            $userChoiceForm = null;
        } elseif ($securityContext->isGranted('ROLE_TASKS_OWNGROUP')) {
            $chosenUserId = $userRepository->getUsersByGroup($securityContext->getToken()->getUser()->getGroup())->getQuery()->getResult();
        } elseif ($securityContext->isGranted('ROLE_TASKS_OWN')) {
            $chosenUserId = $securityContext->getToken()->getUser()->getId();
        }

        $clear = isset ($request->request->get('form')['clear']);

	if ($clear) {
            $userChoiceForm = $this->composeUserChoiceForm($taskType)->getForm();
        } else {
            $userChoiceForm = $this->composeUserChoiceForm($taskType)->getForm()->handleRequest($request);
            if ($chosenUser = $userChoiceForm->get('user')->getData()) {
                $chosenUserId = $chosenUser->getId();
            }

            if ($chosenStakeholder = $userChoiceForm->get('stakeholder')->getData()) {
                $chosenCustomerId = array_keys($customerRepository->getCompleteChildParentMapDown($chosenStakeholder->getId()));
                $chosenCustomerId[] = $chosenStakeholder->getId();
            }
        }


        if ($pagerName) {
            return $this->renderPage($pagerName, $page);
        } else {
            /** @var $session Session */
            $session = $this->get('session');
            $session->start();

            $session->set('taskUserId', $chosenUserId);
            $session->set('taskCustomerId', $chosenCustomerId);

            return $this->render(
                'IntranetBundle:Task:index.html.twig',
                array(
                    'notStarted' => $repository->findNotStarted(0, $chosenUserId, $chosenCustomerId),
                    'notStartedPagesCount' => $repository->findNotStarted(-1, $chosenUserId, $chosenCustomerId),
                    'inProgress' => $repository->findInProgress(0, $chosenUserId, $chosenCustomerId),
                    'inProgressPagesCount' => $repository->findInProgress(-1, $chosenUserId, $chosenCustomerId),
                    'internalWait' => $repository->findInternalWait(0, $chosenUserId, $chosenCustomerId),
                    'internalWaitPagesCount' => $repository->findInternalWait(-1, $chosenUserId, $chosenCustomerId),
                    'externalWait' => $repository->findExternalWait(0, $chosenUserId, $chosenCustomerId),
                    'externalWaitPagesCount' => $repository->findExternalWait(-1, $chosenUserId, $chosenCustomerId),
                    'thirdPartyWait' => $repository->findThirdPartyWait(0, $chosenUserId, $chosenCustomerId),
                    'thirdPartyWaitPagesCount' => $repository->findThirdPartyWait(-1, $chosenUserId, $chosenCustomerId),
                    'approved' => $repository->findApproved(0, $chosenUserId, $chosenCustomerId),
                    'approvedPagesCount' => $repository->findApproved(-1, $chosenUserId, $chosenCustomerId),
                    'printing' => $repository->findPrinting(0, $chosenUserId, $chosenCustomerId),
                    'printingPagesCount' => $repository->findPrinting(-1, $chosenUserId, $chosenCustomerId),
                    'done' => $repository->findDone(0, $chosenUserId, $chosenCustomerId),
                    'donePagesCount' => $repository->findDone(-1, $chosenUserId, $chosenCustomerId),
                    'aborted' => $repository->findAborted(0, $chosenUserId, $chosenCustomerId),
                    'abortedPagesCount' => $repository->findAborted(-1, $chosenUserId, $chosenCustomerId),
                    'userChoiceForm' => $userChoiceForm->createView()
                )
            );
        }
    }

    /**
     * Creates a new Task entity.
     */
    public function createAction($duplicateTaskId=false, Request $request)
    {
	    $entity = new Task();

        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {

            /** @var $securityContext SecurityContext */
            $securityContext = $this->get('security.context');

            if ($securityContext->getToken()->getUser()->getCustomer()) {
                $entity->setCustomer($securityContext->getToken()->getUser()->getCustomer());
            }

            $entity->setCreatedBy($securityContext->getToken()->getUser());
            $entity->setCreatedAt(new \DateTime());

            $em = $this->getDoctrine()->getManager();
            if ($entity->getType() == TaskTypeEnum::GRAPHICS) {
                if (!$entity->getUser() || $entity->getUser()->getGroup() != UserGroupEnum::GRAPHICS) {
                    $graphicsUser = $em->getRepository("IntranetBundle:User")->findOneById(13);
                    $entity->setUser($graphicsUser);
                }

                $entity->setDueDateOffset($this->getDoctrine()->getManager()->getRepository('IntranetBundle:ConfigValue')->getAddDays($entity)->getActualDays());
            }

            $logEntity = new Log();
		    $logEntity->setUser( $securityContext->getToken()->getUser() );
		    $logEntity->setAction( LogActionEnum::CREATED );
            $logEntity->setTask( $entity );
		    $logEntity->setCreatedAt( new \DateTime() );
		    $em->persist( $logEntity );

	        $redirect = $form->get('redirect')->getData();

	        /* if duplicate of task */
	        if ($duplicateTaskId) {
		    $duplicateTaskEntity = $em->getRepository('IntranetBundle:Task')->find($duplicateTaskId);
		    $entity->setDuplicateOf($duplicateTaskEntity);

		    $em->persist($entity);
		    $em->flush();

		    /* if having uploads */
		    $uploads = $em->getRepository('IntranetBundle:Upload')->findBy(array('task' => $duplicateTaskEntity));

		    if ($uploads) {
		        foreach ($uploads as $upload) {
			    $newupload = clone $upload;
			    $newupload->setTask($entity);
			    $em->persist($newupload);
			    $em->flush();
		        }
		    }
	    } else {
	  	$em->persist($entity);
		$em->flush();


		/* upload file */
		$uploadFileObject= $form->get('uploadFile')->getData();

		if ($entity && $uploadFileObject) {
			$fileUploadService = $this->get('UploadFileService');
			$fileUploadService->upload($uploadFileObject, $entity);
		}
	    }

            $redirect = ($redirect) ? $redirect : $this->generateUrl('task_show', array('id' => $entity->getId()));

            return $this->redirect($redirect);
        }

        return $this->render(
            'IntranetBundle:Task:new.html.twig',
            array(
                'entity' => $entity,
                'form' => $form->createView(),
            )
        );
    }


    /**
     * Creates a form to create a Task entity.
     *
     * @param Task $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Task $entity, $duplicateTaskId=false)
    {
        $form = $this->createForm(
            new TaskType(),
            $entity,
            array(
                'action' => $this->generateUrl('task_create', array('duplicateTaskId'=>$duplicateTaskId)),
                'method' => 'POST',
            )
        );


        $form
	    ->add('submit', 'submit', array('label' => 'Create', 'attr' => array('class' => 'btn btn-table-actions')))
            ->add('submit', 'submit', array('label' => 'Create', 'attr' => array('class' => 'btn btn-table-actions')))
            ->add(
                'redirect',
                'hidden',
                [
                    'data' => null,
                    'mapped' => false
                ]
            );

        /** @var $securityContext SecurityContext */
        $securityContext = $this->get('security.context');
        return $form;
    }

    /**
     * Displays a form to create a new Task entity.
     */
    public function newAction($duplicateTaskId=false)
    {
	    $em = $this->getDoctrine()->getManager();

	    /* if generate duplicate task */
	    if ($duplicateTaskId) {
	        $entity = $em->getRepository('IntranetBundle:Task')->find($duplicateTaskId);
            CheckAccess::userWithTask($entity, false);
	        $entity->resetState();
	        $entity->setId(NULL);
	    } else {
	        $entity = new Task();
	    }

        $form = $this->createCreateForm($entity, $duplicateTaskId);

        return $this->render(
            'IntranetBundle:Task:new.html.twig',
            array(
                'entity' => $entity,
                'form' => $form->createView(),
                'addDaysWarningMessages' => $this->getDoctrine()->getManager()->getRepository('IntranetBundle:ConfigValue')->getAddDaysWarningMessages(),
            )
        );
    }

    /**
     * Finds and displays a Task entity.
     */
    public function showAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
	    $entity = $em->getRepository('IntranetBundle:Task')->find($id);
        $duplicatedTask = $em->getRepository('IntranetBundle:Task')->findDuplicates($entity);
        $logs = $em->getRepository('IntranetBundle:Log')->getApprovalLogs($entity,'task');
        CheckAccess::userWithTask($entity);
        $duplicateForm = $this->createDuplicateForm($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Task entity.');
        }

	    /* @var $repository TaskRepository */
        $timetrackingEntities = $this->getDoctrine()->getRepository('IntranetBundle:TimeTracking')->findByTask($entity);

        $uploadFileForm = $this->createFormBuilder()
            ->setAction($this->generateUrl('upload_new'))
            ->add('presenter', 'hidden', array('data' => 'task'))
            ->add('presenterId', 'hidden', array('data' => $entity->getId()))
            ->add(
                'submit',
                'submit',
                array('label' => 'Upload file', 'attr' => array('class' => 'btn btn-table-actions'))
            )
            ->getForm();

        return $this->render(
            'IntranetBundle:Task:show.html.twig',
            array(
                'entity' => $entity,
                'approveForm' => ApprovementFormComposer::composeApprove($this, $entity)->createView(),
                'denyForm' => ApprovementFormComposer::composeDeny($this, $entity)->createView(),
                'delete_form' => $this->createDeleteForm($id)->createView(),
                'duplicate_form' => $duplicateForm->createView(),
                'upload_file_form' => CheckAccess::hasReadOnlyAccess() ? null : $uploadFileForm->createView(),
                'duplicateTask' => $duplicatedTask,
                'timetrackingEntities'=> $timetrackingEntities,
                'logs' => $logs,
                'readOnly' => CheckAccess::hasReadOnlyAccess(),
            )
        );
    }

    /**
     * Displays a form to edit an existing Task entity.
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        /** @var $entity Task */
        $entity = $em->getRepository('IntranetBundle:Task')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Task entity.');
        }

        CheckAccess::userWithTask($entity, false);

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        $uploadForms = array();
        /** @var $upload Upload */

        foreach ($entity->getUploads() as $upload) {
            $uploadForms[$upload->getId()] = FormHelper::composeDeleteForm(
                $this,
                array(
                    'action' => 'upload_delete',
                    'actionParameters' => array('id' => $upload->getId()),
                    'redirectPath' => 'task_edit',
                    'redirectParams' => array('id' => $entity->getId()),
                )
            );
        }

        $uploadFileForm = $this->createFormBuilder()
            ->setAction($this->generateUrl('upload_new'))
            ->add('presenter', 'hidden', array('data' => 'task'))
            ->add('presenterId', 'hidden', array('data' => $entity->getId()))
            ->add(
                'submit',
                'submit',
                array('label' => 'Upload file', 'attr' => array('class' => 'btn btn-table-actions'))
            )
            ->getForm();

        return $this->render(
            'IntranetBundle:Task:edit.html.twig',
            array(
                'entity' => $entity,
                'edit_form' => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
                'upload_file_form' => $uploadFileForm->createView(),
                'uploadDeleteForms' => $uploadForms,
                'addDaysWarningMessages' => $this->getDoctrine()->getManager()->getRepository('IntranetBundle:ConfigValue')->getAddDaysWarningMessages($entity),
            )
        );
    }

    /**
     * Creates a form to edit a Task entity.
     *
     * @param Task $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Task $entity)
    {
        $form = $this->createForm(
            new TaskType(),
            $entity,
            array(
                'action' => $this->generateUrl('task_update', array('id' => $entity->getId())),
                'method' => 'PUT',
            )
        );

        $form->add('submit', 'submit', array('label' => 'Update', 'attr' => array('class' => 'btn btn-table-actions')));

        return $form;
    }

    /**
     * Edits an existing Task entity.
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        /** @var $entity Task */
        $entity = $em->getRepository('IntranetBundle:Task')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Task entity.');
        }

        CheckAccess::userWithTask($entity, false);

        $expedited = $entity->getExpedited();
        $newDesign = $entity->getNewDesign();
        $status = $entity->getStatus();

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            if ($expedited != $entity->getExpedited() || $newDesign != $entity->getNewDesign()) {
                $entity->setDueDateOffset($this->getDoctrine()->getManager()->getRepository('IntranetBundle:ConfigValue')->getAddDays($entity)->getActualDays());
            }

            if ($status != $entity->getStatus()) {
                $logEntity = new Log();
		        $logEntity->setUser( $this->get('security.context')->getToken()->getUser() );
		        $logEntity->setAction( LogActionEnum::STATUSCHANGE_TASK );
                $logEntity->setTask( $entity );
                $logEntity->setStatus( $entity->getStatus() );
		        $logEntity->setCreatedAt( new \DateTime() );
		        $em->persist( $logEntity );
		    }

            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('task_edit', array('id' => $id)));
        }

        return $this->render(
            'IntranetBundle:Task:edit.html.twig',
            array(
                'entity' => $entity,
                'edit_form' => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
            )
        );
    }

    /**
     * Deletes a Task entity.
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IntranetBundle:Task')->find($id);
            CheckAccess::userWithTask($entity, false);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Task entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('task'));
    }

    /**
     * Creates a form to delete a Task entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('task_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete', 'attr' => array('class' => 'btn btn-table-actions')))
            ->getForm();
    }

    /**
     * Notify about existence of task.
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function notifyAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('IntranetBundle:Task')->find($id);
        CheckAccess::userWithTask($entity, false);
        
        $securityContext = $this->get('security.context');
        $user = $securityContext->getToken()->getUser();

        $logEntity = new Log();
        $logEntity->setUser($user);
        $logEntity->setAction( LogActionEnum::NOTIFIED);
        $logEntity->setTask( $entity );
        $logEntity->setCreatedAt( new \DateTime() );
        $em->persist( $logEntity );
        $em->flush();

        $mailBody = nl2br($this->renderView(
            'IntranetBundle:Task:mailNotify.html.twig',
            array(
                'entity' => $entity,
                'link' => $this->generateUrl(
                        'task_show',
                        ['id' => $entity->getId()],
                        UrlGeneratorInterface::ABSOLUTE_URL
                    ),
            )
        ));

        $recipients = array();
        $recipients[$entity->getUser()->getId()] = $entity->getUser();
        if ($entity->getCarbonCopy()) {
            $recipients[$entity->getCarbonCopy()->getId()] = $entity->getCarbonCopy();
        }

        foreach ($recipients as $recipient) {
            $message = \Swift_Message::newInstance()
                ->setSubject('Benachrichtigung Aufgabe')
                ->setFrom($this->container->getParameter('fromEmail'))
                ->setTo($recipient->getEmail())
                ->setBody($mailBody, 'text/html', 'utf-8');
            $send = $this->get('mailer')->send($message);
        }

        if ($send == 1) {
            $this->get('session')->getFlashBag()->set('error', 'Successfully Send');
        }

        return $this->redirect($this->generateUrl('task'));
    }

    public function newRelatedAction($id, $name)
    {
        $em = $this->getDoctrine()->getManager();

        /** @var $complaint Customer*/
        $task = $em->getRepository('IntranetBundle:Task')->find($id);
        CheckAccess::userWithTask($task, false);

        $entity = null;
        $form = null;
        $view = null;

        switch ($name) {

            case "timetracking":
                $entity = new Timetracking();
                $entity->setTask($task);
                $form = $this->createEditFormWithType($entity, new TimetrackingType(), $name);
                $view = 'IntranetBundle:Timetracking:new.html.twig';
                break;

            case "note":
                $entity = new Note();
                $entity->setTask($task);
                $form = $this->createEditFormWithType($entity, new NoteType(), $name);
                $view = 'IntranetBundle:Note:new.html.twig';
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

    private function createEditFormWithType($entity, $formType, $name)
    {
        $options = array(
            'action' => $this->generateUrl($name . '_create'),
            'method' => 'POST',
        );
        if ($name == 'timetracking') {
            $options['mode'] = 'task';
        }
        /** @var $entity Note */
        $form = $this->createForm(
            $formType,
            $entity,
            $options
        );

        $form->add('submit', 'submit', array('label' => 'Create', 'attr' => array('class' => 'btn btn-table-actions')));

        if ($name == 'note') {
            $form->add(
                'redirect',
                'hidden',
                [
                    'data' => $this->generateUrl('task_show', ['id' => $entity->getTask()->getId()]),
                    'mapped' => false
                ]
            );
        }

        return $form;
    }

    public function sendApprovalEmailAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        /** @var $task Task */
        $task = $em->getRepository('IntranetBundle:Task')->find($id);

        $mailQueue = new MailQueue();
        $logEntity = new Log();
        /** @var $securityContext SecurityContext */
        $securityContext = $this->get('security.context');

        $users = array();
        if ((!$task->getCreatedBy() || $task->getCreatedBy()->getGroup() == UserGroupEnum::EMPLOYEES) && $securityContext->getToken()->getUser()->getGroup() != UserGroupEnum::EMPLOYEES) {
            if ($task->getCreatedBy()) {
                $users[] = $task->getCreatedBy();
            } else {
                $users[] = $em->getRepository("IntranetBundle:User")->findOneByName('markus');
            }

            $internal = true;

        } else {
            /** @var $customer Customer */
            $customer = $task->getCustomer();

            /** @var $users User[] */
            if ($customer) {
                $users = $customer->getUsersWithRole('ROLE_TASKS_APPROVE');
            }

            $internal = false;
        }

        if (!$users) {
            $this->get('session')->getFlashBag()->set('error', 'There are no users (with sufficient permissions) for this customer');
        } else {
            if ($internal) {
                $task->setInternalapprovalmailsent(true);
                $logEntity->setAction( LogActionEnum::INTERNAL_APPROVAL_MAIL_SENT );
                $task->setInternalApprovementSender($securityContext->getToken()->getUser());
            } else {
                $task->setApprovalmailsent(true);
                 $logEntity->setAction( LogActionEnum::EXTERNAL_APPROVAL_MAIL_SENT );
                $task->setApprovementSender($securityContext->getToken()->getUser());
            }

            $mailBody = nl2br($this->renderView(
                'IntranetBundle:Task:' . ($internal ? 'mailApproveInternal' : 'mailApprove') . '.html.twig',
                array(
                    'entity' => $task,
                    'sender' => $task->getInternalApprovementSender() ?: $task->getApprovementSender(),
                    'link' => $this->generateUrl(
                            'task_show',
                            ['id' => $task->getId()],
                            UrlGeneratorInterface::ABSOLUTE_URL
                        ),
                    'link_campaign' => $task->getCampaign() ? $this->generateUrl(
                            'campaign_show',
                            ['id' => $task->getCampaign()->getId()],
                            UrlGeneratorInterface::ABSOLUTE_URL
                        ) : null,
                )
            ));

            $mailQueue
                ->setEntity(get_class($task))
                ->setEntityId($task->getId())
                ->setSentDate(new \DateTime());

	        $sentMessages = array();

            foreach ($users as $user) {
                $message = \Swift_Message::newInstance()
                    ->setSubject('Bitte Freigabe für Auftrag ' . sprintf('AG%05d', $task->getId()) . ' erteilen')
                    ->setFrom($this->container->getParameter('fromEmail'))
                    ->setTo($user->getEmail())
                    ->setBody($mailBody, 'text/html', 'utf-8');

                $this->get('mailer')->send($message);

                if (!$internal) {
		            $sentMessages[] = $message;
                }
            }


            $logEntity->setUser($securityContext->getToken()->getUser());
            $logEntity->setTask( $task );
            $logEntity->setCreatedAt( new \DateTime() );
            $em->persist( $logEntity );

            $task->setStatus(TaskStatusEnum::IN_PROGRESS);
            $mailQueue->setRedirect('task_show');

            if (count($sentMessages)>0) {
		        $task->setSerializedApprovalMail(serialize($sentMessages));
            }

            $task->setFirstApprovalMailSentAt(new \DateTime());
            $task->setLastApprovalMailSentAt(new \DateTime());

            $em->persist($task);
            $em->persist($mailQueue);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('task_show', ['id' => $task->getId()]));
    }

    public function guessPrintCostAction(Request $request) {
      $repo = $this->getDoctrine()->getRepository('IntranetBundle:Task');
      $qb = $repo->createQueryBuilder('t');
      $qb->select(array('tt.id', 'tt.hours'));
      $qb->innerJoin('t.timetrackings', 'tt', 'WITH', 'IDENTITY(tt.tariff)  = ' . TimetrackingTariffEnum::DRUCKKOSTEN);
      $qb->andWhere('t.type = ' . TaskTypeEnum::GRAPHICS);
      if ($request->request->has('type')) {
        $qb->andWhere('IDENTITY(t.graphicsType) = :type')->setParameter('type', $request->request->get('type'));
      }
      if ($request->request->has('format')) {
        $qb->andWhere('IDENTITY(t.graphicsFormat) = :format')->setParameter('format', $request->request->get('format'));
      }
      if ($request->request->has('circulation')) {
        $qb->andWhere('IDENTITY(t.graphicsCirculation) = :circulation')->setParameter('circulation', $request->request->get('circulation'));
      }
      if ($request->request->has('paper')) {
        $qb->andWhere('IDENTITY(t.paperType) = :paper')->setParameter('paper', $request->request->get('paper'));
      }
      $qb->groupBy('t.id');
      $qb->having('COUNT(tt.id) = 1');
      $qb->orderBy('t.id', 'DESC');
      $qb->setMaxResults(15);
      $subquery = $qb->getQuery();
      
      $field = 'sub.hours1';
      $stm = $this->getDoctrine()->getManager()->getConnection()->prepare("SELECT COUNT(*) as count, MIN($field) as min, AVG($field) as avg, MAX($field) as max, GROUP_CONCAT(sub.id0) as ids FROM (" . $subquery->getSql() . ") as sub");
      $stm->execute(array_map(function($p) { return $p->getValue(); }, $subquery->getParameters()->toArray()));
     
      $ret = $stm->fetch(\PDO::FETCH_OBJ);
      $ret->reqId = $request->request->get('reqId');
      if ($ret->count) {
        if ($ret->min == $ret->max) {
          $ret->output = number_format($ret->min, 2, ',', '.') . ' &euro;';
        } else {
          $ret->output = number_format($ret->min, 2, ',', '.') . ' &euro; &ndash; ' . number_format($ret->max, 2, ',', '.') . ' &euro; (&empty; ' . number_format($ret->avg, 2, ',', '.') . ' &euro;)';
        }
      }
      return new Response(json_encode($ret));
    }

    public function approveAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        /** @var $entity Task */
        $entity = $em->getRepository('IntranetBundle:Task')->find($id);
        CheckAccess::userWithTask($entity, false);

        $form = ApprovementFormComposer::composeApprove($this, $entity);
        $form->handleRequest($request);
        if ($form->isValid()) {
            list($approver, $comment) = ApprovementFormComposer::handleApprove($this, $form, $entity);

            $entity->setApproved(true);
            $entity->setSerializedApprovalMail(null);
            $entity->setApprovedAt(new \DateTime());
            $entity->setApprovedBy($approver);

            $recipients = array();
            $recipients[$entity->getUser()->getId()] = $entity->getUser();
            if ($entity->getCarbonCopy()) {
                $recipients[$entity->getCarbonCopy()->getId()] = $entity->getCarbonCopy();
            }
            if ($entity->getInternalApprovementSender()) {
                $recipients[$entity->getInternalApprovementSender()->getId()] = $entity->getInternalApprovementSender();
            }
            if ($entity->getApprovementSender()) {
                $recipients[$entity->getApprovementSender()->getId()] = $entity->getApprovementSender();
            }
            unset($recipients[$approver->getId()]);

            foreach ($recipients as $recipient) {
                $mailBody = nl2br(
                    $this->renderView(
                        'IntranetBundle:Task:mailApproved.html.twig',
                        array(
                            'recipient' => $recipient,
                            'approver' => $approver,
                            'entity' => $entity,
                            'comment' => $comment,
                            'link' => $this->generateUrl(
                                    'task_show',
                                    ['id' => $entity->getId()],
                                    UrlGeneratorInterface::ABSOLUTE_URL
                                ),
                        )
                    )
                );

                $message = \Swift_Message::newInstance()
                    ->setSubject('Auftrag freigegeben')
                    ->setFrom($this->container->getParameter('fromEmail'))
                    ->setTo($recipient->getEmail())
                    ->setBody($mailBody, 'text/html', 'utf-8');
                $this->get('mailer')->send($message);
            }


            $this->get('session')->getFlashBag()->set('error', 'Freigabe erfolgreich');
            $em->persist($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('task_show', ['id' => $id]));
    }


    public function denyAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        /** @var $entity Task */
        $entity = $em->getRepository('IntranetBundle:Task')->find($id);
        CheckAccess::userWithTask($entity, false);

        $form = ApprovementFormComposer::composeDeny($this, $entity);
        $form->handleRequest($request);
        if ($form->isValid()) {
            list($denier, $reason) = ApprovementFormComposer::handleDeny($this, $form, $entity);

            $entity->setDueDateOffset(3, true);
            $entity->setApprovalmailsent(false);
            $entity->setInternalapprovalmailsent(false);
            $entity->setSerializedApprovalMail(null);

            $recipients = array();
            $recipients[$entity->getUser()->getId()] = $entity->getUser();
            if ($entity->getCarbonCopy()) {
                $recipients[$entity->getCarbonCopy()->getId()] = $entity->getCarbonCopy();
            }
            if ($entity->getInternalApprovementSender()) {
                $recipients[$entity->getInternalApprovementSender()->getId()] = $entity->getInternalApprovementSender();
            }
            if ($entity->getApprovementSender()) {
                $recipients[$entity->getApprovementSender()->getId()] = $entity->getApprovementSender();
            }
            unset($recipients[$denier->getId()]);

            foreach ($recipients as $recipient) {
                $mailBody = nl2br($this->renderView(
                    'IntranetBundle:Task:mailDenied.html.twig',
                    array(
                        'recipient' => $recipient,
                        'denier' => $denier,
                        'entity' => $entity,
                        'reason' => $reason,
                        'link' => $this->generateUrl(
                                'task_show',
                                ['id' => $entity->getId()],
                                UrlGeneratorInterface::ABSOLUTE_URL
                            ),
                    )
                ));

                $message = \Swift_Message::newInstance()
                    ->setSubject('Korrekturwunsch')
                    ->setFrom($this->container->getParameter('fromEmail'))
                    ->setTo($recipient->getEmail())
                    ->setBody($mailBody, 'text/html', 'utf-8');
                $this->get('mailer')->send($message);
            }

            $em->persist($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('task_show', ['id' => $id]));
    }

    public function duplicateDownAction($id,$type)
    {

        $em = $this->getDoctrine()->getManager();
        $taskrepo = $em->getRepository('IntranetBundle:Task');
        $task = $taskrepo->find($id);
        $affType = $task->getCustomer();

        if ($affType->getLevel() != 1) {
            throw $this->createNotFoundException('Unable to find Affliation type customer');
        }

        $customerRepository = $em->getRepository('IntranetBundle:Customer');

        if($type == 'all'){
            $children = $customerRepository->getChildren($affType, 2);
        }else{
            $children = $customerRepository->getChildren($affType, 2, true);
        }

        foreach ($children as $i => $child) {
            if ($i == 0) {
                $task->setCustomer($child);
                $task->resetState();
                $em->persist($task);
                $em->flush();
            } else {
                $taskrepo->insertDuplicateTaskByStakeHolderChildren($task, $child);
            }
        }

        return $this->redirect($this->generateUrl('task_show', array('id' => $task->getId())) . '#duplicates');
    }

    public function duplicateAction($id)
    {
	    return $this->newAction($id);
    }


    private function createDuplicateForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('task_duplicate', array('id' => $id)))
            ->setMethod('POST')
            ->add('submit', 'submit', array('label' => 'Duplicate', 'attr' => array('class' => 'btn btn-table-actions')))
            ->getForm();
    }

    private function renderPage($pagerName, $page)
    {

        /** @var $session Session */
        $session = $this->get('session');

        /** @var $repository TaskRepository */
        $repository = $this->getDoctrine()->getRepository('IntranetBundle:Task');

        $chosenUserId = $session->get('taskUserId');
        $chosenCustomerId = $session->get('taskCustomerId');
        $entities = null;

        switch (trim($pagerName)) {
            case 'notStarted':
                $entities = $repository->findNotStarted($page, $chosenUserId, $chosenCustomerId);
                break;

            case 'inProgress':
                $entities = $repository->findInProgress($page, $chosenUserId, $chosenCustomerId);
                break;

            case 'internalWait':
                $entities = $repository->findInternalWait($page, $chosenUserId, $chosenCustomerId);
                break;

            case 'externalWait':
                $entities = $repository->findExternalWait($page, $chosenUserId, $chosenCustomerId);
                break;

            case 'thirdPartyWait':
                $entities = $repository->findThirdPartyWait($page, $chosenUserId, $chosenCustomerId);
                break;

            case 'approved':
                $entities = $repository->findApproved($page, $chosenUserId, $chosenCustomerId);
                break;

            case 'printing':
                $entities = $repository->findPrinting($page, $chosenUserId, $chosenCustomerId);
                break;

            case 'done':
                $entities = $repository->findDone($page, $chosenUserId, $chosenCustomerId);
                break;

            case 'aborted':
                $entities = $repository->findAborted($page, $chosenUserId, $chosenCustomerId);
                break;
        }

        return $this->render(
            'IntranetBundle:Task:indexRaw.html.twig',
            array(
                'entities' => $entities
            )
        );
    }

    /**
     * Lists all Time Tracking entities based on task.
     *
     */
    public function listTimeTrackingAction(Request $request)
    {
       /** @var $repository TaskRepository */
        $timetrackingEntities = $this->getDoctrine()->getRepository('IntranetBundle:TimeTracking')->findByTask();

	    return $this->render(
            'IntranetBundle:Task:indexRaw.html.twig',
            array(
                'entities' => $entities
            )
        );
    }

    public function submitFilesAction( Request $request )
    {
        if ($request->isXmlHttpRequest()) {
            $id = $request->request->get( 'id' );
            $uploadIds = explode( ',', $request->request->get( 'uploadIds' ) );
            //$uploadIds = [471,528];
            $securityContext = $this->get('security.context');
            $user = $securityContext->getToken()->getUser();

            if( !$securityContext->isGranted('ROLE_CAMPAIGNS_SUBMITFILES') )
            {
                 $jsonResponse = json_encode( array(
                        'status' => false,
                        'msg' => 'You are not authorized to submit files.'
                    ) );
                 return new Response( $jsonResponse );
            }

            $task = $this->getDoctrine()
                        ->getManager()
                        ->getRepository('IntranetBundle:Task')
                        ->find($id);

            $campaign = $task->getCampaign();
            $contact  = $campaign->getContact();

            if ($task->getSubmitFilesStatus() && $uploadIds)
            {
                $uploads = $task->getUploads();
                $links = [];
                foreach( $uploads as $upload ){
                    if( in_array( $upload->getId(), $uploadIds ) ) {
                        $links[] = array(
                            'href'     => $this->generateUrl(
                                'upload_download_public',
                                ['id' => $upload->getId(), 'fsFilename' => $upload->getFsFilename()],
                                UrlGeneratorInterface::ABSOLUTE_URL
                            ),
                            'filename' => $upload->getFilename()
                        );
                    }
                }

                $mailBody = nl2br($this->renderView(
                    'IntranetBundle:Task:mailSubmitFiles.html.twig',
                    array(
                        'task'      => $task,
                        'sender'    => $securityContext->getToken()->getUser(),
                        'links'     => $links
                    )
                ));

                //echo $mailBody;

                $message = \Swift_Message::newInstance()
                    ->setSubject('Zusendung Druckunterlagen zur Bestellung ' . $campaign->getId() )
                    ->setFrom($this->container->getParameter('fromEmail'))
                    ->setTo($contact->getEmail())
                    ->setBody($mailBody, 'text/html', 'utf-8');
                $send = $this->get('mailer')->send($message);

                if( $send )
                {
                    $this->getDoctrine()
                        ->getManager()
                        ->getRepository('IntranetBundle:Upload')
                        ->setSubmittedFlag( $uploadIds );

                    $logEntity = new Log();
		            $logEntity->setUser( $securityContext->getToken()->getUser() );
		            $logEntity->setAction( LogActionEnum::FILES_SUBMITTED );
                    $logEntity->setTask( $task );
                    $logEntity->setCampaign( $campaign );
		            $logEntity->setCreatedAt( new \DateTime() );

		            $em = $this->getDoctrine()->getManager();
                    if ($campaign->getStatus() < CampaignStatusEnum::FILES_SUBMITTED) {
                        $campaign->setStatus(CampaignStatusEnum::FILES_SUBMITTED);
                        $em->persist( $campaign );
                    }
		            $em->persist( $logEntity );
		            $em->flush();

                    $jsonResponse = json_encode( array(
                        'status' => true,
                        'msg' => 'File(s) have been submitted successfully.'
                    ) );
                }
                else
                {
                     $jsonResponse = json_encode( array(
                        'status' => true,
                        'msg' => 'Unable to send email. Please try again later...'
                    ) );
                }
                return new Response( $jsonResponse );
            }

        }
    }
}
