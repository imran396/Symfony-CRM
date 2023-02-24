<?php

namespace Beon\IntranetBundle\Form;

use Beon\IntranetBundle\IntranetBundle;
use Beon\IntranetBundle\Enums\PressreleaseTypeEnum;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Beon\IntranetBundle\Entity\Repository\UserRepository;

class PressreleaseType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        IntranetBundle::injectDbEnum($this->getName(), PressreleaseTypeEnum::getClassName(), 'type', $builder->getData()->getType());

        $builder
            //->add('approved', null, ['required' => false])
            ->add('type', null, [
                'attr' => ['class' => 'dbEnum'],
                'choices' => PressreleaseTypeEnum::getChoices(),
                'required' => true
            ])
            ->add('title')
            ->add('pressreleasenotes',null,['label'=>'Notes'])
	    ->add('campaign', null, ['attr' => ['class' => 'searchSelect']])
            //->add('deleted')
             ->add('user', null,
                ['attr' => ['class' => 'searchSelect'],
                    'query_builder' => function ($repository) {
                            /** @var $repository UserRepository */
                            return $repository->getUsersForPressrelease();
                        }])

            ->add('submitted', null, ['required' => false])
            ->add('customer', null,['label' => 'Stakeholder', 'attr'=>['class' => 'searchSelect']]);
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Beon\IntranetBundle\Entity\Pressrelease'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'acme_beonbundle_pressrelease';
    }
}
