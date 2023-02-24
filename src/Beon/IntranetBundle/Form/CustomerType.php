<?php

namespace Beon\IntranetBundle\Form;

use Beon\IntranetBundle\IntranetBundle;
use Beon\IntranetBundle\Entity\Customer;
use Beon\IntranetBundle\Entity\Repository\CustomerRepository;
use Beon\IntranetBundle\Enums\CooperationTypeEnum;
use Beon\IntranetBundle\Enums\CustomerLevelEnum;
use Beon\IntranetBundle\Enums\StakeholderPaymentTypeEnum;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CustomerType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /** @var $customer Customer */
        $customer = $builder->getData();
        $level = $customer->getLevel();

        IntranetBundle::injectDbEnum($this->getName(), CooperationTypeEnum::getClassName(), 'cooperationType', $builder->getData()->getCooperationType());
 
        $builder
            ->add('name')
            ->add('level', 'hidden')
            ->add('parent', null, [
                'label' => 'Child of',
                'attr' => ['class' => 'searchSelect'],
                'query_builder' => function ($repository) use ($customer) {
                        /** @var $repository CustomerRepository */
                        return $repository->qbAllContracts($customer->getLevel());
                    }
            ]);

        if ($level == CustomerLevelEnum::COOPERATION) {
            //$builder->add('cooperationType', 'choice', ['choices' => CooperationTypeEnum::getTitles(), 'required' => false, 'attr' => ['class' => 'dbEnum']]);
            $builder->add('cooperationType', null, ['required' => false, 'attr' => ['class' => 'dbEnum'], 'choices' => CooperationTypeEnum::getChoices()]);
        }

        if ($level == CustomerLevelEnum::PROJECT) {
            $builder->add('fixedDate');
        } else {
            $builder
                ->add('address')
                ->add('contactname');
        }

        if ($level == CustomerLevelEnum::CUSTOMER || $level == CustomerLevelEnum::COOPERATION) {
            $builder
                ->add('contactphone')
                ->add('contactmobile')
                ->add('contactemail');
        }

        $builder
            ->add('contractstart', 'date', array('widget' => 'single_text'))
            ->add('contractend', 'date', array('widget' => 'single_text', 'required' => false));

        if ($level == CustomerLevelEnum::CUSTOMER) {
            $builder->add('contactBirthday', 'date', array('widget' => 'single_text', 'required' => false));
        }

        if ($level == CustomerLevelEnum::CUSTOMER || $level == CustomerLevelEnum::PROJECT || $level == CustomerLevelEnum::COOPERATION) {
            $builder->
                add('note');
        }

        if ($level == CustomerLevelEnum::COOPERATION) {
            $builder->add('discountInfo');
        }

        if ($level == CustomerLevelEnum::CUSTOMER) {
            $builder
                ->add('city')
                ->add('monday')
                ->add('tuesday')
                ->add('wednesday')
                ->add('thursday')
                ->add('friday')
                ->add('saturday')
                ->add('sunday')
                ->add('holiday')
                ->add('daily')
                ->add('irregular')
                ->add('christmasEve')
                ->add('christmasDay')
                ->add('boxingDay')
                ->add('newYearsEve')
                ->add('newYearsDay')
                ->add('internetPermission', null, array('required' => false))
                ->add('postingInfo')
                ->add('checkWebsite', 'date', array('widget' => 'single_text', 'required' => false))
                ->add('checkCityPage', 'date', array('widget' => 'single_text', 'required' => false))
                ->add('lastFbPrivatePost', 'date', array('widget' => 'single_text', 'required' => false))
                ->add('lastVisit', 'date', array('widget' => 'single_text', 'required' => false))
                ->add('cocktailCasino', 'date', array('widget' => 'single_text', 'required' => false, 'label' => 'Premiere Cocktail Casino'))
                ->add('ladiesNight', 'date', array('widget' => 'single_text', 'required' => false, 'label' => 'Premiere Ladies Night'))
                ->add('nightlounge', 'date', array('widget' => 'single_text', 'required' => false, 'label' => 'Premiere Nightlounge'))
                ->add('fajitaDay', 'date', array('widget' => 'single_text', 'required' => false, 'label' => 'Premiere Fajita Day'))
                ->add('invoicesToBeon', null, array('required' => false))
                ->add('paymentMethod','choice', array(
                    'choices' => StakeholderPaymentTypeEnum::getTitles(),
                ));
        }


        if ($customer->getLevel() == 0) {
            $builder->remove('parent');
        }

        if (IntranetBundle::$containerExternal->get('security.context')->isGranted('ROLE_STAKEHOLDERS_CUSTOMER')) {
            foreach ($builder->all() as $key => $value) {
                if (!in_array($key, ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday', 'holiday', 'daily', 'irregular', 'christmasEve', 'christmasDay', 'boxingDay', 'newYearsEve', 'newYearsDay'])) {
                    $value->setDisabled(true);
                }
            }
        }
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Beon\IntranetBundle\Entity\Customer'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'customer';
    }
}
