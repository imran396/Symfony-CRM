<?php
/**
 * User: LITVAN
 * Date: 5/2/14
 * Time: 4:54 PM
 */

namespace Beon\IntranetBundle\Entity\Repository;


use Doctrine\ORM\EntityRepository;

class UploadRepository extends EntityRepository
{
    public function findAll()
    {

        return $qb = $this->createQueryBuilder('u')->orderBy('createdat', 'DESC')->getQuery()->getResult();
    }

    public function isdeletable($entity, $isRelated)
    {

        switch ($isRelated) {

            case 'campaign':

                $checkDuplicateFileName = $this->findBy(array('fsFilename' => $entity->getFsFileName()));

                if(sizeof($checkDuplicateFileName)>1){
                    return false;
                }else{
                    return true;
                }

                break;
        }


    }
    public function setSubmittedFlag( $uploadIds = null )
    {
        if( !is_array( $uploadIds ) && empty( $uploadIds ) )
            return false;

        $result = $this->createQueryBuilder('u')
            ->update( 'Beon\IntranetBundle\Entity\Upload', 'u' )
            ->set( 'u.submitFlag', ':flag' )
            ->where( 'u.id IN (:ids)' )
            ->setParameter( 'ids', $uploadIds )
            ->setParameter( 'flag', true )
            ->getQuery()
            ->execute();

        if( $result )
            return true;
        else
            return false;
    }

}