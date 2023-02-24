<?php
/**
 * User: LITVAN
 * Date: 5/17/14
 * Time: 12:17 AM
 */

namespace Beon\IntranetBundle\Enums;


use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\Translation\TranslatorInterface;

class CustomerLevelEnum extends BasicEnum
{
    private static $translator;
    const AFFILIATION_TYPE_GROUP = 0;
    const AFFILIATION_TYPE = 1;
    const CUSTOMER = 2;
    const PROJECT = 3;
    const COOPERATION = 4;

   public static function init(TranslatorInterface $translator)
   {
      self::$translator = $translator;
   }

    public static function getTitles()
    {
        return [
            self::AFFILIATION_TYPE_GROUP => 'Affiliation type group',
            self::AFFILIATION_TYPE => 'Affiliation type',
            self::CUSTOMER => 'Customer',
            self::PROJECT => 'Project',
            self::COOPERATION => 'Cooperation',
        ];
    }

    public static function getTranslatedTitle($key)
    {
        return self::$translator->trans(self::getTitle($key));
    }
} 
