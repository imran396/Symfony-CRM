<?php
/**
 * User: LITVAN
 * Date: 4/12/14
 * Time: 5:34 PM
 */

namespace Beon\IntranetBundle\Helper;


use Beon\IntranetBundle\Entity\Task;
use Beon\IntranetBundle\Entity\Campaign;
use Beon\IntranetBundle\Entity\Pressrelease;
use Beon\IntranetBundle\Entity\Note;
use Beon\IntranetBundle\Entity\Log;
use Beon\IntranetBundle\Enums\LogActionEnum;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

abstract class ApprovementFormComposer
{
    
    public static function compose($request, ObjectManager $em, Controller $controller, $entity, $entityName)
    {
        /** @var $entity Pressrelease|Campaign */
        $approveForm = $controller->createFormBuilder(null, [
            'action' => $controller->generateUrl(strtolower($entityName) . '_approve', ['id' => $entity->getId()]),
            'attr' => ['class' => 'ml5']
        ])
        ->add('Approve', 'submit',['attr' => ['class' => 'btn']]);
        return $approveForm->getForm()->createView();

    }

    public static function composeApprove(Controller $controller, $entity)
    {
        $entityName = basename(strtr(get_class($entity), '\\', '/'));
        $approveForm = $controller->createFormBuilder(null, [
            'action' => $controller->generateUrl(strtolower($entityName) . '_approve', ['id' => $entity->getId()]),
            'attr' => ['class' => 'ml5']
        ])
        ->add('comment', 'textarea', ['required' => false])
        ->add('files', 'multiplefile', ['required' => false, 'mapped' => false]);
        return $approveForm->getForm();
    }

    public static function composeDeny(Controller $controller, $entity)
    {
        $entityName = basename(strtr(get_class($entity), '\\', '/'));
        $reasonRequired = $entityName == 'Task' || $entityName == 'Pressrelease';
        $denyForm = $controller->createFormBuilder(null, [
            'action' => $controller->generateUrl(strtolower($entityName) . '_deny', ['id' => $entity->getId()]),
            'attr' => ['class' => 'ml5']
        ])
        ->add('reason', 'textarea', ['required' => $reasonRequired])
        ->add('files', 'multiplefile', ['required' => false, 'mapped' => false]);
        return $denyForm->getForm();
    }

    public static function handleApprove(Controller $controller, $form, $entity)
    {
        $em = $controller->getDoctrine()->getManager();
        $approver = $controller->get('security.context')->getToken()->getUser();
        $comment = trim($form->get('comment')->getData());
        $uploadFileObject = array_filter($form->get('files')->getData());

        if ($comment || $uploadFileObject) {
            $note = new Note();
            self::linkEntity($note, $entity);
            $note->setCustomer($entity->getCustomer());
            $note->setUser($approver);
            $note->setText($comment);
            $em->persist($note);
            $entity->addNote($note);
		    $controller->get('UploadFileService')->upload($uploadFileObject, $note);
        }

        $logEntity = new Log();
        $logEntity->setUser($approver);
        $logEntity->setAction( LogActionEnum::APPROVED);
        self::linkEntity($logEntity, $entity);
        $logEntity->setCreatedAt( new \DateTime() );
        $em->persist( $logEntity );

        return array($approver, $comment);
    }

    public static function handleDeny(Controller $controller, $form, $entity)
    {
        $em = $controller->getDoctrine()->getManager();
        $denier = $controller->get('security.context')->getToken()->getUser();
        $reason = trim($form->get('reason')->getData());
        $uploadFileObject = array_filter($form->get('files')->getData());

        if ($reason || $uploadFileObject) {
            $note = new Note();
            $entityName = self::linkEntity($note, $entity);
            $note->setCustomer($entity->getCustomer());
            $note->setUser($denier);
            if ($reason) {
                if ($entityName == 'Campaign') {
                    $note->setText('Kampange abgelehnt. Grund: ' . $reason);
                } else {
                    $note->setText('Korrekturwunsch: ' . $reason);
                }
            }
            $em->persist($note);
            $entity->addNote($note);
		    $controller->get('UploadFileService')->upload($uploadFileObject, $note);
        }

        $logEntity = new Log();
        $logEntity->setUser($denier);
        $logEntity->setAction(LogActionEnum::DENIED);
        self::linkEntity($logEntity, $entity);
        $logEntity->setCreatedAt( new \DateTime() );
        $em->persist( $logEntity );

        return array($denier, $reason);
    }

    private static function linkEntity($many, $one) {
        $entityName = basename(strtr(get_class($one), '\\', '/'));
        if ($entityName == 'Task') {
            $many->setTask($one);
        } else if ($entityName == 'Pressrelease') {
            $many->setPressrelease($one);
        } else if ($entityName == 'Campaign') {
            $many->setCampaign($one);
        }
        return $entityName;
    }
} 
