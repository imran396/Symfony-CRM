<?php

namespace Beon\IntranetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Beon\IntranetBundle\Enums\TimetrackingTariffEnum;
use Beon\IntranetBundle\IntranetBundle;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FacebookReportType extends AbstractType
{

        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
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
			 array (
			 'label'	=> 'Generate Report',
			 'attr'		=> array( 'class' => 'btn btn-table-actions' )
		));
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        return "FacebookReportForm";
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'Timetracking';
    }
    
}