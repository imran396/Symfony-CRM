<?php
namespace Beon\IntranetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Beon\IntranetBundle\Enums\SupplierPrintFrequenciesEnum;

class CpspmReportType extends AbstractType
{
    public function __construct($em) {
        $this->em = $em;
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('type', 'entity', array(
				'required'		=> true,
				'attr'			=> array('class' => 'searchSelect'),
				'class'			=> 'IntranetBundle:EnumValue',
                'property'      => 'value',
                'data'          => $this->em->getReference("IntranetBundle:EnumValue", 101), // select the radio type using id
				'query_builder' => function( EntityRepository $repository ){
					return $repository->createQueryBuilder('e')
                        ->where('e.className = :className')
                        ->setParameter(':className', 'SupplierTypesEnum');
				}
		 ))
        ->add('frequency', 'choice', array(
            'choices'       => SupplierPrintFrequenciesEnum::getFrequencies(),
            'required'      => false,
            'empty_value'	=> '',
            'attr'          => array('class' => 'searchSelect'),
            'empty_value'	=> '',
        ))
        ->add('city', 'entity', array(
				'required'		=> false,
				'attr'			=> array('class' => 'searchSelect'),
				'class'			=> 'IntranetBundle:City',
				'empty_value'	=> '',
		 ))
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
        return "CpspmReportForm";
    }
}
