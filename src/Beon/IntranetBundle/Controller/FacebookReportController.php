<?php

namespace Beon\IntranetBundle\Controller;

use Beon\IntranetBundle\IntranetBundle;
use Beon\IntranetBundle\Lib\PaginationHelper;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Beon\IntranetBundle\Form\FacebookReportType;

/**
 * FacebookReport controller.
 *
 */
class FacebookReportController extends Controller
{
    const ITEMS_ON_PAGE = 10;

    public function reportAction(Request $request)
    {
    	$form = $this->createForm(new FacebookReportType());
        $form->handleRequest( $request );
        
        if ( $form->isValid() ) {
		    $input              = array();
		    $input['from']      = $form->get('fromDate')->getData();
		    $input['to']        = IntranetBundle::makeDate235959($form->get('toDate')->getData());
		
		    $report = $this->getDoctrine()->getRepository( 'IntranetBundle:FacebookUrl' );

		    $reportData = $report->getReport( $input );
		
            }
            
            return $this->render('IntranetBundle:FacebookReport:report.html.twig', 
		    array (
			    'form'      => $form->createView(),
			    'data'	    => isset( $reportData ) ? $reportData : null,
		    )
        );
    }
}
