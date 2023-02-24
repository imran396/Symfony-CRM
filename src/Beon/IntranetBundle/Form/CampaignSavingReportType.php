<?php
namespace Beon\IntranetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Beon\IntranetBundle\Enums\SupplierPrintFrequenciesEnum;

class CampaignSavingReportType extends AbstractType
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
			 'label'	=> 'Generate Report',
			 'attr'		=> array( 'class' => 'btn btn-table-actions' )
		));
    }

    public function getName()
    {
        return "CampaignSavingReportForm";
    }
}