<?php

namespace Beon\IntranetBundle\Enums;

class TimetrackingTariffEnumOld extends BasicEnum
{
    const NEWDESIGN_NORMAL = 400;
    const NEWDESIGN_EXPRESS = 401;
    const OLDDESIGN_NORMAL = 402;
    const OLDDESIGN_EXPRESS = 403;
    const DOWNSCALE_NORMAL = 404;
    const DOWNSCALE_EXPRESS = 405;
    const UPSCALE_NORMAL = 406;
    const UPSCALE_EXPRESS = 407;
    const ORDER_EMAIL = 408;
    const ORDER_PHONE = 409;
    const EURO15 = 410;
    const EURO1_PRINT = 411;
    const EURO1_MARKETING = 412;
    const EURO1_OTHER = 413;
    
    public static function getTitles()
    {
        return [
            self::NEWDESIGN_NORMAL => 'Neues Layout (Stundensatz)',
            self::NEWDESIGN_EXPRESS => 'Neues Layout (Stundensatz) Express',
            self::OLDDESIGN_NORMAL => 'Individualisierung pauschal (Text/Adresse)',
            self::OLDDESIGN_EXPRESS => 'Individualisierung pauschal (Text/Adresse) Express',
            self::DOWNSCALE_NORMAL => 'Formatadaption pauschal (von groß zu klein)',
            self::DOWNSCALE_EXPRESS => 'Formatadaption pauschal (von groß zu klein) Express',
            self::UPSCALE_NORMAL => 'Formatadaption pauschal (von klein zu groß)',
            self::UPSCALE_EXPRESS => 'Formatadaption pauschal (von klein zu groß) Express',
	        self::ORDER_EMAIL => 'Bestellung per Email',
	        self::ORDER_PHONE => 'Telefonische Bestellung',
	        self::EURO15 => 'Simone Ulmer',
	        self::EURO1_PRINT => 'Druckkosten',
	        self::EURO1_MARKETING => 'Marketingkosten',
	        self::EURO1_OTHER => 'Sonstiges',
        ];
    }

    public static function getPrice($key)
    {
        if ($key == self::NEWDESIGN_NORMAL) {
            return 45;
        } else if ($key == self::NEWDESIGN_EXPRESS) {
            return 60;
        } else if ($key == self::OLDDESIGN_NORMAL) {
            return 25;
        } else if ($key == self::OLDDESIGN_EXPRESS) {
            return 40;
        } else if ($key == self::DOWNSCALE_NORMAL) {
            return 15;
        } else if ($key == self::DOWNSCALE_EXPRESS) {
            return 25;
        } else if ($key == self::UPSCALE_NORMAL) {
            return 25;
        } else if ($key == self::UPSCALE_EXPRESS) {
            return 40;
        } else if ($key == self::ORDER_EMAIL) {
            return 10;
        } else if ($key == self::ORDER_PHONE) {
            return 25;
        } else if ($key == self::EURO1_PRINT || $key == self::EURO1_MARKETING || $key == self::EURO1_OTHER) {
            return 1;
        } else if ($key == self::EURO15) {
            return 15;
        } else {
            return false;
        }
    }

    public static function calcPrice($hours, $tariff) {
        if ($tariff) {
            $ret = self::getTitle($tariff) . ': ';
        } else {
            $ret = 'Ohne Preis: ';
        }
        if ($price = self::getPrice($tariff)) {
            if ($hours != 1) {
                $ret .= $hours . 'x ' . number_format($price, 2, ',', '.') . ' = ';
            }
            $ret .= number_format($hours * $price, 2, ',', '.') . ' €';
        } else {
            $ret .= floor($hours) . ':' . sprintf('%02d', round(($hours * 60) % 60)) . ' h';
        }
        return $ret;
    }
}
