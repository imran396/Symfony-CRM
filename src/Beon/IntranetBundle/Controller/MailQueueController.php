<?php
/**
 * User: LITVAN
 * Date: 3/21/14
 * Time: 11:17 PM
 */

namespace Beon\IntranetBundle\Controller;


use Beon\IntranetBundle\Entity\Interfaces\Approvable;
use Beon\IntranetBundle\Entity\MailQueue;
use Beon\IntranetBundle\Enums\BasicEnum;
use Beon\IntranetBundle\Enums\StatusEnum;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Validator\Constraints\DateTime;

class MailQueueController extends Controller
{


    public function approveAction($id)
    {
        /** @var $mailQueue MailQueue */
        $mailQueue = $this->getDoctrine()->getRepository('IntranetBundle:MailQueue')->find($id);

        $mailQueue->setState(StatusEnum::OK);

        $em = $this->getDoctrine()->getManager();
        $em->persist($mailQueue);
        $em->flush();

        if ($mailQueue->getRedirect()) {
            return $this->redirect($this->generateUrl($mailQueue->getRedirect(), ['id' => $mailQueue->getEntityId(), 'ticket' => $id]));
        }

        return $this->redirect($this->generateUrl('beon_homepage'));
    }

    public function approveConfirmAction(Request $request, $id)
    {

        $form = $request->request->get('form');
        $em = $this->getDoctrine()->getManager();

        if (isset($form['entity']) && $form['id']) {
            /** @var $entity Approvable */
            $entity = $em->getRepository('IntranetBundle:' . $form['entity'])->find($form['id']);

            /** @var $mailQueue MailQueue */
            $mailQueue = $em->getRepository('IntranetBundle:MailQueue')->find($id);
            $mailQueue->setState(StatusEnum::DONE);

            /** @var $securityContext SecurityContext */
            $securityContext = $this->get('security.context');

            $entity->setApproved(true);
            $entity->setApprovedAt(new \DateTime());
            $entity->setApprovedBy($securityContext->getToken()->getUser());

            $em->persist($entity);
            $em->persist($mailQueue);
            $em->flush();
            $this->get('session')->getFlashBag()->set('error', 'Successfully approved');

            return $this->redirect($this->generateUrl(strtolower($form['entity']) . '_show', ['id' => $form['id']]));
        }

        $this->get('session')->getFlashBag()->set('error', 'Fail');
        return $this->redirect($this->generateUrl('beon_homepage'));
    }


}