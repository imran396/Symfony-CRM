<?php
/**
 * User: LITVAN
 * Date: 5/10/14
 * Time: 5:25 PM
 */

namespace Beon\IntranetBundle\Enums;


use Symfony\Component\Config\Definition\Exception\Exception;

class TaskPaymentTypeEnum extends BasicEnum
{

    const NACHNAHME = 3001;
    const VORKASSE_FRANCHISE = 3002;
    const IN_STORE = 3003;

    public static function getTitles()
    {
        return [
            self::NACHNAHME => 'Nachnahme',
            self::VORKASSE_FRANCHISE => 'Vorkasse Franchise',
            self::IN_STORE => 'Flyeralarmstore',
        ];
    }
}
