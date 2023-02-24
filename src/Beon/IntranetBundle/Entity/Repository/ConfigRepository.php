<?php

namespace Beon\IntranetBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Beon\IntranetBundle\Entity\Task;
use Beon\IntranetBundle\Entity\ConfigValue;

class ConfigRepository extends EntityRepository
{
    private $cache = array();

    public function loadValues($fromId, $tillId) {
        $result = $this->createQueryBuilder('v')
            ->andWhere('v.id >= :fromId')
            ->setParameter('fromId', $fromId)
            ->andWhere('v.id <= :tillId')
            ->setParameter('tillId', $tillId)
            ->getQuery()
            ->getResult();
        
        foreach ($result as $tmp) {
            $this->cache[$tmp->getId()] = $tmp;
        }
    }

    public function get($id, $cacheOnly = false) {
        if (array_key_exists($id, $this->cache)) {
            return $this->cache[$id];
        } else if (!$cacheOnly) {
            $this->loadValues($id, $id);
            return $this->get($id, true);
        } else {
            return null;
        }
    }

    private function _getAddDays($newDesign, $expedited) {
        if ($newDesign) {
	        return $expedited ? $this->get(ConfigValue::NEWDESIGN_EXPRESS) : $this->get(ConfigValue::NEWDESIGN_NORMAL);
        } else {
	        return $expedited ? $this->get(ConfigValue::OLDDESIGN_EXPRESS) : $this->get(ConfigValue::OLDDESIGN_NORMAL);
        }
    }

    public function getAddDays(Task $entity) {
        return $this->_getAddDays($entity->getNewDesign(), $entity->getExpedited());
    }

    public function getAddDaysWarningMessages(Task $entity = null) {
        $ret = [
            $this->getAddDaysWarningMessage(false, false),
            $this->getAddDaysWarningMessage(false, true),
            $this->getAddDaysWarningMessage(true, false),
            $this->getAddDaysWarningMessage(true, true)
        ];
        if ($entity) {
            $ret[$entity->getNewDesign() * 2 + $entity->getExpedited()] = '';
        }
        return $ret;
    }

    private function getAddDaysWarningMessage($newDesign, $expedited) {
        $cv = $this->_getAddDays($newDesign, $expedited);
        $msg = '';
        
        if ($cv) {
	        if ($cv->getAdditionalDays()) {
		        $msg = $this->get(ConfigValue::DESIGN_DELAY_MESSAGE)->getValue();
		        $msg = str_replace(array('%actual%', '%usual%', '%additional%'), array($cv->getActualDays(), $cv->getUsualDays(), $cv->getAdditionalDays()), $msg);		
	        } 
        }
        
        return $msg;
    }
}
