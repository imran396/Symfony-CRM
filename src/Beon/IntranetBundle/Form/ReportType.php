<?php
namespace Beon\IntranetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Beon\IntranetBundle\Enums\ReportQuestionEnum;
use Doctrine\ORM\EntityRepository;

class ReportType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
          ->add('customer', 'entity', array(
				'required'		=> true,  
				'attr'			=> array('class' => 'searchSelect'),
				'class'			=> 'IntranetBundle:Customer',
				'empty_value'	=> '',
				'query_builder' => function( EntityRepository $repository ){
					return $repository->createQueryBuilder('c')
						->where( 'c.level = :level' )
						->setParameter( ':level', 2 )
						->orderBy( 'c.name', 'ASC' );
				}
				
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
        return "Report";
    }
}