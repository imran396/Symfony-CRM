<?php
/**
 * User: LITVAN
 * Date: 4/16/14
 * Time: 10:17 PM
 */

namespace Beon\IntranetBundle\Enums;


class TaskStatusEnum extends BasicEnum
{
    const NOT_STARTED = 701;
    const IN_PROGRESS = 702;
    const PRINTING = 705;
    const THIRD_PARTY_WAIT = 706;
    const DONE = 703;
    const ABORTED = 704;

    public static function getTitles()
    {
        return [
            self::NOT_STARTED => 'Nicht begonnen',
            self::IN_PROGRESS => 'In Arbeit',
            self::PRINTING => 'Im Druck',
            self::THIRD_PARTY_WAIT => 'Warte auf Dritte',
            self::DONE => 'Abgeschlossen',
            self::ABORTED => 'Abgebrochen',
        ];
    }

    public static function getApprovalStates()
    {
        return [
            self::NOT_STARTED, self::IN_PROGRESS
        ];
    }
} 
