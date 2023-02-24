<?php
/**
 * User: LITVAN
 * Date: 4/12/14
 * Time: 3:48 PM
 */

namespace Beon\IntranetBundle\Lib;


abstract class GUID
{

    public static function get()
    {
        if (function_exists('com_create_guid') === true) {
            return trim(com_create_guid(), '{}');
        }
        $result = sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));

        return strtolower($result);
    }

} 