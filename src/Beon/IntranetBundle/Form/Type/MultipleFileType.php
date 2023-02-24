<?php

namespace Beon\IntranetBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MultipleFileType extends AbstractType {

	public function setDefaultOptions( OptionsResolverInterface $resolver ) {
	    $resolver->setDefaults(array(
		'widget' => 'file'
	    ));
	}

	public function getParent() {
		return 'file';
	}

	public function getName() {
		return 'multiplefile';
	}

}