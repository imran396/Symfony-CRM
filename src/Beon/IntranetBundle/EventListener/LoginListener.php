<?php
/**
 * User: Imran
 * Date: 7/26/14
 * Time: 10:59 PM
 */

namespace Beon\IntranetBundle\EventListener;

use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\Security\Core\Event\AuthenticationFailureEvent;
use Doctrine\Bundle\DoctrineBundle\Registry as Doctrine;
use Beon\IntranetBundle\Entity\Log;

class LoginListener
{
    protected $doctrine;

    public function __construct(Doctrine $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function onLogin(InteractiveLoginEvent $event)
    {
        $user = $event->getAuthenticationToken()->getUser();
        $log = new Log();
        $em = $this->doctrine->getManager();
        $log->setCreatedAt(new \DateTime());
        $log->setAction(0);
        $log->setUser($user);
        $em->persist($log);
        $em->flush();
    }

    public function onLoginFailor(AuthenticationFailureEvent $event)
    {
        $em = $this->doctrine->getManager();
        $username = $event->getAuthenticationToken()->getUser();
        $user = $em->getRepository('IntranetBundle:User')->findOneByName($username);
        $log = new Log();
        $log->setCreatedAt(new \DateTime());
        $log->setAction(1);
        if (!empty($user)) {
            $log->setUser($user);
        }
        $em->persist($log);
        $em->flush();
    }
}