<?php

namespace Beon\IntranetBundle\Controller;

use Beon\IntranetBundle\Entity\Contact;
use Beon\IntranetBundle\IntranetBundle;
use Beon\IntranetBundle\Enums\CampaignIncludedServicesEnum;
use Beon\IntranetBundle\Entity\Repository\SupplierRepository;
use Beon\IntranetBundle\Entity\SupplierContact;
use Beon\IntranetBundle\Entity\Upload;
use Beon\IntranetBundle\Enums\SupplierTypesEnum;
use Beon\IntranetBundle\Form\SupplierType;
use Beon\IntranetBundle\Helper\FormHelper;
use Beon\IntranetBundle\Lib\PaginationHelper;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Beon\IntranetBundle\Entity\Supplier;
use Symfony\Component\HttpFoundation\Response;
use Beon\IntranetBundle\Entity\Repository\TaskRepository;
use Symfony\Component\Validator\Constraints\Callback;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormError;


/**
 * Supplier controller.
 *
 */
class SupplierController extends Controller
{
    const ITEMS_ON_PAGE = 10;

    /**
     * Lists all Supplier entities.
     *
     */
    public function indexAction(Request $request)
    {
	    /* applying filters */
	    $userFilterService = $this->get('UserCustomerFilterService');
	    $filterData =  $userFilterService->handleRequest('Supplier', $this, $request);
	    $repository = $filterData['repository'];
	
        $callback = function($qb) use($repository) {
            if ($repository->getSupplierTypeFilter()) {
                $qb->andWhere('obj.supplierType = :type');
                $qb->setParameter('type', $repository->getSupplierTypeFilter());
            }
            if ($repository->getCityFilter()) {
                $qb->andWhere('obj.city = :city');
                $qb->setParameter('city', $repository->getCityFilter());
            }
            if ($repository->getPlainTextFilter()) {
                $qb->andWhere('obj.id = :id OR obj.name LIKE :query');
                $qb->setParameter('id', intval($repository->getPlainTextFilter()));
                $qb->setParameter('query', '%' . $repository->getPlainTextFilter() . '%');
            }
            $qb->orderBy('obj.name', 'ASC');
	    };
        
        return PaginationHelper::composeFilterIndex($this, $request, 'Supplier', self::ITEMS_ON_PAGE, $callback, $filterData);
    }

    /**
     * Creates a new Supplier entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Supplier();
        $form = $this->createCreateForm($entity);
        $formData = $request->request->get('supplier');
        $contactId = isset($formData['contact_id'])?$formData['contact_id']:null;

        if($contactId){
            $form->add('contact_id', 'hidden', array('mapped' => false));
        }

        $form->handleRequest($request);
        $redirect = $form->get('redirect')->getData();

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            if (isset($redirect)) {
                return $this->redirect($redirect);
            } else {
                return $this->redirect($this->generateUrl('supplier_show', array('id' => $entity->getId())));
            }
        }

        return $this->render(
            'IntranetBundle:Supplier:new.html.twig',
            array(
                'entity' => $entity,
                'form' => $form->createView(),
            )
        );
    }

    /**
     * Creates a form to create a Supplier entity.
     *
     * @param Supplier $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Supplier $entity)
    {
        $form = $this->createForm(
            new SupplierType(),
            $entity,
            array(
                'action' => $this->generateUrl('supplier_create'),
                'method' => 'POST',
            )
        );

        $form
            ->add('submit', 'submit', array('label' => 'Create', 'attr' => array('class' => 'btn btn-table-actions')))
            ->add('redirect', 'hidden', [
                'data' => null,
                'mapped' => false
            ]);

        return $form;
    }

    /**
     * Displays a form to create a new Supplier entity.
     *
     */
    public function newAction(Request $request)
    {
        $entity = new Supplier();
        $form = $this->createCreateForm($entity);
        $formData = $request->request->get('form');

        return $this->render(
            'IntranetBundle:Supplier:new.html.twig',
            array(
                'entity' => $entity,
                'form' => $form->createView(),
                'supplierAudienceTitles' => SupplierTypesEnum::getAudienceTitles()
            )
        );
    }

    /**
     * Finds and displays a Supplier entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IntranetBundle:Supplier')->find($id);
        $task = $em->getRepository('IntranetBundle:Task')->getSupplierTask($entity);


        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Supplier entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render(
            'IntranetBundle:Supplier:show.html.twig',
            array(
                'entity' => $entity,
                'task' => $task,
                'delete_form' => $deleteForm->createView(),
            )
        );
    }

    /**
     * Displays a form to edit an existing Supplier entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        /** @var $entity Supplier */
        $entity = $em->getRepository('IntranetBundle:Supplier')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Supplier entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        $supplierTypes = SupplierTypesEnum::getTitles();

        $addSupplierForm = $this->createFormBuilder()
            ->setAction($this->generateUrl('contact_new'))
            ->add('supplier_id', 'hidden', array('data' => $entity->getId()))
            ->add(
                'submit',
                'submit',
                array('label' => 'Add contact', 'attr' => array('class' => 'btn btn-table-actions'))
            )
            ->getForm();

        $uploadDorms = array();
        /** @var $upload Upload */

        foreach ($entity->getUploads() as $upload) {
            $uploadDorms[$upload->getId()] = FormHelper::composeDeleteForm(
                $this,
                array(
                    'action' => 'upload_delete',
                    'actionParameters' => array('id' => $upload->getId()),
                    'redirectPath' => 'supplier_edit',
                    'redirectParams' => array('id' => $entity->getId()),
                )
            );
        }

        $uploadFileForm = $this->createFormBuilder()
            ->setAction($this->generateUrl('upload_new'))
            ->add('presenter', 'hidden', array('data' => 'supplier'))
            ->add('presenterId', 'hidden', array('data' => $entity->getId()))
            ->add(
                'submit',
                'submit',
                array('label' => 'Upload file', 'attr' => array('class' => 'btn btn-table-actions'))
            )
            ->getForm();

        return $this->render(
            'IntranetBundle:Supplier:edit.html.twig',
            array(
                'entity' => $entity,
                'edit_form' => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
                'supplierTypes' => $supplierTypes,
                'addSupplierForm' => $addSupplierForm->createView(),
                'supplierAudienceTitles' => SupplierTypesEnum::getAudienceTitles(),
                'upload_file_form' => $uploadFileForm->createView(),
                'uploadDeleteForms' => $uploadDorms
            )
        );
    }

    /**
     * Creates a form to edit a Supplier entity.
     *
     * @param Supplier $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Supplier $entity)
    {
        $form = $this->createForm(
            new SupplierType(),
            $entity,
            array(
                'action' => $this->generateUrl('supplier_update', array('id' => $entity->getId())),
                'method' => 'PUT',
            )
        );

        $form->add('submit', 'submit', array('label' => 'Update', 'attr' => array('class' => 'btn btn-table-actions')));

        return $form;
    }

    /**
     * Edits an existing Supplier entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IntranetBundle:Supplier')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Supplier entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('supplier_edit', array('id' => $id)));
        }

        return $this->render(
            'IntranetBundle:Supplier:edit.html.twig',
            array(
                'entity' => $entity,
                'edit_form' => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
            )
        );
    }

    /**
     * Deletes a Supplier entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {

        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IntranetBundle:Supplier')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Supplier entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('supplier'));
    }

    public function supplierContactDeleteAction(Request $request, $id,$contactId){
         $em = $this->getDoctrine()->getManager();
         $contact = $em->getRepository('IntranetBundle:Contact')->find($contactId);
         $supplier = $em->getRepository('IntranetBundle:Supplier')->find($id);
         $contact->removeSupplier($supplier);
         $em->flush();
         return $this->redirect($this->generateUrl('contact_show', array('id' => $contactId)));

    }

    /**
     * Creates a form to delete a Supplier entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('supplier_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete', 'attr' => array('class' => 'btn btn-table-actions')))
            ->getForm();
    }


    public function getSupplierDataAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        /** @var $supplier Supplier */
        $supplier = $this->getDoctrine()->getRepository('IntranetBundle:Supplier')->find(
            $request->request->get('supplier_id')
        );
        $response = new Response(json_encode($supplier));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    public function getSupplierTypeAction(Request $request)
    {
        $supplierId = $request->request->get('supplier_id');
        /** @var $supplier Supplier */
        $supplier = $this->getDoctrine()->getRepository('IntranetBundle:Supplier')->find($supplierId);
        $response = new Response(json_encode($supplier->getSupplierType()->getId()));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    public function contactSupplierRelationAction(Request $request){
         $em = $this->getDoctrine()->getManager();
         if ($request->isMethod('POST')) {
                $postData = $request->request->get('form');
                $contactId = $postData['contact_id'];
                $supplierId = $postData['supplier_id'];
                $backPath = $this->generateUrl('contact_show', array('id' => $contactId));
                $contact = $em->getRepository('IntranetBundle:Contact')->find($contactId);
                $supplier = $em->getRepository('IntranetBundle:Supplier')->find($supplierId);
                $contact->addSupplier($supplier);
                $em->persist($contact);
                $em->flush();
               return $this->redirect($backPath);
            }
    }

    public function offerAction(Request $request)
    {
        $uploads = [];
        $contactUser = $this->getDoctrine()->getRepository("IntranetBundle:User")->findOneByName('markus');
        $form = $this->createOfferForm();
        $infoArray = array();
	    $fsFileNames = array();
	
        if ($request->isMethod('POST')) {
            $em = $this->getDoctrine()->getManager();
            $form->handleRequest($request);

            if ($form->isValid()) {
                $queryString = $this->getQueryString($form);
                
                try {
                    $files = $form->get('files')->getData();
                    			
		            if ($files) {
			            $fileUploadService = $this->get('UploadFileService');
			            $infoArray = $fileUploadService->upload($files, null);
			            $uploads = $infoArray['uploads'];
			            $fsFileNames = $infoArray['fsFileNames'];
		            }
		    
                    $fsFileNameQueryString = !empty($fsFileNames) ? implode('|', $fsFileNames) : '';
                    $mailBody = $this->renderView (
                        'IntranetBundle:Supplier:offerMail.html.twig',
                         [
                            'queryString' => $queryString . '&fileName=' . $fsFileNameQueryString,
                            'data' => $form->getData(),
                            'uploads' => $uploads
                         ]
                    );

                    $message = \Swift_Message::newInstance()
                        ->setSubject('New Campaign offer')
                        ->setFrom($this->container->getParameter('fromEmail'))
                        ->setTo($contactUser->getEmail())
                        ->setBody($mailBody, 'text/html', 'utf-8');
                    $this->get('mailer')->send($message);
                    $this->get('session')->getFlashBag()->add('success', 'Vielen Dank für Ihre Angebotsabgabe. Wir haben Ihr Angebot erhalten. Wir setzten uns bei Interesse mit Ihnen in Verbindung.');
                } catch (\Exception $e) {
                    die($e->getMessage());
                }
            }
        }

        return $this->render(
            'IntranetBundle:Supplier:contact.html.twig',
            array(
                'form' => $form->createView(),
            )
        );
    }

    public function checkOfferPeriodDate($data, $context)
    {
        if (isset ($_POST['form']['offerPeriodEnd']) && isset($_POST['form']['offerPeriodStart'])) {
            if ($_POST['form']['offerPeriodStart'] > $_POST['form']['offerPeriodEnd']) {
                $context->addViolation('Offer end date must be greater than start date');
            }
        }
    }

    /**
     * @return \Symfony\Component\Form\Form
     */
    private function createOfferForm()
    {
        $form = $this->createFormBuilder()
            ->add('customerName', 'text', ['constraints' => [new NotBlank()],'attr'=>['class'=>'form-control'],'label_attr' => ['class' => 'control-label col-lg-3 ']])
            ->add('supplierName', 'text', ['constraints' => [new NotBlank()],'attr'=>['class'=>'form-control'],'label_attr' => ['class' => 'control-label col-lg-3 ']])
            ->add('contactFirstname', 'text', ['constraints' => [new NotBlank()],'attr'=>['class'=>'form-control'],'label_attr' => ['class' => 'control-label col-lg-3 ']])
            ->add('contactLastname', 'text', ['constraints' => [new NotBlank()],'attr'=>['class'=>'form-control'],'label_attr' => ['class' => 'control-label col-lg-3 ']])
            ->add('contactPosition', 'text', ['constraints' => [new NotBlank()],'attr'=>['class'=>'form-control'],'label_attr' => ['class' => 'control-label col-lg-3 ']])
            ->add('contactPhone', 'text', ['constraints' => [new NotBlank()],'attr'=>['class'=>'form-control'],'label_attr' => ['class' => 'control-label col-lg-3 ']])
            ->add('contactEmail', 'email', ['constraints' => [new NotBlank(), new Email()],'attr'=>['class'=>'form-control'],'label_attr' => ['class' => 'control-label col-lg-3 ']])
            ->add('notes', 'textarea', ['required'=>false, 'attr'=>['class'=>'form-control'],'label_attr' => ['class' => 'control-label col-lg-3 ']])
            ->add('offerValidTill', 'date', ['widget' => 'single_text', 'constraints' => [new NotBlank()],'attr'=>['class'=>'form-control'],'label_attr' => ['class' => 'control-label col-lg-3 ']])
            ->add('offerPeriodStart', 'date', ['widget' => 'single_text', 'constraints' => [new NotBlank()],'attr'=>['class'=>'form-control'],'label_attr' => ['class' => 'control-label col-lg-3 ']])
            ->add(
                'offerPeriodEnd',
                'date',
                [
                    'widget' => 'single_text',
                    'constraints' => [new NotBlank(), new Callback(['methods' => [[$this, 'checkOfferPeriodDate']]])],
                    'attr'=>['class'=>'form-control'],'label_attr' => ['class' => 'control-label col-lg-3 ']
                ]
            )
            ->add('price', 'number', ['precision' => 2, 'constraints' => [new NotBlank()],'attr'=>['class'=>'form-control'],'label_attr' => ['class' => 'control-label col-lg-3 ']])
            ->add('priceRegular', 'number', ['label' => 'Regular Price','precision' => 2, 'constraints' => [new NotBlank()],'attr'=>['class'=>'form-control'],'label_attr' => ['class' => 'control-label col-lg-3 ']])
            ->add('offerType', 'choice', ['choices' => SupplierTypesEnum::getTitles(), 'required' => true,'attr'=>['class'=>'form-control'],'label_attr' => ['class' => 'control-label col-lg-3 ']])
            ->add('numberOfSeconds','number',[ 'required' => false,'attr'=>['class'=>'form-control'],'label_attr' => ['class' => 'control-label col-lg-3 ']])
            ->add('visitors', 'integer', ['required' => false,'label' => SupplierTypesEnum::getAudienceTitle(SupplierTypesEnum::OnlineType),'attr'=>['class'=>'form-control'],'label_attr' => ['class' => 'control-label col-lg-3 ']])
            ->add('readers', 'integer', ['required' => false,'label' => SupplierTypesEnum::getAudienceTitle(SupplierTypesEnum::PrintType),'attr'=>['class'=>'form-control'],'label_attr' => ['class' => 'control-label col-lg-3 ']])
            ->add('viewers', 'integer', ['required' => false,'label' => SupplierTypesEnum::getAudienceTitle(SupplierTypesEnum::TvType),'attr'=>['class'=>'form-control'],'label_attr' => ['class' => 'control-label col-lg-3 ']])
            ->add('listeners', 'integer', ['required' => false,'label' => SupplierTypesEnum::getAudienceTitle(SupplierTypesEnum::RadioType),'attr'=>['class'=>'form-control'],'label_attr' => ['class' => 'control-label col-lg-3 ']])
            ->add('audienceSize', 'integer', ['required' => false,'label' => SupplierTypesEnum::getAudienceTitle(SupplierTypesEnum::OtherType),'attr'=>['class'=>'form-control'],'label_attr' => ['class' => 'control-label col-lg-3 ']])
            ->add('numberOfAds','integer',['required' => false,'attr'=>['class'=>'form-control'],'label_attr' => ['class' => 'control-label col-lg-3 ']])
            ->add(
                'adsizeWidth',
                'integer',
                ['required' => false, 'label' => false, 'attr' => ['class' => 'pagesize_width form-control'],'label_attr' => ['class' => 'control-label col-lg-3 ']]
            )
            ->add('adsizeHeight', 'integer', ['required' => false, 'label' => false,'attr'=>['class'=>'form-control'],'label_attr' => ['class' => 'control-label col-lg-3 ']])
            ->add('includedServices', 'choice', ['attr' => ['class' => 'form-control'],'label_attr' => ['class' => 'control-label col-lg-3'],'choices' => CampaignIncludedServicesEnum::getTitlesExternal(),'required' => true])
            ->add('includedServicesOther', 'textarea', ['required'=>false,'label'=>' ','attr'=>['class'=>'form-control'],'label_attr' => ['class' => 'control-label col-lg-3 ']])
            ->add('files', 'multiplefile', array('mapped' => false, 'attr'=>['class'=>'form-control'],'label_attr' => ['class' => 'control-label col-lg-3 ']))
            /*
            ->add('files', 'collection',[
                'type'=>'file',
                'mapped' => false,
                'allow_add' => true,
                'allow_delete' => true,
                'options'=>[
                  'label' => false,
                  'required'  => false,
                  'attr'      => ['class' => 'file-box']
                 ],
                 'attr'=>['class'=>'form-control'],'label_attr' => ['class' => 'control-label col-lg-3 ']
                ]
            )
            */
            ->add('submit', 'submit', ['label' => 'Send offer', 'attr' => array('class' => 'btn btn-table-actions')])
            ->getForm();

        return $form;
    }

    /**
     * @param $form
     * @return array
     */
    private function getQueryString($form)
    {
        $offerData = $form->getData();
        $queryString = '';
        foreach ($offerData as $field => $value) {
            if ($value InstanceOf \DateTime) {
                $paramValue = $value->format('Y-m-d');
            } else {
                $paramValue = $value;
            }
            if ($paramValue) {
                if (strlen($paramValue) > 500) {
                    $paramValue = substr($paramValue, 0, 500);
                }
                if (empty($queryString)) {
                    $queryString .= "$field=$paramValue";
                } else {
                    $queryString .= "&$field=$paramValue";
                }
            }
        }

        return $queryString;
    }


}
