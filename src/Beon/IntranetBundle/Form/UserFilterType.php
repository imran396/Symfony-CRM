<?php

namespace Beon\IntranetBundle\Form;

use Proxies\__CG__\Beon\IntranetBundle\Entity\Permission;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Beon\IntranetBundle\Entity\Repository\PermissionRepository;
use Symfony\Component\Security\Core\SecurityContext;
use Beon\IntranetBundle\IntranetBundle;
use Beon\IntranetBundle\Enums\SupplierTypesEnum;
use Beon\IntranetBundle\Enums\NoteTypeEnum;

class UserFilterType extends AbstractType
{
	/**
	* @param FormBuilderInterface $builder
	* @param array $options
	*/
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		
		$userGroup = $options['userGroup']; 
		
        if ($options['displayUser']) {
		    $builder->add ('user', 'entity', [
	           'attr' => ['class' => 'searchSelect'],
	            'class' => 'IntranetBundle:User',
	            'empty_value' => '',
	            'required' => false,
	            'query_builder' => function ($repository) use ($userGroup)  {
		            $qb = $repository->createQueryBuilder('u');
		            $qb->where('u.group in (:userGroup)')->setParameter('userGroup', $userGroup);
		            return $qb;
	            }
			]);
        }
		
        if ($options['displayCustomer']) {
		    $builder->add ('stakeholder', 'entity', [
		        'attr' => ['class' => 'searchSelect'],
		        'class' => 'IntranetBundle:Customer',
		        'empty_value' => '',
		        'required' => false,
		        'query_builder' => function ($repository) {
			        $qb = $repository->createQueryBuilder('c');
			        return $qb;
	            }
		    ]);
        }

        if ($options['displaySupplierType']) {
            $builder->add('supplierType', 'choice', [
                'choices' => SupplierTypesEnum::getTitles(),
                'required' => false,
            ]);
        }

        if ($options['displayNoteType']) {
            $builder->add('noteType', 'choice', [
                'choices' => NoteTypeEnum::getTitles(),
                'required' => false,
            ]);
        }

        if ($options['displayCity']) {
	        $builder->add ('city', 'entity', [
	            'attr' => ['class' => 'searchSelect'],
	            'class' => 'IntranetBundle:City',
	            'empty_value' => '',
	            'required' => false,
            ]);
        }

        if ($options['displayPlainText']) {
            $builder->add('plainText', 'text', array('required' => false));
        }
	      
		$builder->add('submit', 'submit', array('label' => 'Filter', 'attr' => ['class' => 'btn btn-table-actions']));
		$builder->add('clear', 'button', array('label' => 'Clear', 'attr' => ['value' => 1, 'class' => 'btn btn-table-actions reloadPage']));
	}
	
	/**
	* @param OptionsResolverInterface $resolver
	*/
	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
	    $resolver->setDefaults(array(
		    'data_class' => null,
		    'userGroup' => array(),
            'displayUser' => true,
            'displayCustomer' => true,
            'displaySupplierType' => false,
            'displayNoteType' => false,
            'displayCity' => false,
            'displayPlainText' => false,
	    ));
	}

	/**
	* @return string
	*/
	public function getName()
	{
	    return 'beon_intranetbundle_user_filter';
	}
}
