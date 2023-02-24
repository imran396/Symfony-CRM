<?php

namespace Beon\IntranetBundle\Form;

use Beon\IntranetBundle\IntranetBundle;
use Beon\IntranetBundle\Enums\SupplierPrintFrequenciesEnum;
use Beon\IntranetBundle\Enums\SupplierTypesEnum;
use Beon\IntranetBundle\Helper\ContainerProxy;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SupplierType extends AbstractType
{
    private $container;

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        IntranetBundle::injectDbEnum($this->getName(), SupplierTypesEnum::getClassName(), 'supplierType', $builder->getData()->getSupplierType());

        $builder
            ->add('name')
            ->add('audiencesize', null, ['label' => 'Audience size'])
            ->add('supplierType', null, [
                'attr' => ['class' => 'dbEnum'],
                'choices' => SupplierTypesEnum::getChoices(),
                'required' => true
            ])
            ->add('frequency', 'choice', array(
                'choices' => SupplierPrintFrequenciesEnum::getTitles(),
                'required' => true
            ))
            ->add('pagesizeWidth', 'text', array(
                'required' => false,
                'label'    => 'Page width'
            ))
            ->add('pagesizeHeight', 'text', array(
                'required' => false,
                'label'    => 'Page height'
            ))
            ->add('city',null,['attr'=>['class' => 'searchSelect']])
            ->add('group',null,['attr'=>['class' => 'searchSelect']]);

    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Beon\IntranetBundle\Entity\Supplier'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'supplier';
    }
}
