<?php

namespace Beon\IntranetBundle\Service;

use Symfony\Component\HttpKernel\Controller\ControllerReference;
use Symfony\Bundle\TwigBundle\TwigEngine;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Beon\IntranetBundle\Entity\Upload;
use Beon\IntranetBundle\Enums\CampaignStatusEnum;
use Beon\IntranetBundle\Form\UploadType;
use Beon\IntranetBundle\Entity\Task;
use Beon\IntranetBundle\Entity\Campaign;

use Beon\IntranetBundle\Entity\Pressrelease;
use Beon\IntranetBundle\Entity\Note;
use Beon\IntranetBundle\Entity\SupplierGroup;
use Beon\IntranetBundle\Entity\Supplier;
use Beon\IntranetBundle\Entity\Customer;

class UploadFileService
{

    protected $container;
    private $uploadPath;
    private $disalowedFileTypes;
	protected $mailer;
	protected $twig;
    protected $router;


	public function __construct(\Symfony\Component\DependencyInjection\ContainerInterface $container,TwigEngine $twig, \Swift_Mailer $mailer, \Symfony\Bundle\FrameworkBundle\Routing\Router $router)
	{
		$this->twig = $twig;
		$this->mailer = $mailer;
		$this->router = $router;
        $this->container = $container;
        $this->uploadPath = $container->getParameter('def.upload_path');
        $this->disalowedFileTypes = $container->getParameter('disalowedFileTypes');
	}

    public function getDoctrine()
    {
        return $this->container->get('doctrine');
    }

    public function upload($uploadFileObject, $entity, $isInvoice = false)
    {

        $em = $this->getDoctrine()->getEntityManager();
        $errorMsgs = array();
        $fsFileNames = array();
        $uploads = array();

        /** @var $presenterEntity Campaign|Note|Pressrelease */
        /** @var $file UploadedFile */

        foreach ($uploadFileObject as $uploadFileObject) {

            $file = $uploadFileObject;

            /* check if file field is not empty */
            if (is_object($file)) {

                if (in_array($file->getClientOriginalExtension(), $this->disalowedFileTypes)) {
                    $errorMsgs = array('error' => 'One of the file is invalid');
                    continue;
                }

                $newUpload = new Upload();

                if ($entity) {
                    if ($entity instanceof Task) {
                        $newUpload->setTask($entity);
                    } else if ($entity instanceof Campaign) {
                        $newUpload->setCampaign($entity);
                    } else if ($entity instanceof Pressrelease) {
                        $newUpload->setPressrelease($entity);
                    } else if ($entity instanceof Note) {
                        $newUpload->setNote($entity);
                        if ($entity->getTask()) {
                            $newUpload->setTask($entity->getTask());
                        }
                    } else if ($entity instanceof SupplierGroup) {
                        $newUpload->setSupplierGroup($entity);
                    } else if ($entity instanceof Supplier) {
                        $newUpload->setSupplier($entity);
                    } else {
                        if ($entity instanceof Customer) {
                            $newUpload->setCustomer($entity);
                        }
                    }
                }

                $fsFileName = sha1(uniqid() . time()) . '.' . $file->getClientOriginalExtension();
                $fsFileNames[] = $fsFileName;


                $newUpload->setMimeType($file->getMimeType());
                $newUpload->setFilename($file->getClientOriginalName());
                $newUpload->setFsFilename($fsFileName);
                $newUpload->setSize($file->getSize());

                if ($isInvoice) {
                    $newUpload->setIsInvoice(true);
                }


                if ($file->move($this->uploadPath, $fsFileName)) {
                    $em->persist($newUpload);
                    $em->flush();
                    $uploads[] = [
                        'id' => $newUpload->getId(), 
                        'name' => $file->getClientOriginalName(), 
                        'url' => $this->router->generate(
                            'upload_download',
                            ['id' => $newUpload->getId(), 'fileName' => $file->getClientOriginalName()],
                            UrlGeneratorInterface::ABSOLUTE_URL
                        ), 
                        'editUrl' => $this->router->generate(
                            'upload_edit',
                            ['id' => $newUpload->getId()],
                            UrlGeneratorInterface::ABSOLUTE_URL
                        )
                    ];
                }
            }

        }

        $info = array('uploads' => $uploads, 'fsFileNames' => $fsFileNames);
        
        if ($isInvoice && $entity && $entity instanceof Campaign) {
            if ($entity->getApproved() && $entity->getStatus() < CampaignStatusEnum::INVOICE_RECEIVED) {
                $entity->setStatus(CampaignStatusEnum::INVOICE_RECEIVED);
                $em->persist($entity);
                $em->flush();
            }

            $customer = $entity->getCustomer();
            $notifyUsers = $customer->getUsersWithRole('ROLE_CAMPAIGNS_APPROVE');
            if (!$notifyUsers || strpos($entity->getInvoiceAddress(), 'beon') !== false) {
                $notifyUsers = array($em->getRepository("IntranetBundle:User")->find(11));
            }
            $this->notification($notifyUsers,$entity,$info['uploads']);
        }

        return $info;
    }

    public function notification($users, $entity, $uploads)
    {   
        $subject = 'Rechnung wurde bereitgestellt';
        if ($entity instanceof Campaign) {
            $link = $this->router->generate(
                'campaign_show',
                ['id' => $entity->getId()],
                UrlGeneratorInterface::ABSOLUTE_URL
            );
            $subject .= ' für ' . $entity->getCustomer();
        } else {
            $link = '';
        }

        foreach ($users as $user) {
            $mailBody = nl2br($this->twig->render(
                'IntranetBundle:Upload:notification.html.twig',
                array(
                    'recipient' => $user,
                    'entity' => $entity,
                    'uploads' => $uploads,
                    'link' => $link,
                )
            ));

            $message = \Swift_Message::newInstance()
                ->setSubject($subject)
                ->setFrom($this->container->getParameter('fromEmail'))
                ->setTo($user->getEmail())
                ->setBody($mailBody, 'text/html', 'utf-8');
            $this->mailer->send($message);
        }
    }
}
