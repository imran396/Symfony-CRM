<?php
/**
 * User: LITVAN
 * Date: 4/30/14
 * Time: 9:06 PM
 */

namespace Beon\IntranetBundle\Entity\Repository;

use Beon\IntranetBundle\Entity\Supplier;

class SupplierGroupRepository extends FilteredRepository
{
    public function getSupplierGroupForContactRelation($suppliergroups)
    {
        $supplierGroupArray = array();

        foreach($suppliergroups as $suppliergroup){
            $supplierGroupArray[] =  $suppliergroup->getId();
        }

        $qb = $this
            ->createQueryBuilder('c');

        if(!empty($supplierGroupArray)){
            $qb->where("c.id   NOT IN (:suppliergroups)")
                ->setParameter('suppliergroups', array_values($supplierGroupArray));
        }

        return $qb;
    }
}
