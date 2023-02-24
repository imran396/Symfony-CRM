<?php

namespace Beon\IntranetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BudgetPeriodType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('start', 'date', ['widget' => 'single_text'])
            ->add('end', 'date', ['widget' => 'single_text'])
            ->add('budget')
            ->add('customer_id', 'hidden', ['mapped' => false]);
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Beon\IntranetBundle\Entity\BudgetPeriod'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'budgetperiod';
    }
}
