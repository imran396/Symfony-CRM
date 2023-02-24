<?php

namespace Beon\IntranetBundle\Form;

use Beon\IntranetBundle\Entity\Repository\CustomerRepository;
use Beon\IntranetBundle\Entity\Repository\UserRepository;
use Beon\IntranetBundle\Enums\ComplaintChanelEnum;
use Beon\IntranetBundle\Enums\ComplaintResolutionEnum;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Beon\IntranetBundle\Enums\ComplaintStatusEnum;
use Beon\IntranetBundle\IntranetBundle;

class ComplaintType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        IntranetBundle::injectDbEnum($this->getName(), ComplaintChanelEnum::getClassName(), 'channel', $builder->getData()->getChannel());

        $builder
            ->add('subject')
            ->add('body')

           ->add('channel', null,[
                'attr' => ['class' => 'dbEnum'],
                'choices' => ComplaintChanelEnum::getChoices(),
                'required' => false
            ])
            ->add('status', 'choice', array(
                'choices' => ComplaintStatusEnum::getTitles(),
                'required' => true
            ))
           ->add('resolution', 'choice', array(
                'choices' => ComplaintResolutionEnum::getTitles(),
                'required' => false
            ))
            ->add('proposal')
            ->add('user', null,
                ['attr' => ['class' => 'searchSelect'],
                    'query_builder' => function ($repository) {
                            /** @var $repository UserRepository */
                            return $repository->getUsersForComplaint();
                        }])

            ->add('outletReceivedAt', 'date', ['widget' => 'single_text', 'required' => false])
            ->add('beonReceivedAt', 'date', ['widget' => 'single_text', 'required' => false])
            ->add('respondedAt', 'date', ['widget' => 'single_text', 'required' => false])
            ->add('customer', null, ['attr' => ['class' => 'searchSelect'],
                 'query_builder' => function ($repository) {
                        /** @var $repository CustomerRepository */
                        return $repository->getQbStakeholdersWithCustomerType();
                    }   
            ]);
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Beon\IntranetBundle\Entity\Complaint'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'beon_intranetbundle_complaint';
    }
}
