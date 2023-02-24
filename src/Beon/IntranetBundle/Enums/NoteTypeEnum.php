<?php
/**
 * User: LITVAN
 * Date: 3/9/14
 * Time: 2:14 PM
 */

namespace Beon\IntranetBundle\Enums;

use Beon\IntranetBundle\Entity\EnumValue;

final class NoteTypeEnum extends BasicDbEnum
{
    const GRAPHICS = 400;
    const PUBLICATION = 401;
    const AGENDA = 402;
    const FIXED_DATE = 8261;
    const FIXED_DATE_YEARLY = 8286;
    const FIXED_DATE_YEARLY_NON_AUTO = 8288;

    public static function getSpecialTypes() {
        return array(self::AGENDA, self::FIXED_DATE, self::FIXED_DATE_YEARLY, self::FIXED_DATE_YEARLY_NON_AUTO);
    }

    public static function getFixedDateTypes() {
        return array(self::FIXED_DATE, self::FIXED_DATE_YEARLY, self::FIXED_DATE_YEARLY_NON_AUTO);
    }
}
