<?php

namespace Beon\IntranetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Beon\IntranetBundle\Enums\TimetrackingTariffEnum;
use Beon\IntranetBundle\IntranetBundle;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TimetrackingType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        IntranetBundle::injectDbEnum($this->getName(), TimetrackingTariffEnum::getClassName(), 'tariff', $builder->getData()->getTariff());
        
        $mode = $options['mode'];
        $security = IntranetBundle::$containerExternal->get('security.context');

        $builder
            ->add('day','date', ['widget' => 'single_text'])
            ->add('hours', null, ['label' => 'Hours/Count'])
            ->add('tariff', null, array(
                'attr' => ['class' => $security->getToken()->getUser()->isGranted('ROLE_TIMETRACKINGS_ALL') ? 'dbEnum' : ''],
                'choices' => TimetrackingTariffEnum::getChoices(),
                'required' => false
            ))
            ->add('note')
            ->add('user', null, ['data' => $builder->getData()->getUser() ?: $security->getToken()->getUser(), 'attr' => ['class' => 'searchSelect'],
                    'query_builder' => function ($repository) use($builder) {
                            /** @var $repository UserRepository */
                            return $repository->getUsersForTimeTracking();
                        }])
            ;

        if ($mode == 'customer') {
            $builder->add('customer', null, ['label' => 'Stakeholder', 'attr' => ['class' => 'searchSelect']]);
        } else if ($mode == 'task') {
            $builder->add('task', null, ['attr' => ['class' => 'searchSelect']]);
        } else if ($mode == 'campaign') {
            $builder->add('campaign', null, ['attr' => ['class' => 'searchSelect']]);
        }
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Beon\IntranetBundle\Entity\Timetracking',
            'mode' => 'customer',
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'Timetracking';
    }    
}
