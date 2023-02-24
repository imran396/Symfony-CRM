<?php

namespace Beon\IntranetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Security\Core\SecurityContext;
use Beon\IntranetBundle\IntranetBundle;

class UploadEditType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
	/** @var $security SecurityContext */
	    $security = IntranetBundle::$containerExternal->get('security.context');

        $builder
            ->add('customer', null, ['attr'=>['class' => 'searchSelect']])
            ->add('task', null, ['attr'=>['class' => 'searchSelect']])
            ->add('campaign', null, ['attr'=>['class' => 'searchSelect']])
            ->add('pressrelease', null, ['attr'=>['class' => 'searchSelect']])
            //->add('note', null, ['attr'=>['class' => 'searchSelect']])
            ->add('supplier', null, ['attr'=>['class' => 'searchSelect']])
            ->add('supplierGroup', null, ['attr'=>['class' => 'searchSelect']])
            ->add('isInvoice', null, ['required' => false]);
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Beon\IntranetBundle\Entity\Upload',
            'externalInvoice' => false,
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'upload';
    }
}
