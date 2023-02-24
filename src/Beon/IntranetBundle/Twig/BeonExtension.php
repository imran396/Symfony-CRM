<?php
/**
 * User: LITVAN
 * Date: 3/9/14
 * Time: 3:31 PM
 */

namespace Beon\IntranetBundle\Twig;

use Beon\IntranetBundle\IntranetBundle;
use Beon\IntranetBundle\Enums\ComplaintResolutionEnum;
use Beon\IntranetBundle\Enums\CustomerLevelEnum;
use Beon\IntranetBundle\Enums\TaskPaymentTypeEnum;
use Beon\IntranetBundle\Enums\StakeholderPaymentTypeEnum;
use Beon\IntranetBundle\Enums\SupplierPrintFrequenciesEnum;
use Beon\IntranetBundle\Enums\SupplierTypesEnum;
use Beon\IntranetBundle\Enums\TaskGraphicsTypeEnum;
use Beon\IntranetBundle\Enums\TaskPaperTypeEnum;
use Beon\IntranetBundle\Enums\TaskPrintSpeed;
use Beon\IntranetBundle\Enums\TaskStatusEnum;
use Beon\IntranetBundle\Enums\TaskTypeEnum;
use Beon\IntranetBundle\Enums\CampaignIncludedServicesEnum;
use Beon\IntranetBundle\Enums\TimetrackingTariffEnum;
use Beon\IntranetBundle\Lib\CheckAccess;
use Beon\IntranetBundle\Enums\ComplaintStatusEnum;
use Beon\IntranetBundle\Enums\CampaignStatusEnum;
use Symfony\Component\HttpFoundation\Request;
use Beon\IntranetBundle\Enums\LogActionEnum;


class BeonExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('supplierFrequency', [$this, 'supplierFrequencyFilter']),
            new \Twig_SimpleFilter('taskStatus', [$this, 'taskStatusFilter']),
            new \Twig_SimpleFilter('bool', [$this, 'boolFilter']),
            new \Twig_SimpleFilter('audienceLabel', [$this, 'audienceLabelFilter']),
            new \Twig_SimpleFilter('taskType', [$this, 'taskTypeFilter']),
            new \Twig_SimpleFilter('customerLevel', [$this, 'customerLevelFilter']),
            new \Twig_SimpleFilter('ComplaintStatus', [$this, 'ComplaintStatusFilter']),
            new \Twig_SimpleFilter('CampaignStatus', [$this, 'CampaignStatusFilter']),
            new \Twig_SimpleFilter('ComplaintResolution', [$this, 'ComplaintResolutionFilter']),
            new \Twig_SimpleFilter('printSpeedType', [$this, 'printSpeedTypeFilter']),
            new \Twig_SimpleFilter('taskPaymentType', [$this, 'taskPaymentTypeFilter']),
            new \Twig_SimpleFilter('stakeholderPaymentType', [$this, 'stakeholderPaymentTypeFilter']),
            new \Twig_SimpleFilter('includedServices', [$this, 'includedServicesFilter']),
            new \Twig_SimpleFilter('ttTariff', [$this, 'ttTariffFilter']),
            new \Twig_SimpleFilter('ttPrice', [$this, 'ttCalcPriceFilter']),
            new \Twig_SimpleFilter('ttTotal', [$this, 'ttCalcTotalFilter']),
            new \Twig_SimpleFilter('ttRate', [$this, 'ttRateFilter']),
            new \Twig_SimpleFilter('ttCategory', [$this, 'ttCategoryFilter']),
            new \Twig_SimpleFilter('ttCategoryColor', [$this, 'ttCategoryColorFilter']),
            new \Twig_SimpleFilter('stripParatheses', [$this, 'stripParathesesFilter']),
            new \Twig_SimpleFilter('stripParatheses', [$this, 'stripParathesesFilter']),
            new \Twig_SimpleFilter('logAction', [$this, 'logActionFilter']),
            new \Twig_SimpleFilter('excelCompat', [$this, 'excelCompatFilter']),
            new \Twig_SimpleFilter('formatBytes', [$this, 'formatBytes']),
        ];
    }

    public function getGlobals()
    {
        $token = IntranetBundle::$containerExternal->get('security.context')->getToken();
        $customer = $token ? $token->getUser()->getCustomer() : null;

        return [
            'CUSTOMER_LEVELS' => CustomerLevelEnum::getTitles(),
            'supplierAudienceTitlesEnum' => SupplierTypesEnum::getAudienceTitles(),
            'TaskTypeEnum' => 'Beon\\IntranetBundle\\Enums\\TaskTypeEnum::',
            'SupplierTypesEnum' => 'Beon\\IntranetBundle\\Enums\\SupplierTypesEnum::',
            'TaskStatusEnum' => 'Beon\\IntranetBundle\\Enums\\TaskStatusEnum::',
            'CampaignIncludedServicesEnum' => 'Beon\\IntranetBundle\\Enums\\CampaignIncludedServicesEnum::',
            'TaskPaymentTypeEnum' => 'Beon\\IntranetBundle\\Enums\\TaskPaymentTypeEnum::',
            'TaskGraphicsTypeEnum' => 'Beon\\IntranetBundle\\Enums\\TaskGraphicsTypeEnum::',
            'TaskPaperTypeEnum' => 'Beon\\IntranetBundle\\Enums\\TaskPaperTypeEnum::',
            'ComplaintStatusEnum' => 'Beon\\IntranetBundle\\Enums\\ComplaintStatusEnum::',
            'CampaignStatusEnum' => 'Beon\\IntranetBundle\\Enums\\CampaignStatusEnum::',
            'defaultDateFormat' => 'd.m.Y',
            'defaultDateTimeFormat' => 'd.m.Y H:i:s',
            'defaultDateTimeFormatShort' => 'd.m.Y H:i',
            'disallowedFileTypes' => IntranetBundle::$containerExternal->getParameter('disalowedFileTypes'),
            'customerId' => $customer ? $customer->getId() : null,
        ];
    }

    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('getEnchiladasFranchiseAddress', [$this, 'getEnchiladasFranchiseAddress']),
            new \Twig_SimpleFunction('getCustomerAddress', [$this, 'getCustomerAddress']),
            new \Twig_SimpleFunction('getConfigValue', [$this, 'getConfigValue']),
        ];
    }

    public function getTests()
    {
        return [
            new \Twig_SimpleTest('supplierPrint', array($this, 'supplierPrint')),
            new \Twig_SimpleTest('supplierRadioOrTv', array($this, 'supplierRadioOrTv')),
            new \Twig_SimpleTest('project', function ($obj) { return get_class($obj) == 'Beon\IntranetBundle\Entity\Customer'; }),
            new \Twig_SimpleTest('note', function ($obj) { return get_class($obj) == 'Beon\IntranetBundle\Entity\Note'; }),
        ];
    }

    public function supplierAudienceTitlesEnum()
    {
        return SupplierTypesEnum::getTitles();
    }

    public function getEnchiladasFranchiseAddress() {
        $customer = IntranetBundle::$containerExternal->get('doctrine')->getRepository('IntranetBundle:Customer')->find(96);
        return $customer->getAddressLines();
    }

    public function getCustomerAddress() {
        $customer = IntranetBundle::$containerExternal->get('security.context')->getToken()->getUser()->getCustomer();
        if ($customer) {
            return $customer->getAddressLines();
        } else {
            return null;
        }
    }

    public function getName()
    {
        return 'beon_extension';
    }

    /**
     * Tests
     */

    public function supplierPrint($value)
    {
        return SupplierTypesEnum::equals($value, SupplierTypesEnum::PrintType);
    }

    public function supplierRadioOrTv($value)
    {
        return SupplierTypesEnum::equals($value, SupplierTypesEnum::RadioType) || SupplierTypesEnum::equals($value, SupplierTypesEnum::TvType);
    }


    /**
     * Filters
     */

    public function customerLevelFilter($number)
    {
        return CustomerLevelEnum::getTitle($number);
    }

    public function logActionFilter($entity)
    {
        return LogActionEnum::getActionDescription($entity);
    }

    public function includedServicesFilter($number)
    {
        return CampaignIncludedServicesEnum::getTitle($number);
    }

    public function taskTypeFilter($number)
    {
        return TaskTypeEnum::getTitle($number);
    }

    public function audienceLabelFilter($number)
    {
        return SupplierTypesEnum::getAudienceTitle($number);
    }

    public function boolFilter($number)
    {
        return $number ? 'Yes' : 'No';
    }

    public function supplierFrequencyFilter($number)
    {
        return SupplierPrintFrequenciesEnum::getTitle($number);
    }

    public function ttTariffFilter($tariff)
    {
        if ($tariff && !is_object($tariff)) {
            $tariff = TimetrackingTariffEnum::getChoice($tariff);
        }
        
        return $tariff ? $tariff->getValueIdx(0) : '';
    }

    public function ttRateFilter($tariff)
    {
        return $tariff ? $tariff->getValueIdx(1) : '';
    }
    
    public function ttCategoryFilter($tariff)
    {
        if ($tariff && !is_object($tariff)) {
            $tariff = TimetrackingTariffEnum::getChoice($tariff);
        }
        
        return $tariff ? $tariff->getValueIdx(2) : '';
    }
    
    public function ttCategoryColorFilter($tariff)
    {      
        return TimetrackingTariffEnum::getColorForCategory($this->ttCategoryFilter($tariff));
    }

    public function ttCalcPriceFilter($number, $tariff)
    {
        return TimetrackingTariffEnum::calcPrice($number, $tariff);
    }
    
    public function ttCalcTotalFilter($number, $tariff)
    {
        return TimetrackingTariffEnum::calcPrice($number, $tariff, true);
    }

    public function taskStatusFilter($number)
    {
        return TaskStatusEnum::getTitle($number);
    }

    public function ComplaintStatusFilter($number)
    {
        return ComplaintStatusEnum::getTitle($number);
    }
    public function CampaignStatusFilter($number)
    {
        return CampaignStatusEnum::getTitle($number);
    }
    public function ComplaintResolutionFilter($number)
    {
        return ComplaintResolutionEnum::getTitle($number);
    }
    public function printSpeedTypeFilter($number)
    {
        return TaskPrintSpeed::getTitle($number);
    }
    public function taskPaymentTypeFilter($number)
    {
        return TaskPaymentTypeEnum::getTitle($number);
    }
    public function stakeholderPaymentTypeFilter($number)
    {
        return StakeholderPaymentTypeEnum::getTitle($number);
    }
    public function stripParathesesFilter($input) {
        return preg_replace('/\\s*\\(.*\\)/', '', $input);
    }
    public function getConfigValue($key) {
        return IntranetBundle::$containerExternal->get('doctrine')->getRepository('IntranetBundle:ConfigValue')->get($key);
    }
    public function excelCompatFilter($str) {
        $str = str_replace(["\n","\r"], '', $str);
        $str = str_replace('"', '""', $str);
        return mb_convert_encoding($str, 'ISO-8859-1', 'UTF-8');
    }
    public function formatBytes($bytes, $precision = 2) { 
        $units = array('B', 'KB', 'MB', 'GB', 'TB'); 

        $bytes = max($bytes, 0); 
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024)); 
        $pow = min($pow, count($units) - 1);
        $bytes /= pow(1024, $pow);

        return round($bytes, $precision) . ' ' . $units[$pow]; 
    } 
}
