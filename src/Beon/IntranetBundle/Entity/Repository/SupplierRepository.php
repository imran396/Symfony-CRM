<?php
/**
 * User: LITVAN
 * Date: 4/30/14
 * Time: 9:06 PM
 */

namespace Beon\IntranetBundle\Entity\Repository;


use Beon\IntranetBundle\Entity\Supplier;
use Doctrine\ORM\EntityRepository;

class SupplierRepository extends FilteredRepository
{
    public function getSupplierForContactRelation($suppliers)
    {
        $supplierArray = array();

        foreach($suppliers as $supplier){
            $supplierArray[] =  $supplier->getId();
        }

        $qb = $this->createQueryBuilder('c');

        if(!empty($supplierArray)){
            $qb->where("c.id   NOT IN (:suppliers)")
            ->setParameter('suppliers', array_values($supplierArray));
        }

        return $qb;
    }
}
