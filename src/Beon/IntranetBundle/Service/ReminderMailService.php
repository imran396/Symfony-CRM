<?php

namespace Beon\IntranetBundle\Service;

use Symfony\Component\HttpKernel\Controller\ControllerReference;
use Symfony\Bundle\TwigBundle\TwigEngine;
use Beon\IntranetBundle\Entity\Task;
use Beon\IntranetBundle\Entity\Pressrelease;
use Beon\IntranetBundle\Entity\Campaign;
use Beon\IntranetBundle\Entity\MailQueue;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Beon\IntranetBundle\Entity\Log;
use Beon\IntranetBundle\Enums\LogActionEnum;

class ReminderMailService {

	protected $container;
	protected $router;
	protected $mailer;
	protected $twig;
	
	
	public function __construct(\Symfony\Component\DependencyInjection\ContainerInterface $container, TwigEngine $twig, \Swift_Mailer $mailer) 
	{
		$this->container = $container;
		$this->router = $container->get('router');
		$this->twig = $twig;
		$this->mailer = $mailer;	
	}
	
	public function getDoctrine()
	{
		return $this->container->get('doctrine');
	}
	
	public function getPivotDate()
	{
		return date('Y-m-d H:i:s', strtotime('-72 hours'));
	}
	
	public function send($cronType) 
	{
		$em = $this->getDoctrine();
			
		if ($cronType=='taskApproval') {
		    $this->sendTaskExternalMail();
		} else if ($cronType=='campaignApproval') {
		    $this->sendCampaignMail();
		} else if ($cronType=='pressReleaseApproval') {
		    $this->sendPressreleaseMail();
		} else if ($cronType=='taskOverdue') {
		    $this->sendTaskOverdue();
		} else {
		    $this->sendTaskExternalMail();
		    $this->sendCampaignMail();
		    $this->sendPressreleaseMail();
		    $this->sendTaskOverdue();
		}
	}
	
	
	public function sendTaskOverdue()
	{
		$em = $this->getDoctrine()->getManager();
		
		$tasks = $this->getDoctrine()->getRepository('IntranetBundle:Task')->findCronOverdueData($this->getPivotDate());
		if ($tasks) {
		    echo "found " . count($tasks) . " tasks\n";
			foreach ($tasks as $task) {
                echo "http://beon/app_dev.php/task/{$task->getId()}/show " . $task->getUser()->getName() . " " . $task->getDueDate()->format('d.m.Y') . "\n";
                
                $email = $task->getUser()->getEmail();
                $mailBody = nl2br($this->twig->render(
                    'IntranetBundle:Task:mailOverdue.html.twig',
                    array(
                        'entity' => $task,
                        'link' => $this->router->generate(
                                'task_show',
                                ['id' => $task->getId()],
                                UrlGeneratorInterface::ABSOLUTE_URL
                            ),
                    )
                ));

                $message = \Swift_Message::newInstance()
                    ->setSubject('Aufgabe überfällig')
                    ->setFrom($this->container->getParameter('fromEmail'))
                    ->setTo($email)
                    ->setBody($mailBody, 'text/html', 'utf-8');
                $send = $this->mailer->send($message);
                
                if ($send == 1) {
    			    $this->addLog($task, LogActionEnum::OVERDUE_REMINDER_SENT);
    			}
			}
		}	
	}
	
	public function sendTaskExternalMail()
	{
		$em = $this->getDoctrine()->getManager();
		
		$tasks = $this->getDoctrine()->getRepository('IntranetBundle:Task')->findCronApprovalData();
		if ($tasks) {
		    echo "found " . count($tasks) . " tasks\n";
			foreach ($tasks as $task) {
				if ($task->getApprovalmailsent() && !$task->getApproved()) {
					$messages = unserialize($task->getSerializedApprovalMail());
					
					foreach ($messages as $message) {
    					$this->postProcessMessage($message);
						$this->mailer->send($message);
					}
					
					/* update last reminder date */
					$task->setLastApprovalMailSentAt(new \DateTime());
					$em->persist($task);
					$em->flush();
					
					/* add log entry */
					$this->addLog($task);
				}
			}
		}
		
	}
	
	public function sendPressreleaseMail()
	{
		$em = $this->getDoctrine()->getManager();
		
		$pressReleases = $this->getDoctrine()->getRepository('IntranetBundle:Pressrelease')->findCronData($this->getPivotDate());
		
		if ($pressReleases) {
			foreach ($pressReleases as $pressRelease) {
				if (!$pressRelease->getApproved()) {
					    $messages = unserialize($pressRelease->getSerializedApprovalMail());
					    
					    foreach ($messages as $message) {
					        $this->postProcessMessage($message);
						    $this->mailer->send($message);
					    }
				
				      $pressRelease->setLastApprovalMailSentAt(new \DateTime());
				      $em->persist($pressRelease);
				      $em->flush();
				      
				      /* add log entry */
				      $this->addLog($pressRelease);
				}
				
			}
		}
	}
	
	public function sendCampaignMail()
	{
		$em = $this->getDoctrine()->getManager();
		
		$campaigns = $this->getDoctrine()->getRepository('IntranetBundle:Campaign')->findCronData($this->getPivotDate());
					
		if ($campaigns) {
		
			foreach ($campaigns as $campaign) {
				if (!$campaign->getDenied() && !$campaign->getApproved()) {
					$messages = unserialize($campaign->getSerializedApprovalMail());
					
					foreach ($messages as $message) {
					    $this->postProcessMessage($message);
						$this->mailer->send($message);
					}
				
					$campaign->setLastApprovalMailSentAt(new \DateTime());
					$em->persist($campaign);
					$em->flush();
					
					/* add log entry */
					$this->addLog($campaign);
				}
			}
			
			
		}
	}
	
	public function postProcessMessage($message) {
	    $message->setSubject('Erinnerung: ' . $message->getSubject());
	}
	
	public function addLog($entity, $action = LogActionEnum::APPROVAL_REMINDER_SENT)
	{
	
		$em = $this->getDoctrine()->getManager();
		
		$logEntity = new Log();
		
		$logEntity->setAction($action);
		
		if ($entity instanceof Pressrelease) {
			$logEntity->setPressrelease($entity);
		}
		
		if ($entity instanceof Campaign) {
			$logEntity->setCampaign( $entity );
		}
		
		if ($entity instanceof Task) {
			$logEntity->setTask( $entity );
		}
		
		$logEntity->setCreatedAt(new \DateTime());
		
		$em->persist($logEntity);
		$em->flush();
	
	}
}
