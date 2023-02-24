<?php

namespace Beon\IntranetBundle\Enums;

use Beon\IntranetBundle\Entity\EnumValue;

class TimetrackingTariffEnum extends BasicDbEnum
{
    const WEITERBERECHNUNG = 8146;
    const DRUCKKOSTEN = 8140;
    
    public static function getCategories() {
        /** @var $em EntityManager */
        $em = self::$container->get('doctrine.orm.entity_manager');
        $all = $em->getRepository('IntranetBundle:EnumValue')->getResuableValues(self::getSimpleName());
        $return = array();
        foreach ($all as $choice) {
            if ($cat = $choice->getValueIdx(2)) {
                $return[$cat][] = $choice->getId();
            }
        }
        return $return;
    }
    
    public static function getColorForCategory($category) {
        if ($category == 'Druckkosten') {
          return '#FF9C42';
        } else if ($category == 'Designkosten') {
          return '#27DE55';
        } else if ($category == 'Marketing') {
          return '#C8C800';
        } else {
          return '#25A0C5';
        }
    }

    public static function getTitles()
    {
        $ret = array();
        foreach (self::getChoices() as $choice) {
            $ret[$choice->getId()] = $choice->getValueIdx(0);
        }
        return $ret;
    }
    
    public static function getPrice($key)
    {
        if ($choice = self::getChoice($key)) {
            return $choice->getValueIdx(1);
        }
        return 1;
    }
    
    public static function calcPrice($hours, $tariff, $totalOnly = false) {
        if ($tariff) {
            if (!($tariff instanceof EnumValue)) {
                $tariff = self::getChoice($tariff);
            }
            $ret = $tariff->getValueIdx(0) . ': ';
        } else {
            $ret = 'Ohne Tarif: ';
        }
        if ($tariff && $price = $tariff->getValueIdx(1)) {
            if ($hours != 1) {
                $ret .= $hours . 'x ' . number_format($price, 2, ',', '.') . ' = ';
            }
            $ret .= $total = number_format($hours * $price, 2, ',', '.') . ' €';
        } else {
            $ret .= $total = floor($hours) . ':' . sprintf('%02d', round(($hours * 60) % 60)) . ' h';
        }
        if ($totalOnly) {
          return $total;
        }
        return $ret;
    }
}
