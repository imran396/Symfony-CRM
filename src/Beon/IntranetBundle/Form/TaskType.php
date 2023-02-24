<?php

namespace Beon\IntranetBundle\Form;

use Beon\IntranetBundle\Entity\Repository\CampaignRepository;
use Beon\IntranetBundle\Entity\Repository\UserRepository;
use Beon\IntranetBundle\Enums\TaskPaperTypeEnum;
use Beon\IntranetBundle\Enums\TaskPaymentTypeEnum;
use Beon\IntranetBundle\Enums\TaskGraphicsTypeEnum;
use Beon\IntranetBundle\Enums\TaskPrintSpeed;
use Beon\IntranetBundle\Enums\TaskStatusEnum;
use Beon\IntranetBundle\Enums\TaskTypeEnum;
use Beon\IntranetBundle\Enums\TaskGraphicsCirculationEnum;
use Beon\IntranetBundle\Enums\TaskGraphicsFormatEnum;
use Beon\IntranetBundle\Enums\TaskApprovalReminderDelayEnum;
use Beon\IntranetBundle\IntranetBundle;
use Symfony\Bundle\SecurityBundle\Tests\Functional\app\AppKernel;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Security\Core\SecurityContext;

class TaskType extends AbstractType implements ContainerAwareInterface
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        IntranetBundle::injectDbEnum($this->getName(), TaskGraphicsTypeEnum::getClassName(), 'graphicsType', $builder->getData()->getGraphicsType());
        IntranetBundle::injectDbEnum($this->getName(), TaskPaperTypeEnum::getClassName(), 'paperType', $builder->getData()->getPaperType());
        IntranetBundle::injectDbEnum($this->getName(), TaskGraphicsFormatEnum::getClassName(), 'graphicsFormat', $builder->getData()->getGraphicsFormat());
        IntranetBundle::injectDbEnum($this->getName(), TaskGraphicsCirculationEnum::getClassName(), 'graphicsCirculation', $builder->getData()->getGraphicsCirculation());
        IntranetBundle::injectDbEnum($this->getName(), TaskApprovalReminderDelayEnum::getClassName(), 'approvalReminderDelay', $builder->getData()->getApprovalReminderDelay());

        /** @var $security SecurityContext */
        $security = IntranetBundle::$containerExternal->get('security.context');
        $taskId = $builder->getData()->getId();

        if ($taskId) {
            $builder->add('type', 'hidden');
        } else if (!$security->isGranted('ROLE_TASKS_ALL')) {
            $builder->add('type', 'hidden', ['data' => TaskTypeEnum::GRAPHICS]);
        } else {
            $builder->add('type', 'choice', [
                'choices' => TaskTypeEnum::getTitles(),
                'required' => true
            ]);
        }

        $builder->add('title');

        if ($security->isGranted('ROLE_TASKS_EDIT')) {
            $builder->add('user', null, ['attr' => ['class' => 'searchSelect'],
                'query_builder' => function ($repository) use($builder) {
                        /** @var $repository UserRepository */
                        return $repository->getUsersForTask($builder->getData()->getType());
                    }]
            );
            $builder->add('carbonCopy', null, ['attr' => ['class' => 'searchSelect']]);
        }

        if (!$security->getToken()->getUser()->getCustomer()) {
            $builder->add('customer', null, ['label' => 'Stakeholder', 'attr' => ['class' => 'searchSelect']]);
        }

        if ($security->isGranted('ROLE_TASKS_ALL')) {
            $builder
                ->add('campaign', null, ['attr' => ['class' => 'searchSelect'], 'property' => 'formattedIdWithTitle'])
                ->add('complaint', null, ['attr' => ['class' => 'searchSelect']])
                ->add('pressrelease', null, ['attr' => ['class' => 'searchSelect']]);
        }

        $builder->add('description');
        $builder->add('dueDate', 'date', ['widget' => 'single_text','required' => false]);

        if ($security->isGranted('ROLE_TASKS_EDIT')) {
             $builder->add('status', 'choice', array(
                 'choices' => TaskStatusEnum::getTitles(),
                 'required' => true
             ));
        }

        if (!$taskId || $security->isGranted('ROLE_TASKS_OWNGROUP')) {
            $builder
                ->add('expedited', 'boolchoice', ['choices' => ['0'=>'Normale Bearbeitungszeit','1'=>'Express-Bearbeitung'], 'label' => 'Expedited?'])
                ->add('newDesign', 'boolchoice', ['choices' => ['0'=>'Bestehendes Design','1'=>'Neues Design'], 'label' => 'New design?']);
        }

        $builder

            ->add('graphicsType', null, [
                'attr' => ['class' => 'dbEnum'],
                'choices' => TaskGraphicsTypeEnum::getChoices(),
                'required' => false
            ])

            ->add('graphicsFormat',null,[
                'attr' => ['class' => 'dbEnum'],
                'choices' => TaskGraphicsFormatEnum::getChoices(),
                'required' => false
            ])

             ->add('paperType', null,[
                'attr' => ['class' => 'dbEnum'],
                'choices' => TaskPaperTypeEnum::getChoices(),
                'required' => true
            ])

            ->add('graphicsCirculation', null, [
                'attr' => ['class' => 'dbEnum'],
                'choices' => TaskGraphicsCirculationEnum::getChoices(),
                'required' => false
            ]);

        $builder
            ->add('paymentMethod','choice', array(
                'choices' => TaskPaymentTypeEnum::getTitles(),
                'required' => false
            ))
            ->add('invoiceAddress', null, ['attr' => ['rows' => 3]])
            ->add('deliveryAddress', null, ['attr' => ['rows' => 3]])
            ->add(
                'printSpeed',
                'choice',
                array(
                    'choices' => TaskPrintSpeed::getTitles(),
                    'required' => false
                )
            );

        if ($security->isGranted('ROLE_TASKS_EDIT')) {
            $builder->add('approvalReminderDelay', null, [
                'attr' => ['class' => 'dbEnum'],
                'choices' => TaskApprovalReminderDelayEnum::getChoices(),
                'required' => true
            ]);
        }

        if ($taskId) {
            $builder->add('orderReference');
        } else {
            $builder->add('uploadFile','multiplefile', ['mapped' => false]);
        }

        if ($taskId && $security->isGranted('ROLE_TASKS_OWNGROUP')) {
            foreach ($builder->all() as $key => $value) {
                if (!in_array($key, ['orderReference', 'status', 'user', 'expedited', 'newDesign', 'graphicsFormat', 'graphicsCirculation', 'paperType'])) {
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
            'data_class' => 'Beon\IntranetBundle\Entity\Task'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'task';
    }

    /**
     * Sets the Container.
     *
     * @param ContainerInterface|null $container A ContainerInterface instance or null
     *
     * @api
     */
    public function setContainer(ContainerInterface $container = null)
    {
        die();
    }
}
