<?php

namespace Beon\IntranetBundle\Form;

use Beon\IntranetBundle\Entity\User;
use Beon\IntranetBundle\Enums\UserGroupEnum;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UsersType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /** @var $user User */
        $user = $builder->getData();

        $builder
            ->add('name')
            ->add('displayName')
            ->add('email')
            ->add('password');

        if ($user->getGroup() == UserGroupEnum::CUSTOMERS) {
            $customerId = $user->getCustomer() ? $user->getCustomer()->getId() : $user->getCustomerId();

            $builder
                ->add('customer_id', 'hidden', ['data' => $customerId])
                ->add('customer', null, [
                    'label' => 'Stakeholder',
                    'required' => true,
                    'disabled' => true,
                ])
                ->add('group', 'choice', ['choices' => UserGroupEnum::getTitlesRestricted(true)]);
        } else {
            $builder->add('group', 'choice', ['choices' => UserGroupEnum::getTitlesRestricted(false)]);
        }

        $builder->add('accessLevel', null, ['query_builder' => function ($repository) use($user) {
            /** @var $repository AccessLevelRepository */
            return $repository->getAccessLevelsForGroup($user->getGroup());
        }]);
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Beon\IntranetBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'User';
    }
}
