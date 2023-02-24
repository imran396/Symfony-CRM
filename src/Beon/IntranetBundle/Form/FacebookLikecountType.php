<?php

namespace Beon\IntranetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FacebookLikecountType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('facebookUrl')
            ->add('date','date', array('widget' => 'single_text'))
            ->add('likecount')

        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Beon\IntranetBundle\Entity\FacebookLikecount'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'beon_intranetbundle_facebooklikecount';
    }
}
