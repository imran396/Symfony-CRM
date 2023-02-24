<?php
/**
 * User: LITVAN
 * Date: 6/9/14
 * Time: 11:33 AM
 */

namespace Beon\IntranetBundle\Enums;


use Beon\IntranetBundle\Entity\EnumValue;
use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\ContainerInterface;

abstract class BasicDbEnum implements EnumInterface
{
    /**
     * @var Container
     */
    protected static $container;

    private static $cache = array();

    /**
     * Sets the Container.
     *
     * @param ContainerInterface|null $container A ContainerInterface instance or null
     *
     * @api
     */
    public static function setContainer(ContainerInterface $container = null)
    {
        if (!self::$container) {
            self::$container = $container;
        }
    }

    public static function getClassName() {
        return get_called_class();
    }

    public static function getSimpleName() {
        return basename(strtr(get_called_class(), '\\', '/'));
    }

    public static function getChoices() {
        if (!isset(self::$cache[self::getClassName()])) {
            /** @var $em EntityManager */
            $em = self::$container->get('doctrine.orm.entity_manager');
            self::$cache[self::getClassName()] = $em->getRepository('IntranetBundle:EnumValue')->getResuableValues(self::getSimpleName());
            self::sortCache();
        }
        return self::$cache[self::getClassName()];
    }

    public static function getTitles()
    {
        $ret = array();
        foreach (self::getChoices() as $choice) {
            $ret[$choice->getId()] = $choice->getValue();
        }
        return $ret;
    }

    public static function loadOneOff($key) {
        if (strpos($key, 'inject') === 0) {
            /** @var $em EntityManager */
            $em = self::$container->get('doctrine.orm.entity_manager');

            list($dummy, $reusable, $valueStr) = explode('|', $key, 3);
            if (!self::$container->get('security.context')->getToken()->getUser()->isGranted('ROLE_ENUM_MAKE_REUSABLE')) {
                $reusable = false;
            }

            // try to find existing value
            $newValue = $em->getRepository('IntranetBundle:EnumValue')->findValue(self::getSimpleName(), $valueStr);

            // if we haven't found one, create it
            if (!$newValue) {
                $newValue = new EnumValue();
                $newValue->setClassName(self::getSimpleName());
                $newValue->setValue($valueStr);
                $newValue->setReusable($reusable);
            }

            // no matter if it's new or not, set reusable flag if necessary
            if ($reusable) {
                $newValue->setReusable($reusable);
            }

            $em->persist($newValue);
            $em->flush();

            // make sure cache is loaded and add new value
            self::getChoices();
            self::$cache[self::getClassName()][] = $newValue;

            return $newValue->getId();
        } else if ($key && !self::isValidKey($key)) {
            /** @var $em EntityManager */
            $em = self::$container->get('doctrine.orm.entity_manager');
            $value = $em->getRepository('IntranetBundle:EnumValue')->find($key);
            if ($value && $value->getClassName() == self::getSimpleName()) {
                self::$cache[self::getClassName()][] = $value;
                self::sortCache();
            }
        }
        return null;
    }

    public static function sortCache() {
        if (is_callable($callable = array(self::getClassName(), 'compareChoices'))) {
            usort(self::$cache[self::getClassName()], $callable);
        }
    }

    public static function getTitle($key)
    {
        self::loadOneOff($key);
        return self::isValidKey($key) ? static::getTitles()[$key] : null;
    }

    public static function getChoice($key)
    {
        self::loadOneOff($key);
        foreach (self::getChoices() as $choice) {
            if ($choice->getId() == $key) {
                return $choice;
            }
        }
        return null;
    }

    public static function isValidKey($key, $strict = false)
    {
        if ($key instanceof EnumValue) {
            $key = $key->getId();
        }
        return array_key_exists($key, self::getTitles());
    }

    public static function isValidValue($value)
    {
        return in_array($value, self::getTitles());
    }

    public static function equals($id, $otherId) {
        if ($id instanceof EnumValue) {
            $id = $id->getId();
        }
        if ($otherId instanceof EnumValue) {
            $otherId = $otherId->getId();
        }
        return $id == $otherId;
    }
}
