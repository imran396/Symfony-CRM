<?php
/**
 * User: LITVAN
 * Date: 5/10/14
 * Time: 5:34 PM
 */

namespace Beon\IntranetBundle\Enums;

class TaskPrintSpeed extends BasicEnum
{

    const NORMAL = 2001;
    const EXPRESS = 2002;
    const OVERNIGHT = 1003;

    public static function getTitles()
    {
        return [
            self::NORMAL => 'Normal',
            self::EXPRESS => 'Express',
            self::OVERNIGHT => 'Overnight',
        ];
    }
} 
