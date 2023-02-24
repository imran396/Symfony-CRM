<?php
/**
 * User: LITVAN
 * Date: 5/28/14
 * Time: 9:42 PM
 */

namespace Beon\IntranetBundle\Entity\Repository;


use Beon\IntranetBundle\Entity\User;
use Doctrine\ORM\EntityRepository;
use Beon\IntranetBundle\Enums\ReportQuestionEnum;

class SurveyResultRepository extends EntityRepository
{

    const ITEMS_ON_PAGE = 10;

    private function qbWithUser($user)
    {
        /** @var $user User */

        $qb = $this->createQueryBuilder('s');

        if ($user && $user instanceof User && $user->getCustomer()) {
            $qb = $qb->where('s.customer = :customer')
                ->setParameter(':customer', $user->getCustomer()->getId());
        }

        return $qb;
    }

    public function findAllWithUser($user = null, $page = 0, $itemsOnPage = self::ITEMS_ON_PAGE)
    {
        /** @var $user User */

        $qb = $user ? $qb = $this->qbWithUser($user) : $this->createQueryBuilder('s');

        return $qb
            ->setFirstResult($page * $itemsOnPage)
            ->setMaxResults($itemsOnPage)
            ->getQuery()
            ->getResult();

    }

    public function getPagesCount($user = null, $itemsOnPage = self::ITEMS_ON_PAGE)
    {

        $qb = null;

        if ($user) {
            $qb = $this->qbWithUser($user);
        } else {
            $qb = $this->createQueryBuilder('s');
        }

        $itemsCount = $qb
            ->select('count(s.id)')
            ->getQuery()
            ->getSingleScalarResult();
        return ceil($itemsCount / $itemsOnPage);
    }
	/**
	 *	@author: Vince
	 *	Main handler function to handle different type of reports
	 */
    public function getSurveyReportFor( $input )
	{
		//Not set customer, return false
		if( empty( $input['customer'] ) )
			return FALSE;

        $data           = array();
        $input['group'] = 'customer';
        $input['data'] = $this->getReport( $input['customer'], $input );
        $input['data']['customerName'] = $input['customer']->getName();
                
        $parent = $input['customer']->getParent();
        if( is_object( $parent ) )
        {
           $input['group'] = 'parent';
           $input['data'] = $this->getReport( $parent, $input );
           $input['data']['parentName'] = $parent->getName();
        }
        
        $parent = null;
        $parent = $input['customer']->getParent()->getParent();
        if( is_object( $parent ) )
        {
            $input['group'] = 'grandParent';
            $input['data'] = $this->getReport( $parent, $input );
            $input['data']['grandParentName'] = $parent->getName();
        }

        return $input['data'];
						
	}

    /**
	 *	@author: Vince
	 *	Main handler function to handle different type of reports
	 */
    protected function getReport( $customer, $input )
    {
        // get customer repository
        $customerRepo = $this->getEntityManager()
                        ->getRepository( 'IntranetBundle:Customer' );

        $children = array();

        // if customer it self is level to then store it to children to get
        // Its own report
        if( $customer->getLevel() == 2 )
        {
            $children[] = $customer->getId();
        }
        else
        {
            //Customer is not level 2 and is level 1 or level 0 parent.
            //Use the prebuilt findChildren function of customer repo to find
            //all the level 2 children of the parent.
            $records = $customerRepo->findChildren( 2, $customer );

            foreach( $records as $child )
            {
                $children[] = $child->getId();
            }
        }

        //build query to get the survey result records
        $qb = $this->createQueryBuilder( 's' )
                    ->where( 's.customer in (:cid)' )
                    ->setParameter( ':cid', $children );

        if (isset($input['from'])) {
            $qb->andWhere('s.date >= :fromDate');
            $qb->setParameter(':fromDate', $input['from']);
        }

        if (isset($input['to'])) {
            $qb->andWhere('s.date <= :toDate');
            $qb->setParameter(':toDate', $input['to']);
        }

       $results = $qb->getQuery()->getResult();

       //return the structrized data
       return $this->structData( $results, $input );
    }

    /**
     * @author Vince
     * @params object object of survey result records
     * This function gets survey records and compute the report and structurize
     * the data
     */
    protected function structData( $result, $input )
    {
        if( isset( $input['data'] ) && !empty( $input['data'] ) )
        {
            $data = $input['data'];
        } else 
        {
            $data = array();
        }

        $group = $input['group'];

        //echo '<pre>';
        //print_r($data);
        
        foreach( $result as $record )
        {
            //Get all nominal fields and iterate over them all and calculate 
            //count
            $questions = ReportQuestionEnum::getAllQuestions( );

            foreach( $questions as $question )
            {
                $method = 'get' . $question;
                $label = ReportQuestionEnum::getChoiceLabel( $question,
                        $record->$method() );

                if( 1 == $label['type'] )
                {
                    if( empty( $label['choice'] ) )
                        $label['choice'] = 'ka';
                    
                    if( isset( $data[$question][$group] )
                        && array_key_exists( $label['choice'], 
                        $data[$question][$group] ) )
                    {
                        $data[$question][$group][$label['choice']]['count']++;
                    }
                    else
                    {
                        $data[$question]['question'] = 
                            ReportQuestionEnum::getTitle( $question );
                        $data[$question]['type'] = $label['type'];
                        
                        $data[$question][$group][$label['choice']]['count'] = 1;
                     }
                }
                elseif( 0 === $label['type'] )
                {
                    if( empty( $label['choice'] ) )
                    {
                        isset( $data[$question][$group]['ka'] ) ?
                        $data[$question][$group]['ka']['count']++
                        : $data[$question][$group]['ka']['count'] = 1;
                    }

                    if( isset( $data[$question][$group]['sum'] ) )
                    {
                         $data[$question][$group]['sum'] += 
                            $record->$method();
                    }
                    else
                    {
                        $data[$question]['question'] = 
                            ReportQuestionEnum::getTitle( $question );
                        $data[$question]['type'] = $label['type'];

                        $data[$question][$group]['sum'] = 
                            $record->$method();
                    }
                }
                
            }
            
            //Check if time values are set and calculate the difference in time
            $timeIn     = $record->getTimeIn();
            $timeOut    = $record->getTimeOut();
            if( !empty( $timeIn ) && !empty( $timeOut ) )
            {
                $data['lengthOfStay']['question'] = 'length of stay';
                
                $ihm = explode( ":", $timeIn );
                if( count( $ihm ) < 2 )
                    $ihm = explode( ".", $timeIn );

                if( $ihm[0] == 0 )
                    $ihm[0] = 24;
                
                $ohm = explode( ":", $timeOut );
                if( count( $ohm ) < 2 )
                    $ohm = explode( ".", $timeOut );

                if( $ohm[0] == 0 )
                    $ohm[0] = 24;
                else if( $ihm[0] > $ohm[0] )
                    $ohm[0] = $ohm[0] + 24; //probably person left next day

                $iMinutes = $ihm[0] * 60 + $ihm[1];
                $oMinutes = $ohm[0] * 60 + $ohm[1];

                if( !isset( $data['lengthOfStay'][$group]['timeIn'] ) )
                {
                    $data['lengthOfStay'][$group]['timeIn']     = 0;
                    $data['lengthOfStay'][$group]['timeOut']    = 0;
                    $data['lengthOfStay'][$group]['count']      = 0;
                }
                
                $data['lengthOfStay'][$group]['timeIn']     += $iMinutes;
                $data['lengthOfStay'][$group]['timeOut']    += $oMinutes;
                $data['lengthOfStay'][$group]['count']++;

            }
        }

        //if time values were set in the above loop then calculate the average
        //time of stay.
        if( isset( $data['lengthOfStay'] ) )
        {
            $data['lengthOfStay'][$group]['avg_minutes'] = 
              ( $data['lengthOfStay'][$group]['timeOut'] - 
                $data['lengthOfStay'][$group]['timeIn'] ) / 
                    $data['lengthOfStay'][$group]['count'];

            $data['lengthOfStay'][$group]['hours'] = 
                floor( $data['lengthOfStay'][$group]['avg_minutes'] / 60 );
            $data['lengthOfStay'][$group]['minutes'] = 
                $data['lengthOfStay'][$group]['avg_minutes'] % 60;
        }
       
        $data[$group . 'Total'] = count( $result );
        return $data;
    }

}
