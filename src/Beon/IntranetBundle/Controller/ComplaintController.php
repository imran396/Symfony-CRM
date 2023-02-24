<?php

namespace Beon\IntranetBundle\Controller;

use Beon\IntranetBundle\Entity\Note;
use Beon\IntranetBundle\Entity\Repository\ComplaintRepository;
use Beon\IntranetBundle\Entity\Task;
use Beon\IntranetBundle\Entity\User;
use Beon\IntranetBundle\Entity\Log;
use Beon\IntranetBundle\Form\NoteType;
use Beon\IntranetBundle\Form\TaskType;
use Beon\IntranetBundle\Lib\PaginationHelper;
use Beon\IntranetBundle\Lib\CheckAccess;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Beon\IntranetBundle\Entity\Complaint;
use Beon\IntranetBundle\Form\ComplaintType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Beon\IntranetBundle\Enums\ComplaintStatusEnum;
use Beon\IntranetBundle\Enums\ComplaintResolutionEnum;
use Beon\IntranetBundle\Enums\LogActionEnum;
use Beon\IntranetBundle\Form\UserFilterType;

/**
 * Complaint controller.
 *
 */
class ComplaintController extends Controller
{
    /**
     * Lists all Complaint entities.
     *
     */
    public function indexAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
	
	/* applying filters */
	$userFilterService = $this->get('UserCustomerFilterService');
	$filterData =  $userFilterService->handleRequest('Complaint', $this, $request);
	$repository = $filterData['repository'];
	
	
        $page = 0;
        $pageFromRequest = $request->request->get('currentPage');
        $pagerName = $request->request->get('pagerName');
        $page = $pageFromRequest ? $pageFromRequest : $page;

        /** @var $securityContext SecurityContext */
        $securityContext = $this->get('security.context');

        /** @var $user User */
        $user = $securityContext->getToken()->getUser()->getCustomer();


        if ($pagerName) {

            $entities = null;

            switch (trim($pagerName)) {
                case 'notStarted':
                    $entities = $repository->findNotStarted($page, $user);
                    break;

                case 'inProgress':
                    $entities = $repository->findInProgress($page, $user);
                    break;

                case 'feedback':
                    $entities = $repository->findAwaitingFeedBack($page, $user);
                    break;

                case 'closed':
                    $entities = $repository->findClosed($page, $user);
                    break;
            }

            return $this->render(
                'IntranetBundle:Complaint:indexRaw.html.twig',
                array(
                    'entities' => $entities
                )
            );

        } else {

            $closed = $repository->findClosed($page, $user);
            $feedback = $repository->findAwaitingFeedBack($page, $user);
            $inProgress = $repository->findInProgress($page, $user);
            $notStarted = $repository->findNotStarted($page, $user);

            return $this->render(
                'IntranetBundle:Complaint:index.html.twig',
                array(
                    'closed' => $closed,
                    'inProgress' => $inProgress,
                    'AwaitingFeedBack' => $feedback,
                    'notStarted' => $notStarted,
                    'closedPagesCount' => $repository->getClosedPagesCount($user),
                    'AwaitingFeedBackPageCount' => $repository->getAwaitingFeedbackPagesCount($user),
                    'inProgressPagesCount' => $repository->getInProgressPagesCount($user),
                    'notStartedPagesCount' => $repository->getNotStartedPagesCount($user),
                    'filterForm' => $filterData['filterForm']
                )
            );
        }
    }

    /**
     * Creates a new Complaint entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Complaint();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $logEntity = new Log();
            $logEntity->setUser($this->get('security.context')->getToken()->getUser());
            $logEntity->setAction( LogActionEnum::CREATED );
            $logEntity->setComplaint( $entity );
            $logEntity->setCreatedAt( new \DateTime() );

            $em = $this->getDoctrine()->getManager();
            $em->persist( $logEntity );
            $em->persist($entity);
            $em->flush();

            $redirect = $form->get('redirect')->getData();
            $redirect = ($redirect) ? $redirect : $this->generateUrl('complaint_show', array('id' => $entity->getId()));

            return $this->redirect($redirect);
        }

        return $this->render(
            'IntranetBundle:Complaint:new.html.twig',
            array(
                'entity' => $entity,
                'form' => $form->createView(),
            )
        );
    }

    /**
     * Creates a form to create a Complaint entity.
     *
     * @param Complaint $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Complaint $entity)
    {
        $form = $this->createForm(
            new ComplaintType(),
            $entity,
            array(
                'action' => $this->generateUrl('complaint_create'),
                'method' => 'POST',
            )
        );

        $form
            ->add('submit', 'submit', array('label' => 'Create','attr'=> array('class' =>'btn btn-table-actions')))
            ->add(
                'redirect',
                'hidden',
                [
                    'data' => null,
                    'mapped' => false
                ]
            );

        return $form;
    }

    /**
     * Displays a form to create a new Complaint entity.
     *
     */
    public function newAction()
    {
        $entity = new Complaint();
        $form = $this->createCreateForm($entity);

        return $this->render(
            'IntranetBundle:Complaint:new.html.twig',
            array(
                'entity' => $entity,
                'form' => $form->createView(),
            )
        );
    }

    /**
     * Finds and displays a Complaint entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IntranetBundle:Complaint')->find($id);
        $logs = $em->getRepository('IntranetBundle:Log')->getApprovalLogs($entity,'complaint');

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Complaint entity.');
        }

        CheckAccess::userWithComplaint($entity);

        $deleteForm = $this->createDeleteForm($id);

        return $this->render(
            'IntranetBundle:Complaint:show.html.twig',
            array(
                'entity' => $entity,
                'delete_form' => $deleteForm->createView(),
                'logs' => $logs,
            )
        );
    }

    /**
     * Displays a form to edit an existing Complaint entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IntranetBundle:Complaint')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Complaint entity.');
        }

        CheckAccess::userWithComplaint($entity);

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render(
            'IntranetBundle:Complaint:edit.html.twig',
            array(
                'entity' => $entity,
                'edit_form' => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
            )
        );
    }

    /**
     * Creates a form to edit a Complaint entity.
     *
     * @param Complaint $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Complaint $entity)
    {
        $form = $this->createForm(
            new ComplaintType(),
            $entity,
            array(
                'action' => $this->generateUrl('complaint_update', array('id' => $entity->getId())),
                'method' => 'PUT',
            )
        );

        $form->add('submit', 'submit', array('label' => 'Update','attr'=> array('class' =>'btn btn-table-actions')));

        return $form;
    }

    /**
     * Edits an existing Complaint entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IntranetBundle:Complaint')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Complaint entity.');
        }

        CheckAccess::userWithComplaint($entity);
        $status = $entity->getStatus();
        $respondedAt = $entity->getRespondedAt();

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            if ($entity->getRespondedAt() && $respondedAt != $entity->getRespondedAt() && $status == $entity->getStatus()) {
                $entity->setStatus(ComplaintStatusEnum::CLOSED);
            }

            if ($status != $entity->getStatus()) {
                $logEntity = new Log();
		        $logEntity->setUser( $this->get('security.context')->getToken()->getUser() );
		        $logEntity->setAction( LogActionEnum::STATUSCHANGE_COMPLAINT );
                $logEntity->setComplaint( $entity );
                $logEntity->setStatus( $entity->getStatus() );
		        $logEntity->setCreatedAt( new \DateTime() );
		        $em->persist( $logEntity );
		    }

            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('complaint_edit', array('id' => $id)));
        }

        return $this->render(
            'IntranetBundle:Complaint:edit.html.twig',
            array(
                'entity' => $entity,
                'edit_form' => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
            )
        );
    }

    /**
     * Deletes a Complaint entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IntranetBundle:Complaint')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Complaint entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('complaint'));
    }


    public function proposalAction(Request $request, $id)
    {
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IntranetBundle:Complaint')->find($id);
            $securityContext = $this->get('security.context');
            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Complaint entity.');
            }

            $logEntity = new Log();
            $logEntity->setUser($this->get('security.context')->getToken()->getUser());
            $logEntity->setAction( LogActionEnum::COMPLAINT_PROPOSAL );
            $logEntity->setComplaint( $entity );
            $logEntity->setCreatedAt( new \DateTime() );
            $em->persist( $logEntity );

            $proposal = $request->request->get('text');
            $entity->setStatus(ComplaintStatusEnum::IN_PROGRESS);
            $entity->setProposal($proposal);
            $em->persist($entity);
            $em->flush();

            $mailBody = nl2br(
                $this->renderView(
                    'IntranetBundle:Complaint:mailNotifyForProposal.html.twig',
                    array(
                        'entity' => $entity,
                        'sender' => $this->get('security.context')->getToken()->getUser(),
                        'link' => $this->generateUrl(
                                'complaint_show',
                                ['id' => $entity->getId()],
                                UrlGeneratorInterface::ABSOLUTE_URL
                            ),
                    )
                )
            );

            $message = \Swift_Message::newInstance()
                ->setSubject('Lösungsvorschlag für Beschwerde')
                ->setFrom($this->container->getParameter('fromEmail'))
                ->setTo($entity->getUser()->getEmail())
                ->setBody($mailBody, 'text/html', 'utf-8');
            $send = $this->get('mailer')->send($message);

            $this->get('session')->getFlashBag()->set('error', 'Gespeichert');

            return Response::create('Success');
        }
    }

    public function noAnswerAction(Request $request, $id){
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IntranetBundle:Complaint')->find($id);
            $entity->setResolution(ComplaintResolutionEnum::NO_ANSWER);
            $entity->setStatus(ComplaintStatusEnum::CLOSED);
            $entity->setResolutiondAt(new \DateTime());

            $logEntity = new Log();
            $logEntity->setUser( $this->get('security.context')->getToken()->getUser() );
            $logEntity->setAction( LogActionEnum::STATUSCHANGE_COMPLAINT );
            $logEntity->setComplaint( $entity );
            $logEntity->setStatus( ComplaintStatusEnum::CLOSED );
            $logEntity->setCreatedAt( new \DateTime() );

            $em->persist($logEntity);
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('complaint_show', ['id' => $id]));
    }

    /**
     * Creates a form to delete a Complaint entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('complaint_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete','attr'=> array('class' =>'btn btn-table-actions')))
            ->getForm();
    }

    public function newRelatedAction($id, $name)
    {
        $em = $this->getDoctrine()->getManager();

        /** @var $complaint Complaint */
        $complaint = $em->getRepository('IntranetBundle:Complaint')->find($id);

        $entity = null;
        $form = null;
        $view = null;

        switch ($name) {
            case "task":
                $entity = new Task();
                $entity->setComplaint($complaint);
                $form = $this->createEditFormWithType($entity, new TaskType(), 'task');
                $view = 'IntranetBundle:Task:new.html.twig';
                break;
            case "note":
                $entity = new Note();
                $entity->setComplaint($complaint);
                $form = $this->createEditFormWithType($entity, new NoteType(), 'note');
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
        /** @var $entity Note|Task */

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
                    'data' => $this->generateUrl('complaint_show', ['id' => $entity->getComplaint()->getId()]),
                    'mapped' => false
                ]
            );

        return $form;
    }

    /**
     * Notify about existence of complaint.
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function notifyAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('IntranetBundle:Complaint')->find($id);
        $customer = $entity->getCustomer();
        $users = $customer->getUsers();        

        if (!$users) {
            $this->get('session')->getFlashBag()->set('error', 'There are no users for this customer');
        } else {
            $mailBody = nl2br($this->renderView(
                'IntranetBundle:Complaint:mailNotify.html.twig',
                array(
                    'recipient' => $customer,
                    'entity' => $entity,
                    'sender' => $this->get('security.context')->getToken()->getUser(),
                    'link' => $this->generateUrl(
                            'complaint_show',
                            ['id' => $entity->getId()],
                            UrlGeneratorInterface::ABSOLUTE_URL
                        ),
                )
            ));

            $recipients = array();
            foreach ($users as $user) {
                $recipients[] = $user->getEmail();
            }

            $message = \Swift_Message::newInstance()
                ->setSubject(sprintf('Beschwerde RX%05d wurde neu angelegt', $entity->getId()))
                ->setFrom($this->container->getParameter('fromEmail'))
                ->setTo($recipients)
                ->setBody($mailBody, 'text/html', 'utf-8');
            $sent = $this->get('mailer')->send($message);

            if ($sent) {
                $logEntity = new Log();
                $logEntity->setUser( $this->get('security.context')->getToken()->getUser() );
                $logEntity->setAction( LogActionEnum::NOTIFIED );
                $logEntity->setComplaint( $entity );
                $logEntity->setCreatedAt( new \DateTime() );
                $em->persist($logEntity);
                if (!$entity->getNotifiedAt()){
                    $entity->setNotifiedAt(new \DateTime());
                    $em->persist($entity);
                }
                $em->flush();
            }

            $this->get('session')->getFlashBag()->set('error', 'Successfully sent');
        }

        return $this->redirect($this->generateUrl('complaint_show', ['id' => $id]));
    }
}
