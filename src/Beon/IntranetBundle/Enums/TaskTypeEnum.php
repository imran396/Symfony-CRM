<?php
/**
 * User: LITVAN
 * Date: 5/10/14
 * Time: 5:25 PM
 */

namespace Beon\IntranetBundle\Enums;


use Symfony\Component\Config\Definition\Exception\Exception;

class TaskTypeEnum extends BasicEnum
{
    const NORMAL = 0;
    const GRAPHICS = 1;

    public static function getTitles()
    {
        return [
            self::NORMAL => 'normal task',
            self::GRAPHICS => 'graphics task'
        ];
    }
}
