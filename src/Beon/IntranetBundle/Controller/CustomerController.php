<?php

namespace Beon\IntranetBundle\Controller;

use Beon\IntranetBundle\Entity\Campaign;
use Beon\IntranetBundle\Entity\Complaint;
use Beon\IntranetBundle\Entity\CustomerFacebookUrl;
use Beon\IntranetBundle\Entity\MonitoredUrl;
use Beon\IntranetBundle\Entity\Pressrelease;
use Beon\IntranetBundle\Entity\Repository\CampaignRepository;
use Beon\IntranetBundle\Entity\Repository\CustomerRepository;
use Beon\IntranetBundle\Entity\Repository\NoteRepository;
use Beon\IntranetBundle\Entity\Repository\PressreleaseRepository;
use Beon\IntranetBundle\Entity\Repository\TaskRepository;
use Beon\IntranetBundle\Entity\User;
use Beon\IntranetBundle\Enums\UserGroupEnum;
use Beon\IntranetBundle\Form\ComplaintType;
use Beon\IntranetBundle\Form\MonitoredUrlType;
use Beon\IntranetBundle\Form\UsersType;
use Beon\IntranetBundle\Helper\FormHelper;
use Beon\IntranetBundle\Lib\CheckAccess;
use Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Beon\IntranetBundle\Entity\Customer;
use Beon\IntranetBundle\Form\CustomerType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Validator\Constraints\DateTime;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\EntityRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Beon\IntranetBundle\Entity\Task;
use Beon\IntranetBundle\Form\TaskType;
use Beon\IntranetBundle\Command\FacebookCommand;
use Beon\IntranetBundle\Entity\Upload;

/**
 * Customer controller.
 *
 */
class CustomerController extends Controller
{

    /**
     * Lists all Customer entities.
     *
     */
    public function indexAction(Request $request, $level)
    {
        $page = 0;
        $pageFromRequest = $request->request->get('currentPage');
        $pagerName = $request->request->get('pagerName');
        $page = $pageFromRequest ? $pageFromRequest : $page;

	    /* applying filters */
	    $userFilterService = $this->get('UserCustomerFilterService');
	    $filterData =  $userFilterService->handleRequest('Customer', $this, $request);
	    $repository = $filterData['repository'];        
        $parentLevel = CustomerRepository::resolveLevel($level);

        /** @var $securityContext SecurityContext */
        $securityContext = $this->get('security.context');

        /** @var $user \Beon\IntranetBundle\Entity\User */
        $user = $securityContext->getToken()->getUser();

        /**
         * Executing queries
         */

        /** @var $session Session */
        $session = $this->get('session');
        $session->start();

        if ($pagerName) {

            $entities = null;

            $customerLevel = $session->get('customerLevel');

            switch (trim($pagerName)) {
                case 'canceled':
                    $entities = $repository->findCanceledContracts($user, $page, $customerLevel);
                    break;

                case 'archive':
                    $entities = $repository->findAchievedContracts($user, $page, $customerLevel);
                    break;

                case 'running':
                    $entities = $repository->findRunningContracts($user, $page, $customerLevel);
                    break;
            }

            return $this->render(
                'IntranetBundle:Customer:indexRaw.html.twig',
                array(
                    'entities' => $entities,
                    'level' => $level,
                    'parentLevel' => $parentLevel,
                )
            );

        } else {

            $session->set('customerLevel', $level);

            $canceledContracts = $repository->findCanceledContracts($user, $page, $level);
            $archiveContracts = $repository->findAchievedContracts($user, $page, $level);
            $runningContracts = $repository->findRunningContracts($user, $page, $level);

            $runningContractsPagesCount = $repository->getRunningContractsPagesCount($level, $user);
            $archiveContractsPagesCount = $repository->getAchievedContractsPagesCount($level, $user);
            $canceledContractsPagesCount = $repository->getCanceledContractsPagesCount($level, $user);

            return $this->render(
                'IntranetBundle:Customer:index.html.twig',
                array(
                    'canceledContracts' => $canceledContracts,
                    'runningContracts' => $runningContracts,
                    'archiveContracts' => $archiveContracts,
                    'runningContractsPagesCount' => $runningContractsPagesCount,
                    'archiveContractsPagesCount' => $archiveContractsPagesCount,
                    'canceledContractsPagesCount' => $canceledContractsPagesCount,
                    'level' => $level,
                    'parentLevel' => $parentLevel,
                    'filterForm' => $filterData['filterForm'],
                )
            );
        }
    }

    /**
     * Creates a new Customer entity.
     *
     */
    public function createAction(Request $request)
    {

        $entity = new Customer();
        $entity->setLevel($request->request->get('customer')['level']);
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('customer_show', array('id' => $entity->getId())));
        }

        return $this->render(
            'IntranetBundle:Customer:new.html.twig',
            array(
                'entity' => $entity,
                'form' => $form->createView(),
            )
        );
    }

    /**
     * Creates a form to create a Customer entity.
     *
     * @param Customer $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Customer $entity)
    {
        $form = $this->createForm(
            new CustomerType(),
            $entity,
            array(
                'action' => $this->generateUrl('customer_create'),
                'method' => 'POST',
            )
        );

        $form->add('submit', 'submit', array('label' => 'Create', 'attr' => array('class' => 'btn btn-table-actions')));

        return $form;
    }

    /**
     * Displays a form to create a new Customer entity.
     *
     */
    public function newAction($level)
    {
        /** @var $entity Customer */
        $entity = new Customer();
        $entity->setLevel($level);
        $form = $this->createCreateForm($entity);

        return $this->render(
            'IntranetBundle:Customer:new.html.twig',
            array(
                'entity' => $entity,
                'form' => $form->createView(),
            )
        );
    }

    /**
     * Finds and displays a Customer entity.
     *
     */
    public function showAction($id)
    {

        $em = $this->getDoctrine()->getManager();


        /** @var $entity Customer */
        $entity = $em->getRepository('IntranetBundle:Customer')->find($id);
        $stakeHolderChildren = $em->getRepository('IntranetBundle:Customer')->getStakeholdersChildrenRegardingToLevel(
            $entity
        );

        $facebookUrl = $this->getLastPost($entity);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Customer entity.');
        }

        CheckAccess::userWithCustomer($entity);

        $deleteForm = $this->createDeleteForm($id);

        $createCampaignForm = $this->createFormBuilder()
            ->setAction($this->generateUrl('campaign_new'))
            ->add('customer_id', 'hidden', array('data' => $entity->getId()))
            ->add('submit', 'submit', array('label' => 'Create campaign', 'attr' => array('class' => 'btn btn-table-actions')))
            ->getForm();

        $createNoteForm = $this->createFormBuilder()
            ->setAction($this->generateUrl('note_new'))
            ->add('customer_id', 'hidden', array('data' => $entity->getId()))
            ->add('submit', 'submit', array('label' => 'Create note', 'attr' => array('class' => 'btn btn-table-actions')))
            ->getForm();

        $createPressreleaseForm = $this->createFormBuilder()
            ->setAction($this->generateUrl('pressrelease_new'))
            ->add('customer_id', 'hidden', array('data' => $entity->getId()))
            ->add('submit', 'submit', array('label' => 'Create press release', 'attr' => array('class' => 'btn btn-table-actions')))
            ->getForm();

        $addBudgetWithForm = $this->createFormBuilder()
            ->setAction($this->generateUrl('budgetperiod_new'))
            ->add('customer_id', 'hidden', array('data' => $entity->getId()))
            ->add('submit', 'submit', array('label' => 'Add budget period', 'attr' => array('class' => 'btn btn-table-actions')))
            ->getForm();

        $createUserForm = $this->createFormBuilder()
            ->setAction($this->generateUrl('user_new'))
            ->add('customer_id', 'hidden', array('data' => $entity->getId()))
            ->add('submit', 'submit', array('label' => 'Create user', 'attr' => array('class' => 'btn btn-table-actions')))
            ->getForm();

        $createTaskForm = $this->createFormBuilder()
            ->setAction($this->generateUrl('task_new'))
            ->add('customer_id', 'hidden', array('data' => $entity->getId()))
            ->add('submit', 'submit', array('label' => 'Create task', 'attr' => array('class' => 'btn btn-table-actions')))
            ->getForm();

        /** @var $tasks TaskRepository */
        $tasks = $em->getRepository('IntranetBundle:Task');

        /** @var $notes NoteRepository */
        $notes = $em->getRepository('IntranetBundle:Note');

        /** @var $presreleases PressreleaseRepository */
        $presreleases = $em->getRepository('IntranetBundle:Pressrelease');

        /** @var $campaigns CampaignRepository */
        $campaigns = $em->getRepository('IntranetBundle:Campaign');
        
        $monitoredUrls = array();

        return $this->render(
            'IntranetBundle:Customer:show.html.twig',
            array(
                'entity' => $entity,
                'stakeHolder' => $stakeHolderChildren,
                'delete_form' => $deleteForm->createView(),
                'create_campaign_form' => $createCampaignForm->createView(),
                'create_note_form' => $createNoteForm->createView(),
                'create_pressrelease_form' => $createPressreleaseForm->createView(),
                'addBudgetWithForm' => $addBudgetWithForm->createView(),
                'createUserForm' => $createUserForm->createView(),
                'create_task_form' => $createTaskForm->createView(),
                'tasks' => $tasks->forCustomerView($entity),
                'notes' => $notes->forCustomerView($entity),
                'fixedDates' => $notes->getFutureFixedDates($entity),
                'agenda' => $notes->getAgendaDates($entity),
                'presreleases' => $presreleases->forCustomerView($entity),
                'campaigns' => $campaigns->forCustomerView($entity),
                'facebookUrls' => $facebookUrl,
                'monitoredUrls' => $entity->getMonitoredUrl(),
                'parentLevel' => CustomerRepository::resolveLevel($entity->getLevel()),
            )
        );
    }

    private function getLastPost($entity)
    {
        $app_id = $this->container->getParameter('fb_app_id');
        $app_secret = $this->container->getParameter('fb_app_secret');
        $authToken = FacebookCommand::fetchUrl(
            "https://graph.facebook.com/oauth/access_token?grant_type=client_credentials&client_id={$app_id}&client_secret={$app_secret}"
        );
        $facebookUrl = [];
        $postMessage = '';
        /** @var $entity Customer */
        foreach ($entity->getCustomerfacebookurls() as $key => $customerFacebookUrl) {

            /** @var $customerFacebookUrl CustomerFacebookUrl */
            if ($customerFacebookUrl->getIsOWn()) {
                $page_id = $customerFacebookUrl->getFacebookUrl()->getPageId();
                $postJsonObj = json_decode(FacebookCommand::fetchUrl("https://graph.facebook.com/{$page_id}/feed?{$authToken}"));
                if (property_exists($postJsonObj, 'data')) {
                    $post = $postJsonObj->data;
                    $facebookUrl['customer'][$key]['facebook'] = $customerFacebookUrl;

                    if (property_exists($post[0], 'message')) {
                        $lastpostValue = $post[0]->message;
                        if (empty($postMessage)) {
                            $postMessage = $lastpostValue;
                        } else {
                            if (strlen($postMessage) > strlen($lastpostValue)) {
                                $postMessage = $lastpostValue;
                            }
                        }
                    }
                }
            }

        }
        if(!empty($postMessage)){
            $facebookUrl['message'] = $postMessage;
        }

        return $facebookUrl;


    }

    /**
     * Displays a form to edit an existing Customer entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IntranetBundle:Customer')->find($id);
        CheckAccess::userWithCustomer($entity);

        $uploadDorms = array();
        /** @var $upload Upload */
        foreach ($entity->getUploads() as $upload) {
            $uploadDorms[$upload->getId()] = FormHelper::composeDeleteForm(
                $this,
                array(
                    'action' => 'upload_delete',
                    'actionParameters' => array('id' => $upload->getId()),
                    'redirectPath' => 'customer_edit',
                    'redirectParams' => array('id' => $entity->getId()),
                )
            );
        }

        $uploadFileForm = $this->createFormBuilder()
            ->setAction($this->generateUrl('upload_new'))
            ->add('presenter', 'hidden', array('data' => 'customer'))
            ->add('presenterId', 'hidden', array('data' => $entity->getId()))
            ->add('submit', 'submit', array('label' => 'Upload file', 'attr' => array('class' => 'btn btn-table-actions')))
            ->getForm();

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Customer entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render(
            'IntranetBundle:Customer:edit.html.twig',
            array(
                'entity' => $entity,
                'edit_form' => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
                'upload_file_form' => $uploadFileForm->createView(),
                'uploadDeleteForms' => $uploadDorms,
            )
        );
    }

    /**
     * Creates a form to edit a Customer entity.
     *
     * @param Customer $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Customer $entity)
    {
        $form = $this->createForm(
            new CustomerType(),
            $entity,
            array(
                'action' => $this->generateUrl('customer_update', array('id' => $entity->getId())),
                'method' => 'PUT',
            )
        );

        $form->add('submit', 'submit', array('label' => 'Update', 'attr' => array('class' => 'btn btn-table-actions')));

        return $form;
    }

    /**
     * Edits an existing Customer entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IntranetBundle:Customer')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Customer entity.');
        }

        CheckAccess::userWithCustomer($entity);

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('customer_edit', array('id' => $id)));
        }

        return $this->render(
            'IntranetBundle:Customer:edit.html.twig',
            array(
                'entity' => $entity,
                'edit_form' => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
            )
        );
    }

    /**
     * Deletes a Customer entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IntranetBundle:Customer')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Customer entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('customer'));
    }

    /**
     * Creates a form to delete a Customer entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('customer_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete', 'attr' => array('class' => 'btn btn-table-actions')))
            ->getForm();
    }


    public function newRelatedAction($id, $name)
    {
        $em = $this->getDoctrine()->getManager();

        /** @var $complaint Customer */
        $customer = $em->getRepository('IntranetBundle:Customer')->find($id);

        $entity = null;
        $form = null;
        $view = null;

        switch ($name) {
            case "complaint":
                $entity = new Complaint();
                $entity->setCustomer($customer);
                $form = $this->createEditFormWithType($entity, new ComplaintType(), 'complaint');
                $view = 'IntranetBundle:Complaint:new.html.twig';
                break;
            case "task":
                $entity = new Task();
                $entity->setCustomer($customer);
                $form = $this->createEditFormWithType($entity, new TaskType(), 'task');
                $view = 'IntranetBundle:Task:new.html.twig';
                break;
            case "user":
                /** @var $entity User */
                $entity = new User();
                $entity->setCustomer($customer);
                $entity->setGroup(UserGroupEnum::CUSTOMERS);
                $form = $this->createEditFormWithType($entity, new UsersType(), 'user');
                $view = 'IntranetBundle:User:new.html.twig';
                break;
            case "monitoredurl":
                $entity = new MonitoredUrl();
                $entity->setCustomer($customer);
                $form = $this->createEditFormWithType($entity, new MonitoredUrlType(), 'monitoredurl');
                $view = 'IntranetBundle:MonitoredUrl:new.html.twig';
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
                'addDaysWarningMessages' => $this->getDoctrine()->getManager()->getRepository('IntranetBundle:ConfigValue')->getAddDaysWarningMessages(),
            )
        );

    }

    public function getAddressAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        /** @var $customer Customer */
        $customer = $this->getDoctrine()->getRepository('IntranetBundle:Customer')->find(
            $request->request->get('customer_id')
        );
        if ($customer->getLevel() == 3 && $customer->getParent()) {
            $customer = $customer->getParent();
        }
        if ($request->request->get('forCampaignInvoice') && $customer->getInvoicesToBeon()) {
            $customer = $this->getDoctrine()->getRepository('IntranetBundle:Customer')->find(40);
        }
        $response = new Response(json_encode($customer->getAddressLines()));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    private function createEditFormWithType($entity, $formType, $name)
    {
        /** @var $entity Complaint */
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
                    'data' => $this->generateUrl('customer_show', ['id' => $entity->getCustomer()->getId()]),
                    'mapped' => false
                ]
            );

        return $form;
    }


    public function parentForLevelAction($id, $level)
    {

        /** @var $repository CustomerRepository */
        $repository = $this->getDoctrine()->getRepository('IntranetBundle:Customer');
        $entities = $repository->getCustomersForLevel($id, $level);

        $response = new Response(json_encode($entities));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    public function contactCustomerDeleteAction(Request $request,$id,$contactId){
         $em = $this->getDoctrine()->getManager();
         $contact = $em->getRepository('IntranetBundle:Contact')->find($contactId);
         $customer = $em->getRepository('IntranetBundle:Customer')->find($id);
         $contact->removeCustomer($customer);
         $em->flush();
         return $this->redirect($this->generateUrl('contact_show', array('id' => $contactId)));
    }

    public function contactCustomerRelationAction(Request $request){
         $em = $this->getDoctrine()->getManager();
         if ($request->isMethod('POST')) {
                $postData = $request->request->get('form');
                $contactId = $postData['contact_id'];
                $customerId = $postData['customer_id'];
                $backPath = $this->generateUrl('contact_show', array('id' => $contactId));
                $contact = $em->getRepository('IntranetBundle:Contact')->find($contactId);
                $customer = $em->getRepository('IntranetBundle:Customer')->find($customerId);
                $contact->addCustomer($customer);
                $em->persist($contact);
                $em->flush();
               return $this->redirect($backPath);
            }
    }


}
