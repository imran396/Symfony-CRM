<?php

namespace Beon\IntranetBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BoolchoiceType extends AbstractType {
	public function setDefaultOptions( OptionsResolverInterface $resolver ) {
		$resolver->setDefaults( array(
			'choices' => array(
				'1' => "Yes",
				'0' => "No",
			),
			'empty_value' => false,	
			'expanded' => false, 
		));
	}

	public function getParent() {
		return 'choice';
	}

	public function getName() {
		return 'boolchoice';
	}
}