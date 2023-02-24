<?php
/**
 * User: LITVAN
 * Date: 3/28/14
 * Time: 10:12 PM
 */

namespace Beon\IntranetBundle\Listener;


use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent,
    Symfony\Component\HttpFoundation\Request,
    Symfony\Component\HttpFoundation\RedirectResponse,
    Symfony\Component\HttpFoundation\Session\Session,
    Symfony\Component\Routing\Router;

class AccessDeniedListener
{
    protected $_session;
    protected $_router;
    protected $_request;

    public function __construct(Session $session, Router $router, Request $request)
    {
        $this->_session = $session;
        $this->_router = $router;
        $this->_request = $request;
    }

    public function onAccessDeniedException(GetResponseForExceptionEvent $event)
    {
        if ($event->getException()->getMessage() == 'Access Denied') {

            $this->_session->getFlashBag()->set('error', 'Access Denied. You do not have permission to access this page.');

            if ($this->_request->headers->get('referer')) {
                $route = $this->_request->headers->get('referer');
            } else {
                $route = $this->_router->generate('beon_homepage');
            }

            $event->setResponse(new RedirectResponse($route));
        }
    }
}