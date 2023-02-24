<?php

namespace Beon\IntranetBundle\Enums;

final class TaskGraphicsCirculationEnum extends BasicDbEnum
{
    public static function compareChoices($a, $b) {
        $a = $a->getValue();
        $b = $b->getValue();
        /*if (ctype_digit($a) != ctype_digit($b)) {
            return ctype_digit($a) ? 1 : -1;
        }*/
        return $a < $b ? -1 : 1;
    }
}
