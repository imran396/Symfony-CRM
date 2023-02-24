<?php

namespace Beon\IntranetBundle\Enums;

class UserGroupEnum extends BasicEnum
{
    const EMPLOYEES = 40;
    const GRAPHICS = 41;
    const CUSTOMERS = 42;

    public static function getTitles()
    {
        return [
            self::EMPLOYEES => 'Mitarbeiter',
            self::GRAPHICS => 'Grafik-Abteilung',
            self::CUSTOMERS => 'Kunden',
        ];
    }

    public static function getTitlesRestricted($customer)
    {
        $ret = self::getTitles();
        foreach ($ret as $key => $val) {
            if ($customer != ($key == self::CUSTOMERS)) {
                unset($ret[$key]);
            }
        }
        return $ret;
    }
}
