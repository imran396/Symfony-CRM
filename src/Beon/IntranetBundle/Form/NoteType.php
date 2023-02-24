<?php

namespace Beon\IntranetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Beon\IntranetBundle\IntranetBundle;
use Beon\IntranetBundle\Enums\NoteTypeEnum;

class NoteType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /** @var $security SecurityContext */
        $security = IntranetBundle::$containerExternal->get('security.context');

        IntranetBundle::injectDbEnum($this->getName(), NoteTypeEnum::getClassName(), 'type', $builder->getData()->getType());

        if ($security->isGranted('ROLE_NOTES_ALL')) {
            $builder->add('type', null, [
                'attr' => ['class' => 'dbEnum'],
                'choices' => NoteTypeEnum::getChoices(),
                'required' => false
            ]);
        }

        $builder->add('text');

        if ($builder->getData()->getTask()) {
            $related = 'task';
        } else if ($builder->getData()->getComplaint()) {
            $related = 'complaint';            
        } else {
            $related = null;
        }
        
        if ($related == null) {
            $builder->add('date1', 'date', ['widget' => 'single_text','required' => false]);
            $builder->add('date2', 'date', ['widget' => 'single_text','required' => false]);
        }

        if ($security->isGranted('ROLE_STAKEHOLDERS_ALL')) {
            $builder->add('customer', null,['label' => 'Stakeholder', 'attr'=>['class' => 'searchSelect']]);
        }

        if ($security->isGranted('ROLE_TASKS')) {
            if (!$security->isGranted('ROLE_TASKS_ALL') && $related) {
                if ($related == 'task') {
                    $builder->add('task', 'hidden', ['data' => $builder->getData()->getTask()->getId()]);
                }
            } else {
                $builder->add('task', null, ['attr'=>['class' => 'searchSelect']]);
            }
        }

        if ($security->isGranted('ROLE_CAMPAIGNS_ALL')) {
            $builder->add('campaign', null,['attr'=>['class' => 'searchSelect']]);
        }

        if ($security->isGranted('ROLE_PRESSRELEASES_ALL')) {
            $builder->add('pressrelease', null, ['attr'=>['class' => 'searchSelect']]);
        }
        
        if ($security->isGranted('ROLE_COMPLAINTS')) {
            if (!$security->isGranted('ROLE_COMPLAINTS_ALL') && $related) {
                if ($related == 'complaint') {
                    $builder->add('complaint', 'hidden', ['data' => $builder->getData()->getComplaint()->getId()]);
                }
            } else {
                $builder->add('complaint', null, ['attr'=>['class' => 'searchSelect']]);
            }
        }

        if ($security->isGranted('ROLE_MONITOREDURLS')) {
            $builder->add('monitoredurl', null, ['attr'=>['class' => 'searchSelect']]);
        }

        if ($security->isGranted('ROLE_SUPPLIERS')) {
            $builder->add('supplier', null, ['attr'=>['class' => 'searchSelect']]);
        }
        
        if ($security->isGranted('ROLE_NOTES_INTERNAL')) {
            $builder->add('internalUseOnly',null, ['required' => false]);
        }

        if (!$builder->getData()->getId()) {
            $builder->add('uploadFile','multiplefile', ['mapped' => false]);
        }
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Beon\IntranetBundle\Entity\Note'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'note';
    }
}
