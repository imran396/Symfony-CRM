<?php
/**
 * @author: Vince
 * Enums class for log actions.
 */

namespace Beon\IntranetBundle\Enums;

use Symfony\Component\Config\Definition\Exception\Exception;
use Beon\IntranetBundle\Entity\Log;
use Beon\IntranetBundle\Enums\TaskStatusEnum;
use Beon\IntranetBundle\Enums\ComplaintStatusEnum;
use Beon\IntranetBundle\Enums\CampaignStatusEnum;
use Beon\IntranetBundle\Enums\TimetrackingTariffEnum;

class LogActionEnum extends BasicEnum
{
    const SUCCESSFULL_LOGIN = 0;
  	const UNSUCCESSFULL_LOGIN = 1;
    const FACEBOOK_URL = 2;
	  const MONITORED_URL = 3;
	  const NOTIFIED = 4;
	  const INTERNAL_APPROVAL_MAIL_SENT = 5;
	  const EXTERNAL_APPROVAL_MAIL_SENT = 6;
    const APPROVED = 7;
    const DENIED = 8;
  	const APPROVAL_REMINDER_SENT = 9;
  	const CAMPAIGN_SUPPLIER_CONFIRMED = 10;
  	const STATUSCHANGE_TASK = 11;
  	const STATUSCHANGE_COMPLAINT = 17;
  	const STATUSCHANGE_CAMPAIGN = 19;
  	const CREATED = 12;
  	const SUBMITTED = 13;
  	const INVOICE_UPLOAD_REQUESTED = 14;
  	const UPLOAD_REQUESTED = 22;
	  const OVERDUE_REMINDER_SENT = 15;
	  const FILES_SUBMITTED = 16;
    const COMPLAINT_PROPOSAL = 18;
    const CAMPAIGN_SUPPLIER_REJECTED = 20;
    const CAMPAIGN_SUPPLIER_ACKED = 21;
    const MARK_DONE = 23;

    public static function getTitles()
    {
        return [
            self::APPROVED => 'Freigegeben',
            self::DENIED => 'Abgelehnt/Korrekturwunsch',
            self::NOTIFIED => 'Benachrichtigt',
            self::CAMPAIGN_SUPPLIER_CONFIRMED => 'Bestellt',
            self::CAMPAIGN_SUPPLIER_REJECTED => 'Benachrichtigt (abgelehnt)',
            self::CAMPAIGN_SUPPLIER_ACKED => 'Eingang bestätigt',
            self::CREATED => 'Erstellt',
            self::STATUSCHANGE_TASK => 'Status geändert',
            self::STATUSCHANGE_COMPLAINT => 'Status geändert',
            self::STATUSCHANGE_CAMPAIGN => 'Status geändert',
            self::SUBMITTED => 'Versandt',
            self::INTERNAL_APPROVAL_MAIL_SENT => 'Freigabe angefordert (intern)',
            self::EXTERNAL_APPROVAL_MAIL_SENT => 'Freigabe durch Kunden angefordert',
            self::APPROVAL_REMINDER_SENT => 'Freigabe durch Kunden angefordert (automatische Erinnerung)',
            self::INVOICE_UPLOAD_REQUESTED => 'Rechnungs-Upload angefordert',
            self::UPLOAD_REQUESTED => 'Upload angefordert',
            self::OVERDUE_REMINDER_SENT => 'Automatische Erinnerung (überfällig)',
            self::FILES_SUBMITTED => 'Daten übermittelt',
            self::COMPLAINT_PROPOSAL => 'Lösungsvorschlag',
            self::MARK_DONE => 'Gesichtet',
        ];
    }
    
    public static function getActionDescription(Log $entity) {
        $ret = self::getTitle($entity->getAction());
        if ($entity->getAction() == self::STATUSCHANGE_TASK) {
            $ret .= ': ' . TaskStatusEnum::getTitle($entity->getStatus());
        } else if ($entity->getAction() == self::STATUSCHANGE_COMPLAINT) {
            $ret .= ': ' . ComplaintStatusEnum::getTitle($entity->getStatus());
        } else if ($entity->getAction() == self::STATUSCHANGE_CAMPAIGN) {
            $ret .= ': ' . CampaignStatusEnum::getTitle($entity->getStatus());
        }
        return $ret;
    }
}
