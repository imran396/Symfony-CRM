<?php
/**
 * User: LITVAN
 * Date: 4/16/14
 * Time: 10:17 PM
 */

namespace Beon\IntranetBundle\Enums;


class CampaignStatusEnum extends BasicEnum
{
	const APPROVED = 349;
	const CONFIRMED = 350;
	const FILES_SUBMITTED = 351;
	const INVOICE_RECEIVED = 352;
	const INVOICE_PROCESSED = 353;

    public static function getTitles()
    {
        return [
            self::APPROVED => 'Freigegeben',
            self::CONFIRMED => 'Bestellt',
            self::FILES_SUBMITTED => 'Daten übermittelt',
            self::INVOICE_RECEIVED => 'Rechnung eingegangen',
            self::INVOICE_PROCESSED => 'Weiterberechnet',
        ];
    }
} 
