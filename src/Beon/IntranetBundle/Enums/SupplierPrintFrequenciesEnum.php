<?php
/**
 * User: LITVAN
 * Date: 3/9/14
 * Time: 2:39 PM
 */

namespace Beon\IntranetBundle\Enums;


use Symfony\Component\Config\Definition\Exception\Exception;

class SupplierPrintFrequenciesEnum extends BasicEnum
{

    const None = 0;
    const Daily = 1;
    const Weekly = 2;
    const Biweekly = 3;
    const Monthly = 4;
    const Yearly = 5;
    const Other = 6;

    public static function getTitles()
    {
        return $titles = [
            self::None => '',
            self::Daily => 'daily',
            self::Weekly => 'weekly',
            self::Biweekly => 'biweekly',
            self::Monthly => 'monthly',
            self::Yearly => 'yearly',
            self::Other => 'other'
        ];
    }

    public static function getFrequencies()
    {
        return $titles = [
            self::Daily => 'daily',
            self::Weekly => 'weekly',
            self::Biweekly => 'biweekly',
            self::Monthly => 'monthly',
            self::Yearly => 'yearly',
            self::Other => 'other'
        ];
    }
}


