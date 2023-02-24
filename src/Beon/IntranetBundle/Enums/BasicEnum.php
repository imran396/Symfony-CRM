<?php
/**
 * User: LITVAN
 * Date: 3/9/14
 * Time: 2:12 PM
 */

namespace Beon\IntranetBundle\Enums;

use Symfony\Component\Config\Definition\Exception\Exception;

abstract class BasicEnum implements EnumInterface
{
    public static function isValidKey($key, $strict = false)
    {
        $keys = array_keys(static::getTitles());

        if ($strict) {
            return in_array($key, $keys);
        }

        $keys = array_map('strtolower', $keys);
        return in_array(strtolower($key), $keys);
    }

    public static function isValidValue($value)
    {
        $isValidValue = in_array($value, static::getTitles(), $strict = true);

        if (!$isValidValue) {
            return null; //throw new Exception('Enum value is not valid for: ' . get_called_class());
        }

        return $isValidValue;
    }

    public static function getTitle($key)
    {
        return self::isValidKey($key) ? static::getTitles()[$key] : null;
    }
}
