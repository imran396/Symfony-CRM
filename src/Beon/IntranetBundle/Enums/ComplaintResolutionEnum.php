<?php
/**
 * User: LITVAN
 * Date: 4/16/14
 * Time: 10:17 PM
 */

namespace Beon\IntranetBundle\Enums;


class ComplaintResolutionEnum extends BasicEnum
{
    const APOLOGY = 1001;
    const APOLOGY_WITH_COM = 1002;
    const NO_ANSWER = 1003;
    const OTHER = 1004;


    public static function getTitles()
    {
        return [
            self::APOLOGY => 'Apology',
            self::APOLOGY_WITH_COM => 'Apology with comp',
            self::NO_ANSWER => 'No answer',
            self::OTHER => 'Other'
        ];
    }
} 
