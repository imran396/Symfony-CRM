<?php

namespace Beon\IntranetBundle\Controller;

use Beon\IntranetBundle\Entity\Campaign;
use Beon\IntranetBundle\Entity\Note;
use Beon\IntranetBundle\Entity\Pressrelease;
use Beon\IntranetBundle\Lib\PaginationHelper;
use Beon\IntranetBundle\Lib\CheckAccess;
use Composer\Config;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Beon\IntranetBundle\Entity\User;
use Beon\IntranetBundle\Entity\Upload;
use Beon\IntranetBundle\Form\UploadType;
use Beon\IntranetBundle\Form\UploadEditType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Process\Exception\InvalidArgumentException;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Upload controller.
 *
 */
class UploadController extends Controller
{

    const TEMPLATE_UPDATE_NEW = 'IntranetBundle:Upload:new.html.twig';
    const TEMPLATE_EXTERNAL_UPLOAD = 'IntranetBundle:Upload:external.html.twig';
    const ITEMS_ON_PAGE = 10;


    /**
     * Lists all Upload entities.
     *
     */
    public function indexAction(Request $request)
    {
        return PaginationHelper::composeIndex($this, $request, 'Upload', self::ITEMS_ON_PAGE, 'createdat DESC');
    }

    /**
     * Creates a new Upload entity.
     *
     */
    public function createAction(Request $request)
    {

        $entity = new Upload();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        $formData = $request->request->get('form');

        $presenterEntity = null;

        $em = $this->getDoctrine()->getManager();

        $presenterId = $form->get('presenterId')->getData();
        $presenter = $form->get('presenter')->getData();

        $isInvoice = false;

        if ($form->has('isInvoice')) {
            $isInvoice = $form->get('isInvoice')->getData();
        }

        $redirectParh = null;

        if ($presenterId && $form->isValid()) {

            /** @var $presenterEntity Campaign|Note|Pressrelease */
            /** @var $file UploadedFile */
            $file = $form->get('file')->getData();

            switch ($presenter) {
                case 'campaign':
                    $presenterEntity = $em->getRepository('IntranetBundle:Campaign')->find($presenterId);
                    CheckAccess::userWithCampaign($presenterEntity);
                    break;
                case 'pressrelease':
                    $presenterEntity = $em->getRepository('IntranetBundle:Pressrelease')->find($presenterId);
                    CheckAccess::userWithPressRelease($presenterEntity);
                    break;
                case 'note':
                    $presenterEntity = $em->getRepository('IntranetBundle:Note')->find($presenterId);
                    CheckAccess::userWithNote($presenterEntity);
                    break;
                case 'supplierGroup':
                    $presenterEntity = $em->getRepository('IntranetBundle:SupplierGroup')->find($presenterId);
                    break;
                case 'supplier':
                    $presenterEntity = $em->getRepository('IntranetBundle:Supplier')->find($presenterId);
                    break;
                case 'task':
                    $presenterEntity = $em->getRepository('IntranetBundle:Task')->find($presenterId);
                    CheckAccess::userWithTask($presenterEntity, false);
                    break;
                case 'customer':
                    $presenterEntity = $em->getRepository('IntranetBundle:Customer')->find($presenterId);
                    CheckAccess::userWithCustomer($presenterEntity, false);
                    break;
            }

            /* upload file */
            if ($presenterEntity && $file) {
                $fileUploadService = $this->get('UploadFileService');
                $fileUploadService->upload($file, $presenterEntity, $isInvoice);
            }
        }

        if ($presenter) {
            return $this->redirect($this->generateUrl(strtolower($presenter) . '_show', array('id' => $presenterId)));
        }

        return $this->redirect($this->generateUrl('upload_show', array('id' => $entity->getId())));

    }

    /**
     * Creates a form to create a Upload entity.
     *
     * @param Upload $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Upload $entity)
    {
        $form = $this->createForm(
            new UploadType(),
            $entity,
            array(
                'action' => $this->generateUrl('upload_create'),
                'method' => 'POST',
            )
        );
        $form->add('submit', 'submit', array('label' => 'Upload'));

        return $form;
    }

    private function createCreateFormExternal(Upload $entity, $type, $id, $hashcode)
    {
        $form = $this->createForm(
            new UploadType(),
            $entity,
            array(
                'action' => $this->generateUrl(
                        'external_upload',
                        array('type' => $type, 'id' => $id, 'hashCode' => $hashcode)
                    ),
                'method' => 'POST',
                'externalInvoice' => true,
            )
        );

        $form->add('submit', 'submit', array('label' => 'Upload file'));

        return $form;
    }
    
    public function mailgunAction(Request $request) {
        $subject = trim($request->request->get('subject'));
        if ($request->request->has('from')) {
            $from = $request->request->get('from');
            if (preg_match('/(.*)\\<(.*)\\>/', $from, $matches)) {
                $from = array($matches[2] => trim($matches[1]));
            }
        } else {
            $from = null;
        }
        if (!$request->request->get('attachment-count')) {
            return $this->_mailgunError($from, $subject, 'No attachments found');
        } else {
            if (strlen($subject) == 7) {
                $suffix = substr($subject, 0, 2);
                $id = intval(substr($subject, 2));
                $em = $this->getDoctrine()->getManager();
                if ($suffix == 'AG') {
                    $entity = $em->getRepository('IntranetBundle:Task')->find($id);
                } else if ($suffix == 'AD') {
                    $entity = $em->getRepository('IntranetBundle:Campaign')->find($id);
                } else if ($suffix == 'PM') {
                    $entity = $em->getRepository('IntranetBundle:Pressrelease')->find($id);
                } else if ($suffix == 'GR') {
                    $entity = $em->getRepository('IntranetBundle:SupplierGroup')->find($id);
                } else if ($suffix == 'PD') {
                    $entity = $em->getRepository('IntranetBundle:Supplier')->find($id);
                } else if ($suffix == 'KU') {
                    $entity = $em->getRepository('IntranetBundle:Customer')->find($id);
                }
                if ($entity) {
                    $fileUploadService = $this->get('UploadFileService');
                    $info = $fileUploadService->upload($request->files, $entity);
                    return $this->_mailgunSuccess($from, $entity, $info['uploads']);
                }
            }
            
            // needs triage
            $fileUploadService = $this->get('UploadFileService');
            $info = $fileUploadService->upload($request->files, null);
            return $this->_mailgunTriage($from, $info['uploads']);
        }
    }
    
    private function _mailgunError($from, $subject, $msg) {
        if ($from) {
            $mailBody = nl2br($this->renderView(
                'IntranetBundle:Upload:mailUploadError.html.twig',
                array(
                    'msg' => $msg,
                )
            ));

            $message = \Swift_Message::newInstance()
                ->setSubject('Re: ' . $subject)
                ->setFrom($this->container->getParameter('fromEmail'))
                ->setTo($from)
                ->setBody($mailBody, 'text/html', 'utf-8');
            $this->get('mailer')->send($message);
        }

        return new Response($msg, Response::HTTP_NOT_ACCEPTABLE);
    }
    
    private function _mailgunTriage($from, $uploads) {
        if ($from) {
            $mailBody = nl2br($this->renderView(
                'IntranetBundle:Upload:mailUploadTriage.html.twig',
                array(
                    'uploads' => $uploads,
                )
            ));

            $message = \Swift_Message::newInstance()
                ->setSubject('Email-Upload benötigt Zuordnung')
                ->setFrom($this->container->getParameter('fromEmail'))
                ->setTo($from)
                ->setBody($mailBody, 'text/html', 'utf-8');
            $this->get('mailer')->send($message);
        }
        
        return new Response('OK');
    }
    
    private function _mailgunSuccess($from, $entity, $uploads) {
        if ($from) {
            $classname = strtolower(basename(strtr(get_class($entity), '\\', '/')));
            
            $link = $this->generateUrl(
                $classname . '_show',
                ['id' => $entity->getId()],
                UrlGeneratorInterface::ABSOLUTE_URL
            );

            $mailBody = nl2br($this->renderView(
                'IntranetBundle:Upload:mailUploadSuccess.html.twig',
                array(
                    'entity' => $entity,
                    'link' => $link,
                    'uploads' => $uploads,
                )
            ));

            $message = \Swift_Message::newInstance()
                ->setSubject('Email-Upload für ' . $entity . ' erfolgreich')
                ->setFrom($this->container->getParameter('fromEmail'))
                ->setTo($from)
                ->setBody($mailBody, 'text/html', 'utf-8');
            $this->get('mailer')->send($message);
        }
        
        return new Response('OK');
    }

    /**
     * Displays a form to create a new Upload entity.
     *
     */
    public function newAction(Request $request)
    {
        $entity = new Upload();
        $formData = $request->request->get('form');

        $form = $this->createCreateForm($entity);

        if (isset($formData['presenterId']) && isset($formData['presenter'])) {
            $form->get('presenterId')->setData($formData['presenterId']);
            $form->get('presenter')->setData($formData['presenter']);
        }

        return $this->render(
            self::TEMPLATE_UPDATE_NEW,
            array(
                'entity' => $entity,
                'form' => $form->createView(),
            )
        );
    }

    /**
     * External Upload
     */
    public function externalUploadAction(Request $request, $type, $id, $hashCode)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = new Upload();
        $form = $this->createCreateFormExternal($entity, $type, $id, $hashCode);
        $campaign = $em->getRepository('IntranetBundle:Campaign')->find($id);

        if (!$campaign) {
            throw $this->createNotFoundException('Unable to find upload entity.');
        }

        if ($campaign->getInvoiceUploadHash() != $hashCode) {
            throw new InvalidArgumentException("Invalid request");
        }
        $form->handleRequest($request);
        $formData = $request->request->get('form');

        if ($request->isMethod('POST')) {
            /* upload file */
            $file = $form->get('file')->getData();
            $fileUploadService = $this->get('UploadFileService');
            $isInvoice = false;
            if ($form->has('isInvoice')) {
                $isInvoice = $form->get('isInvoice')->getData();
            }
            $is_upload = $fileUploadService->upload($file, $campaign, $isInvoice);

            $this->get('session')->getFlashBag()->add('success', 'Upload has been successful');
        }

        return $this->render(
            self::TEMPLATE_EXTERNAL_UPLOAD,
            array(
                'entity' => $entity,
                'form' => $form->createView(),
            )
        );
    }

    /**
     * Finds and displays a Upload entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IntranetBundle:Upload')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Upload entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render(
            'IntranetBundle:Upload:show.html.twig',
            array(
                'entity' => $entity,
                'delete_form' => $deleteForm->createView()
            )
        );
    }

    /**
     * Displays a form to edit an existing Upload entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IntranetBundle:Upload')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Upload entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render(
            'IntranetBundle:Upload:edit.html.twig',
            array(
                'entity' => $entity,
                'edit_form' => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
            )
        );
    }

    /**
     * Creates a form to edit a Upload entity.
     *
     * @param Upload $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Upload $entity)
    {
        $form = $this->createForm(
            new UploadEditType(),
            $entity,
            array(
                'action' => $this->generateUrl('upload_update', array('id' => $entity->getId())),
                'method' => 'PUT',
            )
        );

        $form->add('submit', 'submit', array('label' => 'Update','attr'=> array('class' =>'btn btn-table-actions')));

        return $form;
    }

    /**
     * Edits an existing Upload entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IntranetBundle:Upload')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Upload entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('upload_edit', array('id' => $id)));
        }

        return $this->render(
            'IntranetBundle:Upload:edit.html.twig',
            array(
                'entity' => $entity,
                'edit_form' => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
            )
        );
    }

    /**
     * Deletes a Upload entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        $redirect = $request->get('form');
        $redirect = isset($redirect['redirect']) ? $redirect['redirect'] : null;
        $redirect = isset($redirect) ? $redirect : $this->generateUrl('upload');

        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('IntranetBundle:Upload')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Upload entity.');
        }

        /** @var $entity Upload */
        $filePath = $this->container->getParameter('def.upload_path') . '/' . $entity->getFsFilename();

        if (is_file($filePath) && file_exists($filePath)) {

            $isdeletable = $em->getRepository('IntranetBundle:Upload')->isdeletable($entity, 'campaign');

            if ($isdeletable) {
                unlink($filePath);
            }
        }

        $em->remove($entity);
        $em->flush();

        return $this->redirect($redirect);
    }

    


    public function downloadAction($id, $fileName)
    {
        /** @var $repository EntityRepository */
        $repository = $this->getDoctrine()->getRepository('IntranetBundle:Upload');

        /** @var $fileData Upload */
        $fileData = $repository->createQueryBuilder('u')
            ->where('u.id = :id')
            ->andWhere('u.filename like :filename')
            ->setParameter('id', $id)
            ->setParameter('filename', $fileName)
            ->getQuery()
            ->getOneOrNullResult();

        return $this->sendDownload($fileData);
    }

    public function downloadPublicAction($id, $fsFilename)
    {
        /** @var $repository EntityRepository */
        $repository = $this->getDoctrine()->getRepository('IntranetBundle:Upload');

        /** @var $fileData Upload */
        $fileData = $repository->createQueryBuilder('u')
            ->where('u.id = :id')
            ->andWhere('u.fsFilename like :fsFilename')
            ->setParameter('id', $id)
            ->setParameter('fsFilename', $fsFilename)
            ->getQuery()
            ->getOneOrNullResult();

        return $this->sendDownload($fileData);
    }

    private function sendDownload($fileData) {
        $uploadDir = $this->container->getParameter('def.upload_path');

        $response = new Response();

        if ($fileData && file_exists($filePath = $uploadDir . '/' . $fileData->getFsFilename())) {
            header('Content-Type: ' . $fileData->getMimeType());
            header("Content-Transfer-Encoding: Binary");
            header("Content-disposition: attachment; filename=\"" . $fileData->getFilename() . "\"");

            readfile($filePath);

        } else {
            $response->setContent('<h1>File does not exist <h1>');
            $response->setStatusCode(Response::HTTP_NOT_FOUND);
        }

        return $response;
    }

    /**
     * Creates a form to delete a Upload entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('upload_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete', 'attr' => array('class' => 'btn btn-table-actions')))
            ->getForm();
    }

    public function toggleGroupFlagAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        /** @var $upload Upload */
        $upload = $this->getDoctrine()->getRepository('IntranetBundle:Upload')->find(
            $request->request->get('id')
        );

        if ($upload->getTask()) {
            CheckAccess::userWithTask($upload->getTask(), false);
            $group = $this->get('security.context')->getToken()->getUser()->getGroup();
            if ($group == 41) {
                $upload->setGroupFlag41(!$upload->getGroupFlag41());
            } else {
                if ($group == 42 && !$upload->getTask()->getApproved()) {
                    $upload->setGroupFlag42(!$upload->getGroupFlag42());
                }
            }
            $em->persist($upload);
            $em->flush();
        }

        $response = new Response('tag-' . $upload->getTagColor());

        return $response;
    }
}
