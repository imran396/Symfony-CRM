<?php

namespace Beon\IntranetBundle\Enums;

final class CampaignIncludedServicesEnum extends BasicDbEnum
{
    const NONE = 200;
    const OTHER = -1;
    const OTHER_LABEL = 'Sonstiges';

    public static function getTitlesExternal()
    {
        $ret = self::getTitles();
        if (!in_array(self::OTHER_LABEL, $ret)) {
            $ret[self::OTHER] = self::OTHER_LABEL;
        }
        return $ret;
    }
}
