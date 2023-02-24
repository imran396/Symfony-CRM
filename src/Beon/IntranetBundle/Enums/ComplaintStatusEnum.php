<?php
/**
 * User: LITVAN
 * Date: 4/16/14
 * Time: 10:17 PM
 */

namespace Beon\IntranetBundle\Enums;


class ComplaintStatusEnum extends BasicEnum
{
    const NOT_STARTED = 801;
    const IN_PROGRESS = 802;
    const AWAITING_INTERNAL_FEEDBACK = 803;
    const CLOSED = 804;


    public static function getTitles()
    {
        return [
            self::NOT_STARTED => 'Nicht begonnen',
            self::IN_PROGRESS => 'In Bearbeitung',
            self::AWAITING_INTERNAL_FEEDBACK => 'Rückfrage beim Betrieb',
            self::CLOSED => 'Abgeschlossen'
        ];
    }
} 
