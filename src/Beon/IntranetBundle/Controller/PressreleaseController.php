<?php

namespace Beon\IntranetBundle\Controller;

use Beon\IntranetBundle\Entity\Customer;
use Beon\IntranetBundle\Entity\Log;
use Beon\IntranetBundle\Entity\MailQueue;
use Beon\IntranetBundle\Entity\Note;
use Beon\IntranetBundle\Entity\Task;
use Beon\IntranetBundle\Entity\Upload;
use Beon\IntranetBundle\Entity\User;
use Beon\IntranetBundle\Enums\LogActionEnum;
use Beon\IntranetBundle\Enums\StatusEnum;
use Beon\IntranetBundle\Form\NoteType;
use Beon\IntranetBundle\Form\PressreleaseWithCustomerType;
use Beon\IntranetBundle\Form\TaskType;
use Beon\IntranetBundle\Helper\ApprovementFormComposer;
use Beon\IntranetBundle\Helper\FormHelper;
use Beon\IntranetBundle\Lib\CheckAccess;
use Beon\IntranetBundle\Lib\PaginationHelper;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Beon\IntranetBundle\Entity\Pressrelease;
use Beon\IntranetBundle\Form\PressreleaseType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Validator\Constraints\DateTime;
use Beon\IntranetBundle\Entity\Repository\PressreleaseRepository;
use Beon\IntranetBundle\Form\UserFilterType;

/**
 * Pressrelease controller.
 *
 */
class PressreleaseController extends Controller
{


    /**
     * Lists all Pressrelease entities.
     *
     */
    public function indexAction(Request $request)
    {
	
	/* applying filters */
	$userFilterService = $this->get('UserCustomerFilterService');
	$filterData =  $userFilterService->handleRequest('Pressrelease', $this, $request);
	$repository = $filterData['repository'];
	
        $page = 0;
        $pageFromRequest = $request->request->get('currentPage');
        $pagerName = $request->request->get('pagerName');
        /** @var $repository PressreleaseRepository */
        

        $page = $pageFromRequest ? $pageFromRequest : $page;

        /** @var $securityContext SecurityContext */
        $securityContext = $this->get('security.context');

        /** @var $user User */
        $user = $securityContext->getToken()->getUser();

        if ($user->getCustomer()) {
            $customerIds = array_keys($this->getDoctrine()->getRepository('IntranetBundle:Customer')->getCompleteChildParentMapDown($user->getCustomer()->getId()));
            $customerIds[] = $user->getCustomer()->getId();
        } else {
            $customerIds = null;
        }


        if ($pagerName) {

            $entities = null;

            switch (trim($pagerName)) {
                case 'submitted':
                    $entities = $repository->findSubmitted($page, $customerIds);
                    break;

                case 'approved':
                    $entities = $repository->findApproved($page, $customerIds);
                    break;

                case 'approvalEmailSent':
                    $entities = $repository->findApprovalEmailSend($page, $customerIds);
                    break;

                case 'deleted':
                    $entities = $repository->findDeleted($page, $customerIds);
                    break;

                case 'draft':
                    $entities = $repository->findDraft($page, $customerIds);
                    break;
            }

            return $this->render(
                'IntranetBundle:Pressrelease:indexRaw.html.twig',
                array(
                    'entities' => $entities
                )
            );

        } else {

            return $this->render(
                'IntranetBundle:Pressrelease:index.html.twig',
                [
                    'submitted' => $repository->findSubmitted($page, $customerIds),
                    'approved' => $repository->findApproved($page, $customerIds),
                    'approvalEmailSent' => $repository->findApprovalEmailSend($page, $customerIds),
                    'deleted' => $repository->findDeleted($page, $customerIds),
                    'draft' => $repository->findDraft($page, $customerIds),
                    'submittedPagesCount' => $repository->getSubmittedPagesCount($customerIds),
                    'approvedPagesCount' => $repository->getApprovedPagesCount($customerIds),
                    'approvalEmailSentdPagesCount' => $repository->getApprovalEmailSendPagesCount($customerIds),
                    'deletedPagesCount' => $repository->getDeletedPagesCount($customerIds),
                    'draftPagesCount' => $repository->getDraftPagesCount($customerIds),
                    'filterForm' => $filterData['filterForm']
                ]
                
            );
        }
    }

    /**
     * Creates a new Pressrelease entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Pressrelease();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        $usr = $this->get('security.context')->getToken()->getUser();


        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();

            if ($entity->getSubmitted()) {
                $entity->setSubmittedAt(new \DateTime());
            }

            $em->persist($entity);
            
            $logEntity = new Log();
		    $logEntity->setUser( $usr );
		    $logEntity->setAction( LogActionEnum::CREATED );
            $logEntity->setPressrelease( $entity );
		    $logEntity->setCreatedAt( new \DateTime() );
		    $em->persist( $logEntity );
		    
            $em->flush();

            return $this->redirect($this->generateUrl('pressrelease_edit', array('id' => $entity->getId())));

        }

        return $this->render(
            'IntranetBundle:Pressrelease:new.html.twig',
            array(
                'entity' => $entity,
                'form' => $form->createView(),
            )
        );
    }

    /**
     * Creates a form to create a Pressrelease entity.
     *
     * @param Pressrelease $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Pressrelease $entity)
    {
        $form = $this->createForm(
            new PressreleaseType(),
            $entity,
            array(
                'action' => $this->generateUrl('pressrelease_create'),
                'method' => 'POST',
            )
        );

        $form->add('submit', 'submit', array('label' => 'Create', 'attr' => array('class' => 'btn btn-table-actions')));

        return $form;
    }

    /**
     * Displays a form to create a new Pressrelease entity.
     *
     */
    public function newAction(Request $request)
    {
        $entity = new Pressrelease();
        $form = $this->createCreateForm($entity);

        $customer = null;

        $formData = $request->request->get('form');
        $customerId = isset($formData['customer_id']) ? $formData['customer_id'] : null;

        if ($customerId) {

            $em = $this->getDoctrine()->getManager();

            /** @var $customer Customer */
            $customer = $em->getRepository('IntranetBundle:Customer')->find($customerId);
            $form->remove('customer');
            $form->add('customer', 'hidden', array('data' => $customerId));
        }

        return $this->render(
            'IntranetBundle:Pressrelease:new.html.twig',
            array(
                'entity' => $entity,
                'form' => $form->createView(),
                'customer' => $customer
            )
        );
    }

    /**
     * Finds and displays a Pressrelease entity.
     *
     */
    public function showAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        /** @var $entity Pressrelease */
        $entity = $em->getRepository('IntranetBundle:Pressrelease')->find($id);
        $logs = $em->getRepository('IntranetBundle:Log')->getApprovalLogs($entity,'pressrelease');
        
        if ($entity->getSubmitted()) {
            $contactLogs = $em->getRepository('IntranetBundle:Log')->getContactSentLogs($entity,'pressrelease', LogActionEnum::SUBMITTED);
            $contacts = $this->getSubmittedContacts($contactLogs);
        } else {
            $contacts = $this->getCustomerContacts($entity);
        }

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pressrelease entity.');
        }

        CheckAccess::userWithPressRelease($entity);

        $submitMailBody = trim($this->renderView(
            'IntranetBundle:Pressrelease:mailPressSubmit.html.twig',
            array(
                'entity' => $entity,
                'sender' => $this->get('security.context')->getToken()->getUser()
            )
        ));

        $contacts = $this->getCustomerContacts($entity);
        return $this->render(
            'IntranetBundle:Pressrelease:show.html.twig',
            array(
                'entity' => $entity,
                'delete_form' => $this->createDeleteForm($id)->createView(),
                'approveForm' => ApprovementFormComposer::composeApprove($this, $entity)->createView(),
                'denyForm' => ApprovementFormComposer::composeDeny($this, $entity)->createView(),
                'logs' => $logs,
                'numberOfContacts' => count($contacts),
                'contacts' => $contacts,
                'submitMailBody' => $submitMailBody,
            )
        );
    }

    /**
     * Displays a form to edit an existing Pressrelease entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        /** @var $entity Pressrelease */
        $entity = $em->getRepository('IntranetBundle:Pressrelease')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pressrelease entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        $uploadDorms = array();
        /** @var $upload Upload */
        foreach ($entity->getUploads() as $upload) {
            $uploadDorms[$upload->getId()] = FormHelper::composeDeleteForm(
                $this,
                array(
                    'action' => 'upload_delete',
                    'actionParameters' => array('id' => $upload->getId()),
                    'redirectPath' => 'pressrelease_edit',
                    'redirectParams' => array('id' => $entity->getId())
                )
            );
        }

        $uploadFileForm = $this->createFormBuilder()
            ->setAction($this->generateUrl('upload_new'))
            ->add('presenter', 'hidden', array('data' => 'pressrelease'))
            ->add('presenterId', 'hidden', array('data' => $entity->getId()))
            ->add('submit', 'submit', array('label' => 'Upload file', 'attr' => array('class' => 'btn btn-table-actions')))
            ->getForm();


        return $this->render(
            'IntranetBundle:Pressrelease:edit.html.twig',
            array(
                'entity' => $entity,
                'edit_form' => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
                'upload_file_form' => $uploadFileForm->createView(),
                'uploadDeleteForms' => $uploadDorms
            )
        );
    }

    /**
     * Creates a form to edit a Pressrelease entity.
     *
     * @param Pressrelease $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Pressrelease $entity)
    {
        $form = $this->createForm(
            new PressreleaseType(),
            $entity,
            array(
                'action' => $this->generateUrl('pressrelease_update', array('id' => $entity->getId())),
                'method' => 'PUT',
            )
        );

        $form->add('submit', 'submit', array('label' => 'Update', 'attr' => array('class' => 'btn btn-table-actions')));

        return $form;
    }

    /**
     * Edits an existing Pressrelease entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IntranetBundle:Pressrelease')->find($id);
        $usr = $this->get('security.context')->getToken()->getUser();

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pressrelease entity.');
        }


        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);

        $editForm->handleRequest($request);

        if ($editForm->isValid()) {

            if (!$entity->getSubmitted()) {
                $entity->setSubmittedAt(null);
            }

            if ($entity->getSubmitted() && !$entity->getSubmittedAt()) {
                $entity->setSubmittedAt(new \DateTime());
            }


            $em->flush();

            return $this->redirect($this->generateUrl('pressrelease_edit', array('id' => $id)));
        }

        return $this->render(
            'IntranetBundle:Pressrelease:edit.html.twig',
            array(
                'entity' => $entity,
                'edit_form' => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
            )
        );
    }

    /**
     * Deletes a Pressrelease entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IntranetBundle:Pressrelease')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Pressrelease entity.');
            }

            $entity->setDeleted(true);

            $em->persist($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('pressrelease'));
    }

    public function sendApprovalEmailAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        /** @var $pressRelease Pressrelease */
        $pressRelease = $em->getRepository('IntranetBundle:Pressrelease')->find($id);
        $mailQueue = new MailQueue();
        /** @var $customer Customer */
        $customer = $pressRelease->getCustomer();

        /** @var $securityContext SecurityContext */
        $securityContext = $this->get('security.context');

        /** @var $users User[] */
        $users = $customer->getUsersWithRole('ROLE_PRESSRELEASES_APPROVE');

        if (!$users) {
            $this->get('session')->getFlashBag()->set('error', 'There are no users (with sufficient permissions) for this customer');
        } else {

            $mailBody = nl2br($this->renderView(
                'IntranetBundle:Pressrelease:mailApprove.html.twig',
                array(
                    'entity' => $pressRelease,
                    'sender' => $securityContext->getToken()->getUser(),
                    'link' => $this->generateUrl(
                            'pressrelease_show',
                            ['id' => $pressRelease->getId()],
                            UrlGeneratorInterface::ABSOLUTE_URL
                        ),
                )
            ));

            $mailQueue
                ->setEntity(get_class($pressRelease))
                ->setEntityId($pressRelease->getId())
                ->setSentDate(new \DateTime());
	    
	        $sentMessages = array();
            
            foreach ($users as $user) {
                $message = \Swift_Message::newInstance()
                    ->setSubject('Bitte Freigabe für Pressemitteilung/Imagetext "' . $pressRelease->getTitle() . '" erteilen')
                    ->setFrom($this->container->getParameter('fromEmail'))
                    ->setTo($user->getEmail())
                    ->setBody($mailBody, 'text/html', 'utf-8');

                $this->get('mailer')->send($message);
		
		        $sentMessages[] = $message;
            }

            if (!$pressRelease->getApprovalMailSentAt()) {
                $pressRelease->setApprovalMailSentAt(new \DateTime());
            }

            $logEntity = new Log();
            $logEntity->setUser($securityContext->getToken()->getUser());
            $logEntity->setAction( LogActionEnum::EXTERNAL_APPROVAL_MAIL_SENT );
            $logEntity->setPressrelease( $pressRelease );
            $logEntity->setCreatedAt( new \DateTime() );
            $em->persist( $logEntity );

            $pressRelease->setApprovalmailsent(1);
            $pressRelease->setApprovementSender($securityContext->getToken()->getUser());
            $mailQueue->setRedirect('pressrelease_show');
            
            if (count($sentMessages)>0) {
		        $pressRelease->setSerializedApprovalMail(serialize($sentMessages));
            }
            
            $pressRelease->setLastApprovalMailSentAt(new \DateTime());
            
            $em->persist($pressRelease);
            $em->persist($mailQueue);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('pressrelease_show', ['id' => $pressRelease->getId()]));
    }


    /**
     * Creates a form to delete a Pressrelease entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pressrelease_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete', 'attr' => array('class' => 'btn btn-table-actions')))
            ->getForm();
    }


    public function approveAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        /** @var $entity Pressrelease */
        $entity = $em->getRepository('IntranetBundle:Pressrelease')->find($id);

        $form = ApprovementFormComposer::composeApprove($this, $entity);
        $form->handleRequest($request);
        if ($form->isValid()) {
            list($approver, $comment) = ApprovementFormComposer::handleApprove($this, $form, $entity);

            $entity->setApproved(true);
            $entity->setSerializedApprovalMail(null);
            $entity->setApprovedAt(new \DateTime());
            $entity->setApprovedBy($approver);

            if ($approvementSender = $entity->getApprovementSender()) {
                $mailBody = nl2br($this->renderView(
                    'IntranetBundle:Pressrelease:mailApproved.html.twig',
                    array(
                        'recipient' => $approvementSender,
                        'approver' => $approver,
                        'entity' => $entity,
                        'comment' => $comment,
                        'link' => $this->generateUrl(
                                'pressrelease_show',
                                ['id' => $entity->getId()],
                                UrlGeneratorInterface::ABSOLUTE_URL
                            ),
                    )
                ));

                $message = \Swift_Message::newInstance()
                    ->setSubject('Pressemitteilung freigegeben')
                    ->setFrom($this->container->getParameter('fromEmail'))
                    ->setTo($approvementSender->getEmail())
                    ->setBody($mailBody, 'text/html', 'utf-8');
                $this->get('mailer')->send($message);
            }

            $this->get('session')->getFlashBag()->set('error', 'Freigabe erfolgreich');

            $em->persist($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('pressrelease_show', ['id' => $id]));
    }

    public function denyAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        /** @var $entity Pressrelease */
        $entity = $em->getRepository('IntranetBundle:Pressrelease')->find($id);

        $form = ApprovementFormComposer::composeDeny($this, $entity);
        $form->handleRequest($request);
        if ($form->isValid()) {
            list($denier, $reason) = ApprovementFormComposer::handleDeny($this, $form, $entity);

            $entity->setApprovalmailsent(false);
            $entity->setApprovalMailSentAt(null);
            $entity->setSerializedApprovalMail(null);

            if ($approvementSender = $entity->getApprovementSender()) {
                $mailBody = nl2br($this->renderView(
                    'IntranetBundle:Pressrelease:mailDenied.html.twig',
                    array(
                        'recipient' => $approvementSender,
                        'denier' => $denier,
                        'entity' => $entity,
                        'reason' => $reason,
                        'link' => $this->generateUrl(
                                'pressrelease_show',
                                ['id' => $entity->getId()],
                                UrlGeneratorInterface::ABSOLUTE_URL
                            ),
                    )
                ));

                $message = \Swift_Message::newInstance()
                    ->setSubject('Pressemitteilung abgelehnt')
                    ->setFrom($this->container->getParameter('fromEmail'))
                    ->setTo($approvementSender->getEmail())
                    ->setBody($mailBody, 'text/html', 'utf-8');
                $this->get('mailer')->send($message);
            }

            $em->persist($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('pressrelease_show', ['id' => $id]));
    }


    public function newRelatedAction($id, $name)
    {
        $em = $this->getDoctrine()->getManager();

        /** @var $complaint Customer */
        $pressrelease = $em->getRepository('IntranetBundle:Pressrelease')->find($id);

        $entity = null;
        $form = null;
        $view = null;

        switch ($name) {
            case "note":
                $entity = new Note();
                $entity->setPressrelease($pressrelease);
                $entity->setCustomer($pressrelease->getCustomer());
                $form = $this->createEditFormWithType($entity, new NoteType(), 'note');
                $view = 'IntranetBundle:Note:new.html.twig';
                break;
            case "task":
                $entity = new Task();
                $entity->setPressrelease($pressrelease);
                $entity->setCustomer($pressrelease->getCustomer());
                $form = $this->createEditFormWithType($entity, new TaskType(), 'task');
                $view = 'IntranetBundle:Task:new.html.twig';
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
        /** @var $entity Note */
        $form = $this->createForm(
            $formType,
            $entity,
            array(
                'action' => $this->generateUrl($name . '_create'),
                'method' => 'POST',
            )
        );

        $form
            ->add('submit', 'submit', array('label' => 'Create', 'attr' => array('class' => 'btn btn-table-actions')))
            ->add(
                'redirect',
                'hidden',
                [
                    'data' => $this->generateUrl('pressrelease_show', ['id' => $entity->getPressrelease()->getId()]),
                    'mapped' => false
                ]
            );

        return $form;
    }

    public function duplicateDownAction($id, $type) {
        $em = $this->getDoctrine()->getManager();
        $pressreleaseRepo = $em->getRepository('IntranetBundle:Pressrelease');
        $pressrelease = $pressreleaseRepo->find($id);
        $affType = $pressrelease->getCustomer();

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
                $pressrelease->setCustomer($child);
                $pressrelease->resetState();
                $em->persist($pressrelease);
                $em->flush();
            } else {
                $pressreleaseRepo->insertDuplicatePressreleaseByStakeHolderChildern($pressrelease, $child);
            }
        }

        return $this->redirect($this->generateUrl('pressrelease_show', array('id' => $pressrelease->getId())) . '#duplicates');
    }

    public function pressSubmitAction(Request $request) {
        if ($request->isXmlHttpRequest()) {
            $id = $request->request->get( 'id' );
            $uploadIds = explode( ',', $request->request->get( 'uploadIds' ) );

            $em = $this->getDoctrine()->getManager();
            $pressreleaseRepo = $em->getRepository('IntranetBundle:Pressrelease');
            $uploadRepo = $em->getRepository('IntranetBundle:Upload');
            $uploadDir = $this->container->getParameter('def.upload_path');
            $pressrelease = $pressreleaseRepo->find($id);
            $contacts = $this->getCustomerContacts($pressrelease);

            $uploads = $uploadRepo->findBy(array('pressrelease' => $pressrelease));
            /** @var $securityContext SecurityContext */
            $securityContext = $this->get('security.context');
            $pressrelease->setSubmitted(true);
            $pressrelease->setSubmittedAt(new \DateTime());
            $em->persist($pressrelease);

            $title = $pressrelease->getTitle() ? $pressrelease->getTitle() : '';
            $mailBody = $request->request->get('text');

            if ($mailBody && !empty($contacts)){
                $datetime = new \DateTime();
                $firstContact = true;

                foreach($contacts as $contact){
                    $logEntity = new Log();
                    $logEntity->setUser( $securityContext->getToken()->getUser() );
                    $logEntity->setAction( LogActionEnum::SUBMITTED );
                    $logEntity->setPressrelease( $pressrelease );
                    $logEntity->setCreatedAt( $datetime );
                    $logEntity->setContact($contact);
                    if ($firstContact) {
                        $logEntity->setText($mailBody);
                        $firstContact = false;
                    }
                    $em->persist( $logEntity );

                    $message = \Swift_Message::newInstance()
                                ->setSubject("Pressemitteilung: $title")
                                ->setFrom($this->container->getParameter('fromEmail'))
                                ->setTo($contact->getEmail())
                                ->setBody(nl2br($mailBody), 'text/html', 'utf-8');

                    foreach($uploads as $upload){
                        if( in_array( $upload->getId(), $uploadIds ) ) {
                            $attachment = \Swift_Attachment::fromPath( $uploadDir.'/'.$upload->getFsFilename());
                            $attachment->setFilename($upload->getFilename());
                            $message->attach($attachment);
                        }
                    }

                    $this->get('mailer')->send($message);
                }
            }

            $this->getDoctrine()
                ->getManager()
                ->getRepository('IntranetBundle:Upload')
                ->setSubmittedFlag( $uploadIds );

            $em->flush();

            $jsonResponse = json_encode( array(
                'status' => true,
                'msg' => 'fertig.'
            ));

            return new Response( $jsonResponse );
        }
    }

    /**
     * @param $pressrelease
     * @return mixed
     */
    private function getCustomerContacts($pressrelease)
    {
        $contacts = array();
        $customerLevel = $pressrelease->getCustomer()->getLevel();
        $customer = $pressrelease->getCustomer();
        if ($customerLevel > 2) {
            $customer = $pressrelease->getCustomer()->getParent();
        }
        $customerCity = $customer->getCity();
        if ($customerCity) {
            $contacts = $customerCity->getContacts();

            return $contacts;
        }

        return $contacts;
    }

    /**
     * @param $contactLogs
     * @return array
     */
    private function getSubmittedContacts($contactLogs)
    {
        $contacts = array();
        foreach ($contactLogs as $contactLog) {
            $contacts[] = $contactLog->getContact();
        }

        return $contacts;
    }
}
