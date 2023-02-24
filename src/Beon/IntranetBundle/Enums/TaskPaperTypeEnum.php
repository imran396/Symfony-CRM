<?php
/**
 * User: LITVAN
 * Date: 5/10/14
 * Time: 5:34 PM
 */

namespace Beon\IntranetBundle\Enums;

final class TaskPaperTypeEnum extends BasicDbEnum
{
    const NONE = 2000;
    const STANDARD = 2001;

    public static function compareChoices($a, $b) {
        if ($a->getId() <= self::STANDARD && $b->getId() <= self::STANDARD) {
            $a = $a->getId();
            $b = $b->getId();
        } else {
            $a = $a->getValue();
            $b = $b->getValue();
        }
        return $a < $b ? -1 : 1;
    }

} 
