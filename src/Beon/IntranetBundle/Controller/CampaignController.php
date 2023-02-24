<?php

namespace Beon\IntranetBundle\Controller;

use Beon\IntranetBundle\Entity\Timetracking;
use Beon\IntranetBundle\Form\TimetrackingType;
use Beon\IntranetBundle\Entity\Customer;
use Beon\IntranetBundle\Entity\Log;
use Beon\IntranetBundle\Entity\MailQueue;
use Beon\IntranetBundle\Entity\Note;
use Beon\IntranetBundle\Entity\Repository\CampaignRepository;
use Beon\IntranetBundle\Entity\Upload;
use Beon\IntranetBundle\Entity\User;
use Beon\IntranetBundle\Enums\CooperationEnum;
use Beon\IntranetBundle\Enums\LogActionEnum;
use Beon\IntranetBundle\Enums\SupplierTypesEnum;
use Beon\IntranetBundle\Enums\CampaignStatusEnum;
use Beon\IntranetBundle\Enums\CampaignIncludedServicesEnum;
use Beon\IntranetBundle\Enums\TimetrackingTariffEnum;
use Beon\IntranetBundle\Helper\ApprovementFormComposer;
use Beon\IntranetBundle\Helper\FormHelper;
use Beon\IntranetBundle\Lib\CheckAccess;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Beon\IntranetBundle\Entity\Campaign;
use Beon\IntranetBundle\Form\CampaignType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\SecurityContext;
use Beon\IntranetBundle\Form\NoteType;
use Beon\IntranetBundle\Entity\Task;
use Beon\IntranetBundle\Form\TaskType;
use Beon\IntranetBundle\Form\UserFilterType;

/**
 * Campaign controller.
 *
 */
class CampaignController extends Controller
{
    const ITEMS_ON_PAGE = 10;

    /**
     * Lists all Campaign entities.
     *
     */
    public function indexAction(Request $request)
    {
	/* applying filters */
	$userFilterService = $this->get('UserCustomerFilterService');
	$filterData =  $userFilterService->handleRequest('Campaign', $this, $request);
	$repository = $filterData['repository'];
	
        $page = 0;
        
        $pageFromRequest = $request->request->get('currentPage');
        $pagerName = $request->request->get('pagerName');
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
	
        /**
         * Executing queries
         */

        if ($pagerName) {

            $entities = null;

            switch (trim($pagerName)) {
                case 'unapproved':
                    $entities = $repository->findUnapproved($page, $customerIds);
                    break;
                case 'archived':
                    $entities = $repository->findArchived($page, $customerIds);
                    break;
                case 'running':
                    $entities = $repository->findRunning($page, $customerIds);
                    break;
                case 'future':
                    $entities = $repository->findFuture($page, $customerIds);
                    break;
                case 'denied':
                    $entities = $repository->findDenied($page, $customerIds);
                    break;
                case 'deleted':
                    $entities = $repository->findDeleted($page, $customerIds);
                    break;
            }


            return $this->render(
                'IntranetBundle:Campaign:indexRaw.html.twig',
                array(
                    'entities' => $entities
                )
            );

        } else {

            $unapproved = $repository->findUnapproved($page, $customerIds);
            $archived = $repository->findArchived($page, $customerIds);
            $running = $repository->findRunning($page, $customerIds);
            $future = $repository->findFuture($page, $customerIds);
            $denied = $repository->findDenied($page, $customerIds);
            $deleted = $repository->findDeleted($page, $customerIds);

            /**
             * Counts
             */
            $unapprovedPagesCount = $repository->getUnapprovedPagesCount($customerIds);
            $archivePagesCount = $repository->getArchivedPagesCount($customerIds);
            $runningPagesCount = $repository->getRunningPagesCount($customerIds);
            $futurePagesCount = $repository->getFuturePagesCount($customerIds);
            $deniedPagesCount = $repository->getDeniedPagesCount($customerIds);
            $deletedPagesCount = $repository->getDeletedPagesCount($customerIds);

            return $this->render(
                'IntranetBundle:Campaign:index.html.twig',
                [
                    'unapproved' => $unapproved,
                    'running' => $running,
                    'archived' => $archived,
                    'future' => $future,
                    'denied' => $denied,
                    'deleted' => $deleted,
                    'runningPagesCount' => $runningPagesCount,
                    'unapprovedPagesCount' => $unapprovedPagesCount,
                    'futurePagesCount' => $futurePagesCount,
                    'archivedPagesCount' => $archivePagesCount,
                    'deniedPagesCount' => $deniedPagesCount,
                    'filterForm' => $filterData['filterForm'],
                    'deletedPagesCount' => $deletedPagesCount,
                    //'userChoiceForm' => $userChoiceForm->createView()
                ]
            );
        }
    }

    private function getPagesCount(QueryBuilder $queryBuilder)
    {
        $query = clone($queryBuilder);

        return $query->select('count(c.id)')->getQuery()->getSingleScalarResult();
    }

    /**
     * Creates a new Campaign entity.
     *
     */
    public function createAction($supplier, Request $request)
    {
        $entity = new Campaign();
        $usr = $this->get('security.context')->getToken()->getUser();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $fsFileNameQueryString = $form->get('fsFileName')->getData();
            if($fsFileNameQueryString){
                $fsFileNames = explode('|',$fsFileNameQueryString);
                foreach($fsFileNames as $fsFileName){
                    $upload = $em->getRepository('IntranetBundle:Upload')->findOneBy(array('fsFilename'=>$fsFileName));
                    if($upload){
                        $upload->setCampaign($entity);
                    }
                }
            }

            $logEntity = new Log();
		    $logEntity->setUser( $usr );
		    $logEntity->setAction( LogActionEnum::CREATED );
            $logEntity->setCampaign( $entity );
		    $logEntity->setCreatedAt( new \DateTime() );
		    $em->persist( $logEntity );
            
            $em->flush();
            
	    $this->get('session')->getFlashBag()->set('success','Campaign created successfully');            
            
            if ($supplier) {
            
		return $this->redirect($this->generateUrl('supplier_show', array('id' => $supplier)));
            } else {
		return $this->redirect($this->generateUrl('campaign_edit', array('id' => $entity->getId())));
            }
        }

        return $this->render(
            'IntranetBundle:Campaign:new.html.twig',
            array(
                'entity' => $entity,
                'form' => $form->createView(),
            )
        );
    }

    /**
     * Creates a form to create a Campaign entity.
     *
     * @param Campaign $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Campaign $entity, $supplier=false)
    {
        $form = $this->createForm(
            new CampaignType(),
            $entity,
            array(
                'action' => $this->generateUrl('campaign_create',array('supplier'=>$supplier)),
                'method' => 'POST',
            )
        );

        $form->add('submit', 'submit', array('label' => 'Create','attr'=> array('class' =>'btn btn-table-actions')));

        return $form;
    }

    /**
     * Displays a form to create a new Campaign entity.
     *
     */
    public function newAction($supplier, Request $request)
    {
	$em = $this->getDoctrine()->getManager();
        
        /** @var $entity Campaign */
        $entity = new Campaign();
        
        /* set supplier if have */
        if ($supplier) {
	    $supplierEntity = $em->getRepository('IntranetBundle:Supplier')->find($supplier);
	    $entity->setSupplier($supplierEntity);
        }
        
        $form = $this->createCreateForm($entity, $supplier);
        $form->get('start')->setData(new \DateTime($request->query->get('offerPeriodStart')));
        $form->get('end')->setData(new \DateTime($request->query->get('offerPeriodEnd')));
        $form->get('budget')->setData($request->query->get('price'));
        $form->get('regularPrice')->setData($request->query->get('priceRegular'));
        $form->get('details')->setData($request->query->get('notes'));

        if (SupplierTypesEnum::equals($request->query->get('offerType'), SupplierTypesEnum::OnlineType)){
            $form->get('audiencesize')->setData($request->query->get('visitors'));
        } else if (SupplierTypesEnum::equals($request->query->get('offerType'), SupplierTypesEnum::RadioType)){
            $form->get('audiencesize')->setData($request->query->get('listeners'));
            $form->get('numberOfSeconds')->setData($request->query->get('numberOfSeconds'));
        } else if (SupplierTypesEnum::equals($request->query->get('offerType'), SupplierTypesEnum::PrintType)){
            $form->get('audiencesize')->setData($request->query->get('readers'));
            $form->get('sizeOfAds')->get('adsizeWidth')->setData($request->query->get('adsizeWidth'));
            $form->get('sizeOfAds')->get('adsizeHeight')->setData($request->query->get('adsizeHeight'));
            $form->get('numberOfAds')->setData($request->query->get('numberOfAds'));
        } else if (SupplierTypesEnum::equals($request->query->get('offerType'), SupplierTypesEnum::TvType)){
            $form->get('numberOfSeconds')->setData($request->query->get('numberOfSeconds'));
            $form->get('audiencesize')->setData($request->query->get('viewers'));
        } else {
            $form->get('audiencesize')->setData($request->query->get('listeners'));
        }

        $form->get('includedServices')->setData(CampaignIncludedServicesEnum::getChoice($request->query->get('includedServices')));
        $form->get('fsFileName')->setData($request->query->get('fileName'));

        $customer = null;
        $formData = $request->request->get('form');
        $customerId = isset($formData['customer_id']) ? $formData['customer_id'] : null;

        if ($customerId) {
            /** @var $customer Customer */
            $customer = $em->getRepository('IntranetBundle:Customer')->find($customerId);
            $form->remove('customer');
            $form->add('customer', 'hidden', array('data' => $customerId));
        }

        return $this->render(
            'IntranetBundle:Campaign:new.html.twig',
            array(
                'entity' => $entity,
                'form' => $form->createView(),
                'customer' => $customer,
                'supplierTypesObject' => (object)array_flip(SupplierTypesEnum::getTitles())
            )
        );
    }

    /**
     * Finds and displays a Campaign entity.
     *
     */
    public function showAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        /** @var $entity Campaign */
        $entity = $em->getRepository('IntranetBundle:Campaign')->find($id);
        $logs = $em->getRepository('IntranetBundle:Log')->getApprovalLogs($entity,'campaign');
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Campaign entity.');
        }
        $duplicateForm = $this->createDuplicateForm($id);

        CheckAccess::userWithCampaign($entity);

        $campaignDeleteForm = $this->createDeleteForm($id);

        $cpm = null;
        if ($entity->getAudiencesize()) {
            if (SupplierTypesEnum::equals($entity->getSupplier()->getSupplierType(), SupplierTypesEnum::PrintType) && $entity->getNumberOfAds() > 0) {
                $numberOfAds = $entity->getNumberOfAds();
            } else {
                $numberOfAds = 1;
            }
            $cpm = $entity->getBudget() / $numberOfAds / $entity->getAudiencesize() * 1000;
        }

        $approveForm = ($entity->getApproved()) ? null : ApprovementFormComposer::compose(
            $request,
            $em,
            $this,
            $entity,
            'Campaign'
        );

        $cps = null;
        $cpspm = null;
        if ((SupplierTypesEnum::equals($entity->getSupplier()->getSupplierType(), SupplierTypesEnum::RadioType) || SupplierTypesEnum::equals($entity->getSupplier()->getSupplierType(), SupplierTypesEnum::TvType)) && $entity->getNumberOfSeconds()) {
            $cps = $entity->getBudget() / $entity->getNumberOfSeconds();
            if ($entity->getAudiencesize()) {
                $cpspm = $cps / $entity->getAudiencesize() * 1000;
            }
        }
	
	$timetrackingEntities = $this->getDoctrine()->getRepository('IntranetBundle:TimeTracking')->findByCampaign($entity);
	
        return $this->render(
            'IntranetBundle:Campaign:show.html.twig',
            [
                'entity' => $entity,
                'delete_form' => $campaignDeleteForm->createView(),
                'cpm' => $cpm,
                'cps' => $cps,
                'cpspm' => $cpspm,
                'duplicate_form' => $duplicateForm->createView(),
                'approveForm' => ApprovementFormComposer::composeApprove($this, $entity)->createView(),
                'denyForm' => ApprovementFormComposer::composeDeny($this, $entity)->createView(),
                'logs' => $logs,
                'timetrackingEntities'=> $timetrackingEntities,
            ]
        );
    }

    /**
     * Displays a form to edit an existing Campaign entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        /** @var $entity Campaign */
        $entity = $em->getRepository('IntranetBundle:Campaign')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Campaign entity.');
        }

        $uploadDorms = array();
        /** @var $upload Upload */
        foreach ($entity->getUploads() as $upload) {
            $uploadDorms[$upload->getId()] = FormHelper::composeDeleteForm(
                $this,
                array(
                    'action' => 'upload_delete',
                    'actionParameters' => array('id' => $upload->getId()),
                    'redirectPath' => 'campaign_edit',
                    'redirectParams' => array('id' => $entity->getId()),
                )
            );
        }

        $editForm = $this->createEditForm($entity);
        $choosenSupplierId = ($entity->getContact()) ? $entity->getContact()->getId() : null;
        $editForm->add('chosenSupplierContact', 'hidden', array('mapped' => false, 'data' => $choosenSupplierId));
        $editForm->remove('supplierContact');

        $deleteForm = $this->createDeleteForm($id);


        $uploadFileForm = $this->createFormBuilder()
            ->setAction($this->generateUrl('upload_new'))
            ->add('presenter', 'hidden', array('data' => 'campaign'))
            ->add('presenterId', 'hidden', array('data' => $entity->getId()))
            ->add('submit', 'submit', array('label' => 'Upload file','attr'=> array('class' =>'btn btn-table-actions')))
            ->getForm();

        return $this->render(
            'IntranetBundle:Campaign:edit.html.twig',
            [
                'entity' => $entity,
                'edit_form' => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
                'upload_file_form' => $uploadFileForm->createView(),
                'uploadDeleteForms' => $uploadDorms
            ]
        );
    }

    /**
     * Creates a form to edit a Campaign entity.
     *
     * @param Campaign $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Campaign $entity)
    {
        $form = $this->createForm(
            new CampaignType(),
            $entity,
            array(
                'action' => $this->generateUrl('campaign_update', array('id' => $entity->getId())),
                'method' => 'PUT',
            )
        );

        $form->add('submit', 'submit', array('label' => 'Update','attr'=> array('class' =>'btn btn-table-actions')));

        return $form;
    }

    /**
     * Edits an existing Campaign entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $usr = $this->get('security.context')->getToken()->getUser();
        $entity = $em->getRepository('IntranetBundle:Campaign')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Campaign entity.');
        }

        $status = $entity->getStatus();
        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->add('chosenSupplierContact', 'hidden', array('mapped' => false));
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            if ($status != $entity->getStatus()) {
                $logEntity = new Log();
		        $logEntity->setUser( $this->get('security.context')->getToken()->getUser() );
		        $logEntity->setAction( LogActionEnum::STATUSCHANGE_CAMPAIGN );
                $logEntity->setCampaign( $entity );
                $logEntity->setStatus( $entity->getStatus() );
		        $logEntity->setCreatedAt( new \DateTime() );
		        $em->persist( $logEntity );
		    }

            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('campaign_edit', array('id' => $id)));
        }

        return $this->render(
            'IntranetBundle:Campaign:edit.html.twig',
            array(
                'entity' => $entity,
                'edit_form' => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
            )
        );
    }

    /**
     * Deletes a Campaign entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IntranetBundle:Campaign')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Campaign entity.');
            }

            $entity->setDeleted(true);

            $em->persist($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('campaign'));
    }

    public function sendApprovalEmailAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        /** @var $campaign Campaign */
        $campaign = $em->getRepository('IntranetBundle:Campaign')->find($id);
        $mailQueue = new MailQueue();
        
        /** @var $customer Customer */
        $customer = $campaign->getCustomer();

        /** @var $securityContext SecurityContext */
        $securityContext = $this->get('security.context');

        /** @var $users User[]|Collection */
        $users = $customer->getUsersWithRole('ROLE_CAMPAIGNS_APPROVE');

        if (!$users) {
            $this->get('session')->getFlashBag()->set('error', 'There are no users (with sufficient permissions) for this customer');
        } else {
            $campaign->setDenied(false);
            $campaign->setApproved(false);

            $mailBody = nl2br($this->renderView(
                'IntranetBundle:Campaign:mailApprove.html.twig',
                array(
                    'sender' => $securityContext->getToken()->getUser(),
                    'entity' => $campaign,
                    'link' => $this->generateUrl(
                            'campaign_show',
                            ['id' => $campaign->getId()],
                            UrlGeneratorInterface::ABSOLUTE_URL
                        ),
                )
            ));

            $mailQueue
                ->setEntity(get_class($campaign))
                ->setEntityId($campaign->getId())
                ->setSentDate(new \DateTime());
	    
	        $sentMessages = array();
	    
            foreach ($users as $user) {
                $message = \Swift_Message::newInstance()
                    ->setSubject(sprintf('Kampagne AD%05d wurde neu angelegt', $campaign->getId()))
                    ->setFrom($this->container->getParameter('fromEmail'))
                    ->setTo($user->getEmail())
                    ->setBody($mailBody, 'text/html', 'utf-8');
	      
                $this->get('mailer')->send($message);
                
                $sentMessages[] = $message;
            }

            if (!$campaign->getApprovalMailSentAt()) {
                $campaign->setApprovalMailSentAt(new \DateTime());
            }

            $currentUser = $securityContext->getToken()->getUser();

            $logEntity = new Log();
            $logEntity->setUser($currentUser);
            $logEntity->setAction( LogActionEnum::EXTERNAL_APPROVAL_MAIL_SENT );
            $logEntity->setCampaign( $campaign );
            $logEntity->setCreatedAt( new \DateTime() );
            $em->persist( $logEntity );

            $campaign->setApprovalmailsent(1);
            $campaign->setApprovementSender($currentUser);

            $mailQueue->setRedirect('campaign_show');
            
            if (count($sentMessages)>0) {
		        $campaign->setSerializedApprovalMail(serialize($sentMessages));
            }
            
            $campaign->setLastApprovalMailSentAt(new \DateTime());
            
            $em->persist($campaign);
            $em->persist($mailQueue);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('campaign_show', ['id' => $campaign->getId()]));
    }

    /**
     * Creates a form to delete a Campaign entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('campaign_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete','attr'=> array('class' =>'btn btn-table-actions')))
            ->getForm();
    }

    private function createDuplicateForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('campaign_duplicate', array('id' => $id)))
            ->setMethod('POST')
            ->add('submit', 'submit', array('label' => 'Duplicate','attr'=> array('class' =>'btn btn-table-actions')))
            ->getForm();
    }


    public function approveAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        /** @var $entity Campaign */
        $entity = $em->getRepository('IntranetBundle:Campaign')->find($id);

        $form = ApprovementFormComposer::composeApprove($this, $entity);
        $form->handleRequest($request);
        if ($form->isValid()) {
            list($approver, $comment) = ApprovementFormComposer::handleApprove($this, $form, $entity);

            $entity->setApproved(true);
            $entity->setDenied(false);
            $entity->setSerializedApprovalMail(null);
            $entity->setApprovedAt(new \DateTime());
            $entity->setApprovedBy($approver);
            if ($entity->getStatus() < CampaignStatusEnum::APPROVED) {
                $entity->setStatus(CampaignStatusEnum::APPROVED);
            }

            if ($approvementSender = $entity->getApprovementSender()) {
                $mailBody = nl2br($this->renderView(
                    'IntranetBundle:Campaign:mailApproved.html.twig',
                    array(
                        'recipient' => $approvementSender,
                        'approver' => $approver,
                        'entity' => $entity,
                        'comment' => $comment,
                        'link' => $this->generateUrl(
                                'campaign_show',
                                ['id' => $entity->getId()],
                                UrlGeneratorInterface::ABSOLUTE_URL
                            )
                    )
                ));

                $message = \Swift_Message::newInstance()
                    ->setSubject(sprintf('Kampagne AD%05d wurde freigegeben', $entity->getId()))
                    ->setFrom($this->container->getParameter('fromEmail'))
                    ->setTo($approvementSender->getEmail())
                    ->setBody($mailBody, 'text/html', 'utf-8');
                $this->get('mailer')->send($message);
            }

            $this->get('session')->getFlashBag()->set('error', 'Freigabe erfolgreich');

            $em->persist($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('campaign_show', ['id' => $id]));
    }

    public function denyAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        /** @var $entity Campaign */
        $entity = $em->getRepository('IntranetBundle:Campaign')->find($id);

        $form = ApprovementFormComposer::composeDeny($this, $entity);
        $form->handleRequest($request);
        if ($form->isValid()) {
            list($denier, $reason) = ApprovementFormComposer::handleDeny($this, $form, $entity);

            $entity->setDenied(true);
            $entity->setApprovalmailsent(false);
            $entity->setApprovalMailSentAt(null);
            $entity->setSerializedApprovalMail(null);

            if ($approvementSender = $entity->getApprovementSender()) {        
                $mailBody = nl2br($this->renderView(
                    'IntranetBundle:Campaign:mailDenied.html.twig',
                    array(
                        'recipient' => $approvementSender,
                        'denier' => $denier,
                        'entity' => $entity,
                        'reason' => $reason,
                        'link' => $this->generateUrl(
                                'campaign_show',
                                ['id' => $entity->getId()],
                                UrlGeneratorInterface::ABSOLUTE_URL
                            )
                    )
                ));

                $message = \Swift_Message::newInstance()
                    ->setSubject(sprintf('Kampagne AD%05d wurde abgelehnt', $entity->getId()))
                    ->setFrom($this->container->getParameter('fromEmail'))
                    ->setTo($approvementSender->getEmail())
                    ->setBody($mailBody, 'text/html', 'utf-8');
                $this->get('mailer')->send($message);
            }

            $em->persist($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('campaign_show', ['id' => $id]));
    }


    public function newRelatedAction($id, $name)
    {
        $em = $this->getDoctrine()->getManager();

        /** @var $complaint Customer */
        $campaign = $em->getRepository('IntranetBundle:Campaign')->find($id);
        $entity = null;
        $form = null;
        $view = null;

        switch ($name) {
            case "note":
                $entity = new Note();
                $entity->setCampaign($campaign);
                $entity->setCustomer($campaign->getCustomer());
                $form = $this->createEditFormWithType($entity, new NoteType(), 'note');
                $view = 'IntranetBundle:Note:new.html.twig';
                break;
            case "task":
                $entity = new Task();
                $entity->setCampaign($campaign);
                $entity->setCustomer($campaign->getCustomer());
                $form = $this->createEditFormWithType($entity, new TaskType(), 'task');
                $view = 'IntranetBundle:Task:new.html.twig';
                break;
            case "timetracking":
                $entity = new Timetracking();
                $entity->setCampaign($campaign);
                $entity->setDay(new \DateTime());
                $entity->setHours($campaign->getBudget());
                $entity->setTariff(TimetrackingTariffEnum::getChoice(TimetrackingTariffEnum::WEITERBERECHNUNG));
                $form = $this->createEditFormWithType($entity, new TimetrackingType(), 'timetracking');
                $view = 'IntranetBundle:Timetracking:new.html.twig';
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

    public function duplicateAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('IntranetBundle:Campaign')->find($id);

        $newCampaign = clone $entity;
        $newCampaign->setDuplicateOf($entity);
        $newCampaign->resetState();

        $uploads = $em->getRepository('IntranetBundle:Upload')->findBy(array('campaign' => $entity));

        if ($entity) {

            $em->persist($newCampaign);

            if ($uploads) {

                foreach ($uploads as $upload) {
                    $newupload = clone $upload;
                    $newupload->setCampaign($newCampaign);
                    $em->persist($newupload);
                }


            }
            $em->flush();

            return $this->redirect($this->generateUrl('campaign_edit', array('id' => $newCampaign->getId())));
        }
    }


    private function createEditFormWithType($entity, $formType, $name)
    {
        $options = array(
            'action' => $this->generateUrl($name . '_create'),
            'method' => 'POST',
        );
        if ($name == 'timetracking') {
            $options['mode'] = 'campaign';
        }
        /** @var $entity Note */
        $form = $this->createForm(
            $formType,
            $entity,
            $options
        );

        $form->add('submit', 'submit', array('label' => 'Create'));
        
        if ($name != 'timetracking') {
		$form->add(
			'redirect',
			'hidden',
			[
			    'data' => $this->generateUrl('campaign_show', ['id' => $entity->getCampaign()->getId()]),
			    'mapped' => false
			]
		    );
	}
	
        return $form;
    }

    public function duplicateDownAction($id,$type)
    {
        $em = $this->getDoctrine()->getManager();
        /** @var $campaigns CampaignRepository */
        $campaignrepo = $em->getRepository('IntranetBundle:Campaign');
        $campaign = $campaignrepo->find($id);
        $affType = $campaign->getCustomer();

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
                $campaign->setCustomer($child);
                $campaign->resetState();
                $em->persist($campaign);
                $em->flush();
            } else {
                $campaignrepo->insertDuplicateCampaignByStakeHolderChildern($campaign, $child);
            }
        }

        return $this->redirect($this->generateUrl('campaign_show', array('id' => $campaign->getId())) . '#duplicates');
    }

    public function supplierMailAction(Request $request, $id, $type)
    {
        $em = $this->getDoctrine()->getManager();
        /** @var $campaigns CampaignRepository */
        $campaignrepo = $em->getRepository('IntranetBundle:Campaign');
        $campaign = $campaignrepo->find($id);
        /** @var $securityContext SecurityContext */
        $securityContext = $this->get('security.context');
        
        $template = null;
        if ($type == 'confirm') {
            $logAction = LogActionEnum::CAMPAIGN_SUPPLIER_CONFIRMED;
            $template = 'mailSupplierConfirmation';
        } else if ($type == 'reject') {
            $logAction = LogActionEnum::CAMPAIGN_SUPPLIER_REJECTED;
            $template = 'mailSupplierInfo';
        } else if ($type == 'ack') {
            $logAction = LogActionEnum::CAMPAIGN_SUPPLIER_ACKED;
            $template = 'mailSupplierInfo';
        }

        if ($template && $campaign->getContact()) {
            if ($type == 'confirm') {
              if ($campaign->getStatus() < CampaignStatusEnum::CONFIRMED) {
                  $campaign->setStatus(CampaignStatusEnum::CONFIRMED);
              }
              $campaign->setConfirmedAt(new \DateTime());
              $em->persist($campaign);
            }
            
            $logEntity = new Log();
		        $logEntity->setUser( $securityContext->getToken()->getUser() );
		        $logEntity->setAction( $logAction );
            $logEntity->setCampaign( $campaign );
            $logEntity->setContact( $campaign->getContact() );
            $logEntity->setSupplier( $campaign->getSupplier() );
		        $logEntity->setCreatedAt( new \DateTime() );
            $logEntity->setText( $request->request->get('text') );
            
            $mailBody = $this->renderView(
                'IntranetBundle:Campaign:' . $template . '.html.twig',
                array(
                    'entity' => $campaign,
                    'sender' => $securityContext->getToken()->getUser(),
                    'intro'  => $request->request->get('text'),
                    'externalUploadUrl' => $this->generateUrl(
                            'external_upload',
                            [
                                'type' => 'campaign',
                                'id' => $campaign->getId(),
                                'hashCode' => $campaign->getInvoiceUploadHash()
                            ],
                            UrlGeneratorInterface::ABSOLUTE_URL
                     ),
                )
            );
            $message = \Swift_Message::newInstance()
                ->setSubject($this->get('translator')->trans('supplier' . ucfirst($type) . 'Subject'))
                ->setFrom($this->container->getParameter('fromEmail'))
                ->setTo($campaign->getContact()->getEmail())
                ->setBody($mailBody, 'text/html', 'utf-8');
            $this->get('mailer')->send($message);
            $this->get('session')->getFlashBag()->add('success', 'Versendet.');

		        $em->persist( $logEntity );
            $em->flush();
        } else {
            $this->get('session')->getFlashBag()->set('error', 'Diese Kampagne ist kein Kontakt zugordnet.');
        }

        return Response::create('Success');
    }

    public function sendUploadLinkAction(Request $request, $id, $type)
    {
        if ($request->isXmlHttpRequest()) {
            $emailList = $request->request->get('text');
            $intro = trim($request->request->get('text2'));
            $emails = array_filter(array_map('trim', explode(',', $emailList)));

            if (empty($emails)) {
               $this->get('session')->getFlashBag()->set('error', 'no input found');
               return Response::create('Success');
            } else {
                $em = $this->getDoctrine()->getManager();
                /** @var $campaigns CampaignRepository */
                $campaignrepo = $em->getRepository('IntranetBundle:Campaign');
                $campaign = $campaignrepo->find($id);
                $securityContext = $this->get('security.context');

                if ($type == 'invoice') {
                  $subject = 'Rechnungsanforderung';
                  $logAction = LogActionEnum::INVOICE_UPLOAD_REQUESTED;
                } else {
                  $subject = 'Zusendung von Unterlagen';
                  $logAction = LogActionEnum::UPLOAD_REQUESTED;
                }
                
                $logEntity = new Log();
	              $logEntity->setUser( $securityContext->getToken()->getUser() );
	              $logEntity->setAction( $logAction );
                $logEntity->setCampaign( $campaign );
  	            $logEntity->setCreatedAt( new \DateTime() );
                $logEntity->setText('[' . implode(', ', $emails) . "]:\n" . $intro);
                
                $link = $this->generateUrl(
                  'external_upload',
                  [
                      'type' => 'campaign',
                      'id' => $campaign->getId(),
                      'hashCode' => $campaign->getInvoiceUploadHash()
                  ],
                  UrlGeneratorInterface::ABSOLUTE_URL
                );
                $intro = str_replace('[[link]]', '<a href="' . $link . '">link</a>', $intro);

                $mailBody = $this->renderView(
                    'IntranetBundle:Campaign:mailExternalUpload.html.twig',
                    array(
                        'entity' => $campaign,
                        'intro' => $intro,
                        'sender' => $securityContext->getToken()->getUser(),
                        'externalUploadUrl' => $link,
                    )
                );

                foreach ($emails as $email) {
                    $message = \Swift_Message::newInstance()
                        ->setSubject($subject)
                        ->setFrom($this->container->getParameter('fromEmail'))
                        ->setTo($email)
                        ->setBody($mailBody, 'text/html', 'utf-8');
                    $this->get('mailer')->send($message);

                }

                $this->get('session')->getFlashBag()->add('success', 'Versendet.');

	            $em->persist( $logEntity );
	            $em->flush();

                return Response::create('Success');
            }
        }

    }
}
