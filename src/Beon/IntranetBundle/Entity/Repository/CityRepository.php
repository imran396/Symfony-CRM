<?php

namespace Beon\IntranetBundle\Entity\Repository;


use Beon\IntranetBundle\Entity\City;
use Doctrine\ORM\EntityRepository;

class CityRepository extends EntityRepository
{
    public function getCityForContactRelation($cities)
    {
        $cityArray = array();

        foreach($cities as $city){
            $cityArray[] =  $city->getId();
        }

        $qb = $this->createQueryBuilder('c');

        if(!empty($cityArray)){
           $qb->where("c.id   NOT IN (:cities)")
            ->setParameter('cities', array_values($cityArray));
        }

        return $qb;
    }
}