<?php

namespace Beon\IntranetBundle\Enums;

interface EnumInterface {
    public static function getTitles();
    public static function isValidKey($key, $strict = false);
    public static function isValidValue($value);
    public static function getTitle($key);
}
