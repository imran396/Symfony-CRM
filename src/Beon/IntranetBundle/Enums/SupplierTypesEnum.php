<?php
/**
 * User: LITVAN
 * Date: 3/9/14
 * Time: 2:14 PM
 */

namespace Beon\IntranetBundle\Enums;

use Beon\IntranetBundle\Entity\EnumValue;
use Symfony\Component\Config\Definition\Exception\Exception;

final class SupplierTypesEnum extends BasicDbEnum
{
    const OnlineType = 100;
    const RadioType = 101;
    const PrintType = 102;
    const TvType = 103;
    const OtherType = 104;
    const Reserve = -1;

    public static function getAudienceTitles()
    {
        return [
            self::OnlineType => 'Besucher pro Monat',
            self::RadioType => 'Hörer',
            self::PrintType => 'Leser',
            self::TvType => 'Zuschauer',
            self::OtherType => 'Publikumsgröße'
        ];
    }

    public static function getConsistentColors()
    {
         return [
            self::OnlineType => '#8CACC6',
            self::RadioType => '#AFD8F8',
            self::PrintType => '#CB4B4B',
            self::TvType => '#4DA74D',
            self::OtherType => '#9440ED',
            self::Reserve => '#EDC240'
        ];
    }

    public static function getAudienceTitle($number)
    {
        if ($number instanceof EnumValue) {
            $number = $number->getId();
        }
        $titles = self::getAudienceTitles();
        if (!isset($titles[$number])) {
            $number = self::OtherType;
        }
        return $titles[$number];
    }
}
