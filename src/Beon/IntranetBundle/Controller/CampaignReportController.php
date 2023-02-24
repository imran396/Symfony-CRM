<?php

namespace Beon\IntranetBundle\Controller;

use Beon\IntranetBundle\Entity\Repository\CampaignRepository;
use Beon\IntranetBundle\Lib\PaginationHelper;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Beon\IntranetBundle\IntranetBundle;
use Beon\IntranetBundle\Entity\Campaign;
use Beon\IntranetBundle\Form\CampaignSavingReportType;
use Beon\IntranetBundle\Form\CpspmReportType;
use Beon\IntranetBundle\Enums\SupplierTypesEnum;


/**
 * Campaign report controller.
 *
 */
class CampaignReportController extends Controller
{
    const ITEMS_ON_PAGE = 10;

    public function savingAction( Request $request )
    {
        $form = $this->createForm( new CampaignSavingReportType() );
        $form->handleRequest( $request );

        $input = NULL;
        if( $form->isValid() )
        {

            $input['from']      = $form->get('fromDate')->getData();
            $input['to']        = IntranetBundle::makeDate235959($form->get('toDate')->getData());

        }
        $report	= $this->getDoctrine()->getRepository( 'IntranetBundle:Campaign' );
        $reportData = $report->getCampaignSavingReport( $input );

        return $this->render('IntranetBundle:CampaignSavingReport:report.html.twig',
		array(
			'form' => $form->createView(),
			'data' => isset( $reportData ) ? $reportData : null
        ));
    }

    public function cpspmAction( Request $request )
    {
        $form = $this->createForm( new CpspmReportType( $this->getDoctrine()->getManager() ) );
        $form->handleRequest( $request );

        $input = NULL;
        if( $form->isValid() )
        {

            $input['from']      = IntranetBundle::makeDate235959($form->get('fromDate')->getData());
            $input['to']        = IntranetBundle::makeDate235959($form->get('toDate')->getData());
            $input['type']      = $form->get('type')->getData();
            $input['freq']      = $form->get('frequency')->getData();
            $input['city']      = $form->get('city')->getData();

            $report		= $this->getDoctrine()->getRepository( 'IntranetBundle:Campaign' );
            $reportData = $report->getCPSPMReport( $input );
        }


        return $this->render('IntranetBundle:CpspmReport:report.html.twig',
		array(
            'form'      => $form->createView(),
			'data'		=> isset( $reportData ) ? $reportData : null,
            'printType' => SupplierTypesEnum::PrintType
        ));
    }


}
