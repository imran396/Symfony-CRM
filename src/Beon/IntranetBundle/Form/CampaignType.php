<?php

namespace Beon\IntranetBundle\Form;

use Beon\IntranetBundle\IntranetBundle;
use Beon\IntranetBundle\Enums\CampaignStatusEnum;
use Beon\IntranetBundle\Enums\CampaignIncludedServicesEnum;
use Beon\IntranetBundle\Enums\CampaignBeonRecommendationEnum;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CampaignType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        IntranetBundle::injectDbEnum($this->getName(), CampaignIncludedServicesEnum::getClassName(), 'includedServices', $builder->getData()->getIncludedServices());
        IntranetBundle::injectDbEnum($this->getName(), CampaignBeonRecommendationEnum::getClassName(), 'beonRecommendation', $builder->getData()->getBeonRecommendation());

        $builder->add('title');

        if ($builder->getData()->getApproved()) {
            $builder->add('status', 'choice', array(
                'choices' => CampaignStatusEnum::getTitles(),
                'required' => true
            ));
        }

        $builder
            ->add('details')
            ->add('start', 'date', ['widget' => 'single_text'])
            ->add('end', 'date', ['widget' => 'single_text'])
            ->add('budget', 'number', ['precision' => 2])
            ->add('regularPrice', null, ['precision' => 2])
            ->add('supplier', null,['attr'=>['class' => 'searchSelect']])
            ->add('contact')
            ->add('audiencesize', null, ['label' => 'Audience size'])
            ->add('customer',null,['label' => 'Stakeholder', 'attr'=>['class' => 'searchSelect']])
            ->add('numberOfSeconds')
            ->add('numberOfAds')
            ->add(
                $builder->create('sizeOfAds', 'form', array('virtual' => true))
                  ->add('adsizeWidth', 'text', array(
                'required' => false,
                'label'    => false,
                 'attr'=> array('class' =>'pagesize_width')
             ))
            ->add('adsizeHeight', 'text', array(
                'required' => false,
                'label'    => false,
                ))
           )
            ->add('includedServices', null, [
                'attr' => ['class' => 'dbEnum'],
                'choices' => CampaignIncludedServicesEnum::getChoices(),
                'required' => true
            ])
            ->add('beonRecommendation', null, [
                'attr' => ['class' => 'dbEnum'],
                'choices' => CampaignBeonRecommendationEnum::getChoices(),
                'required' => false
            ])
            ->add('invoiceAddress', null, ['attr' => ['rows' => 3]])
            ->add('returnPath')
            ->add('adDetails', null, ['attr' => ['class' => 'lined', 'rows' => 10, 'cols' => 60]])
            ->add('fsFileName', 'hidden', array('mapped' => false,'required' => false,));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Beon\IntranetBundle\Entity\Campaign'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'campaign';
    }
}
