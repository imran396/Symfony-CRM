<?php

namespace Beon\IntranetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CustomerFacebookUrlType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('facebookUrl')
            ->add('customer', null,['label' => 'Stakeholder', 'attr'=>['class' => 'searchSelect']])
            ->add('isOwn',null,['required' => false])
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Beon\IntranetBundle\Entity\CustomerFacebookUrl'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'beon_intranetbundle_customerfacebookurl';
    }
}
