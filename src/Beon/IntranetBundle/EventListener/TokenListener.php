<?php
/**
 * User: LITVAN
 * Date: 6/16/14
 * Time: 10:59 PM
 */

namespace Beon\IntranetBundle\EventListener;


use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;

class TokenListener
{
    private $tokens;

    public function __construct()
    {
//        $this->tokens = $tokens;
    }

    public function onKernelController(FilterControllerEvent $event)
    {
        $controller = $event->getController();

        /*
         * $controller passed can be either a class or a Closure. This is not usual in Symfony2 but it may happen.
         * If it is a class, it comes in array format
         */
        if (!is_array($controller)) {
            return;
        }

//        var_dump($controller);
//        die();
    }
}