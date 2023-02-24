<?php

namespace Beon\IntranetBundle\Controller;

use Beon\IntranetBundle\Entity\Repository\SurveyResultRepository;
use Beon\IntranetBundle\Entity\User;
use Beon\IntranetBundle\Lib\PaginationHelper;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Beon\IntranetBundle\IntranetBundle;
use Beon\IntranetBundle\Entity\SurveyResult;
use Beon\IntranetBundle\Form\ReportType;


/**
 * SurveyResult controller.
 *
 */
class SurveyAnalysisController extends Controller
{
    const ITEMS_ON_PAGE = 10;

    public function reportAction(Request $request)
    {
        $form = $this->createForm( new ReportType() );
        $form->handleRequest( $request );
        
        if( $form->isValid() )
        {
            $input              = array();
            $input['customer']  = $form->get('customer')->getData();
            $input['from']      = $form->get('fromDate')->getData();
            $input['to']        = IntranetBundle::makeDate235959($form->get('toDate')->getData());
		
            $report		= $this->getDoctrine()
                            ->getRepository( 'IntranetBundle:SurveyResult' );

            $reportData = $report->getSurveyReportFor( $input );

        }

        return $this->render('IntranetBundle:SurveyAnalysis:report.html.twig', 
		array(
            'form'      => $form->createView(),
			'data'		=> isset( $reportData ) ? $reportData : null
        ));
        
    }
   
}
