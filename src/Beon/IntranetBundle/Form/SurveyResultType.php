<?php

namespace Beon\IntranetBundle\Form;

use Beon\IntranetBundle\Entity\Repository\CustomerRepository;
use Beon\IntranetBundle\Entity\SurveyResult;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SurveyResultType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('customer', null,['attr'=>['class' => 'searchSelect'],'query_builder' => function ($repository) {
                    /** @var $repository CustomerRepository */
                    return $repository->getQbStakeholdersWithCustomerType();
                }])
            ->add('date', null, ['widget' => 'single_text', 'required' => true])
            ->add('timeIn')
            ->add('timeOut')
            ->add('frequency', 'choice', ['required' => false, 'expanded' => true, 'empty_value' => SurveyResult::EMPTY_LABEL, 'choices' => SurveyResult::getChoices('frequency')])
            ->add('welcome', 'choice', ['required' => false, 'expanded' => true, 'empty_value' => SurveyResult::EMPTY_LABEL, 'choices' => SurveyResult::getChoices('welcome')])
            ->add('drinks', 'choice', ['required' => false, 'expanded' => true, 'empty_value' => SurveyResult::EMPTY_LABEL, 'choices' => SurveyResult::getChoices('drinks')])
            ->add('drinksValue', 'choice', ['required' => false, 'expanded' => true, 'empty_value' => SurveyResult::EMPTY_LABEL, 'choices' => SurveyResult::getChoices('drinksValue')])
            ->add('drinksWait', 'choice', ['required' => false, 'expanded' => true, 'empty_value' => SurveyResult::EMPTY_LABEL, 'choices' => SurveyResult::getChoices('drinksWait')])
            ->add('food', 'choice', ['required' => false, 'expanded' => true, 'empty_value' => SurveyResult::EMPTY_LABEL, 'choices' => SurveyResult::getChoices('food')])
            ->add('foodValue', 'choice', ['required' => false, 'expanded' => true, 'empty_value' => SurveyResult::EMPTY_LABEL, 'choices' => SurveyResult::getChoices('foodValue')])
            ->add('foodWait', 'choice', ['required' => false, 'expanded' => true, 'empty_value' => SurveyResult::EMPTY_LABEL, 'choices' => SurveyResult::getChoices('foodWait')])
            ->add('service', 'choice', ['required' => false, 'expanded' => true, 'empty_value' => SurveyResult::EMPTY_LABEL, 'choices' => SurveyResult::getChoices('service')])
            ->add('music', 'choice', ['required' => false, 'expanded' => true, 'empty_value' => SurveyResult::EMPTY_LABEL, 'choices' => SurveyResult::getChoices('music')])
            ->add('atmosphere', 'choice', ['required' => false, 'expanded' => true, 'empty_value' => SurveyResult::EMPTY_LABEL, 'choices' => SurveyResult::getChoices('atmosphere')])
            ->add('happyHour', 'choice', ['required' => false, 'expanded' => true, 'empty_value' => SurveyResult::EMPTY_LABEL, 'choices' => SurveyResult::getChoices('happyHour')])
            ->add('enchiladaHour', 'choice', ['required' => false, 'expanded' => true, 'empty_value' => SurveyResult::EMPTY_LABEL, 'choices' => SurveyResult::getChoices('enchiladaHour')])
            ->add('casinoMexicano', 'choice', ['required' => false, 'expanded' => true, 'empty_value' => SurveyResult::EMPTY_LABEL, 'choices' => SurveyResult::getChoices('casinoMexicano')])
            ->add('ladiesNight', 'choice', ['required' => false, 'expanded' => true, 'empty_value' => SurveyResult::EMPTY_LABEL, 'choices' => SurveyResult::getChoices('ladiesNight')])
            ->add('overall', 'choice', ['required' => false, 'expanded' => true, 'empty_value' => SurveyResult::EMPTY_LABEL, 'choices' => SurveyResult::getChoices('overall')]);
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Beon\IntranetBundle\Entity\SurveyResult'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'surveyResult';
    }
}
