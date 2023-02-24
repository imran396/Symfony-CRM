<?php
namespace Beon\IntranetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ExportTimeTrackingReportType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
         ->add( 'fromDate', 'date', array(
                'required'  => false,
                'widget'    => 'single_text',
                'label'     => 'From'
         ))
         ->add( 'toDate', 'date', array(
                'required'  => false,
                'widget'    => 'single_text',
                'label'     => 'To'
         ))
         ->add( 'generate', 'submit', 
			 array( 
			 'label'	=> 'Export report to CSV file',
			 'attr'		=> array( 'class' => 'btn btn-table-actions' )
		));
    }

    public function getName()
    {
        return "exportTimeTrackingReportForm";
    }
}