<?php
/**
 * User: LITVAN
 * Date: 5/10/14
 * Time: 5:25 PM
 */

namespace Beon\IntranetBundle\Enums;


use Symfony\Component\Config\Definition\Exception\Exception;

class StakeholderPaymentTypeEnum extends BasicEnum
{
    const RECHNUNG = 5001;
    const LASTSCHRIFT = 5002;

    public static function getTitles()
    {
        return [
            self::RECHNUNG => 'Rechnung',
            self::LASTSCHRIFT => 'Lastschrift',
        ];
    }
}
