<?php

namespace Beon\IntranetBundle\Controller;

use Beon\IntranetBundle\Entity\Repository\SurveyResultRepository;
use Beon\IntranetBundle\Lib\PaginationHelper;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Beon\IntranetBundle\IntranetBundle;
use Beon\IntranetBundle\Form\TimeTrackType;
use Beon\IntranetBundle\Form\ExportTimeTrackingReportType;


/**
 * TimeTrackReport controller.
 *
 */
class TimeTrackReportController extends Controller
{
    const ITEMS_ON_PAGE = 10;

    public function timeTrackAction(Request $request)
    {
        $form = $this->createForm( new TimeTrackType() );
        $form->handleRequest( $request );
        
        $exportTimeTrackingReportForm = false;
        
        if ( $form->isValid() ) {
		
		$input              = array();
		$input['from']      = $form->get('fromDate')->getData();
		$input['to']        = IntranetBundle::makeDate235959($form->get('toDate')->getData());
		    
		$report = $this->getDoctrine()->getRepository( 'IntranetBundle:Timetracking' );

		$reportData = $report->getTimeTrackingReport( $input );
		
		/* Generate Export CSV Form */
		$exportTimeTrackingReportForm = $this->createForm( new ExportTimeTrackingReportType(), NULL, array(
		    'action' => $this->generateUrl('report_export_csv'),
		    'method' => 'POST',
		));

		$exportTimeTrackingReportForm->get('fromDate')->setData($input['from']);
		$exportTimeTrackingReportForm->get('toDate')->setData($input['to']);
		
        }
        
        
        return $this->render('IntranetBundle:TimeTrackReport:report.html.twig', 
		array (
			'form'      => $form->createView(),
			'data'	    => isset( $reportData ) ? $reportData : null,
			'exportTimeTrackingReportForm' =>   ( $exportTimeTrackingReportForm ) ? $exportTimeTrackingReportForm->createView() : null,
		)
        );
        
    }
    
    public function exportAction(Request $request)
    {
	    $form = $this->createForm( new ExportTimeTrackingReportType() );
        $form->handleRequest( $request );
        
        $exportTimeTrackingReportForm = false;
        
        if ( $form->isValid() ) {
		
		    $input              = array();
		    $input['from']      = $form->get('fromDate')->getData();
		    $input['to']        = $form->get('toDate')->getData();
		        
		    $em = $this->getDoctrine()->getManager();
	          
		    $timeTrackingEntity = $em->getRepository('IntranetBundle:Timetracking')->findByRange($input);
		
		    $filename = "time_tracking_".date("Y_m_d_His").".csv";
		    $response = $this->render('IntranetBundle:TimeTrackReport:export.html.twig', array ('timeTrackingEntity' => $timeTrackingEntity));
		    $response->headers->set('Content-Type', 'text/csv');
		    $response->headers->set('Content-Disposition', 'attachment; filename='.$filename);
		
		    return $response;
	    }	
    }
   
}
