<?php
/**
 * User: LITVAN
 * Date: 3/23/14
 * Time: 12:07 AM
 */

namespace Beon\IntranetBundle\Enums;


use Symfony\Component\Config\Definition\Exception\Exception;

class RoleEnum extends BasicEnum
{

    const STAKEHOLDER = "ROLE_STAKEHOLDER";
    const STAKEHOLDER_RESTRICTED = "ROLE_STAKEHOLDER_RESTRICTED";
    const PRESS_RELEASE = "ROLE_PRESSRELEASE";
    const ALL = "ROLE_ALL";
    const TASK = "ROLE_TASK";
    const FACEBOOK = "ROLE_FACEBOOK";

    public static function getLevels()
    {
        return array(
            self::ALL, self::PRESS_RELEASE, self::STAKEHOLDER, self::TASK
        );
    }

    public static function getTitles()
    {
        return [
            self::ALL => 'All',
            self::STAKEHOLDER => 'Stakeholder',
            self::STAKEHOLDER_RESTRICTED => 'Stakeholder restricted',
            self::PRESS_RELEASE => 'Press release',
            self::FACEBOOK => 'Facebook',
            self::TASK => 'Task',
        ];
    }
}
