<?php

namespace Beon\IntranetBundle;

use Beon\IntranetBundle\Enums\BasicDbEnum;
use Beon\IntranetBundle\Entity\EnumValue;
use Beon\IntranetBundle\Enums\SupplierTypesEnum;
use Beon\IntranetBundle\Helper\ContainerProxy;
use Beon\IntranetBundle\Lib\CheckAccess;
use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Beon\IntranetBundle\Enums\CustomerLevelEnum;
use Symfony\Component\Form\AbstractType;

class IntranetBundle extends Bundle
{
    /**
     * @var ContainerInterface
     */
    public static $containerExternal;

    public function boot()
    {
        parent::boot();
        CustomerLevelEnum::init($this->container->get('translator'));
    }

    public function setContainer(ContainerInterface $container = null)
    {
        parent::setContainer($container);

        /** @var $em EntityManager */
        $em = $this->container->get('doctrine.orm.entity_manager');

        ContainerProxy::getInstance()->container = $this->container;
        CheckAccess::boot($container->get('security.context'), $this->container);

        BasicDbEnum::setContainer($container);
        self::$containerExternal = $container;
    }

    public static function makeDate235959(\DateTime $input = null) {
        return $input ? new \DateTime($input->format('Y-m-d 23:59:59')) : null;
    }

    public static function injectDbEnum($formName, $enumType, $formKey, $enumValue) {
        $request = self::$containerExternal->get('request');
        $formData = $request->get($formName);
    
        if ($formData && array_key_exists($formKey, $formData)) {
            $enumValue = $formData[$formKey];
        } else if ($enumValue) {
            if ($enumValue instanceof EnumValue) {
                $enumValue = $enumValue->getId();
            }
        }

        if ($enumValue) {
            $replaceValue = call_user_func([$enumType, 'loadOneOff'], $enumValue);
            if ($formData && $replaceValue) {
                $formData[$formKey] = $replaceValue;
                $request->request->set($formName, $formData);
            }
        }
    }
}
