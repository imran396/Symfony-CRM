<?php

namespace Beon\IntranetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EnumValueType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('className', null,array('disabled' => 'disabled'))
            ->add('value', null, array('data' => $builder->getData()->getFullValue()))
            ->add('reusable')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Beon\IntranetBundle\Entity\EnumValue'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'beon_intranetbundle_enumvalue';
    }
}
