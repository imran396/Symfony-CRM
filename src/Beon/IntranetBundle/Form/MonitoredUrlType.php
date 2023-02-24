<?php

namespace Beon\IntranetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MonitoredUrlType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('url')   
            ->add('isOwnWebsite', null, ['required' => false])   
            ->add('customer', null,['label' => 'Stakeholder', 'attr'=>['class' => 'searchSelect']]);
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Beon\IntranetBundle\Entity\MonitoredUrl'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'beon_intranetbundle_monitoredurl';
    }
}
