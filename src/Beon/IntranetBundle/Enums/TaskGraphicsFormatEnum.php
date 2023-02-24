<?php

namespace Beon\IntranetBundle\Enums;

final class TaskGraphicsFormatEnum extends BasicDbEnum
{
    public static function compareChoices($a, $b) {
        $a = $a->getValue();
        $b = $b->getValue();
        $a1 = substr($a, 0, 1);
        $b1 = substr($b, 0, 1);
        if (ctype_alpha($a1) != ctype_alpha($b1)) {
            return ctype_alpha($a1) ? -1 : 1;
        }
        return $a < $b ? -1 : 1;
    }
}
