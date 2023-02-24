<?php
/**
 * User: LITVAN
 * Date: 3/4/14
 * Time: 11:27 PM
 */

namespace Beon\IntranetBundle\Helper;


use Symfony\Component\DependencyInjection\Container;

final class ContainerProxy
{
    /**
     * @var Container
     */
    public $container;


    private function __construct()
    {

    }

    public static function getInstance()
    {
        static $inst = null;
        if ($inst === null) {
            $inst = new ContainerProxy();
        }
        return $inst;
    }


}