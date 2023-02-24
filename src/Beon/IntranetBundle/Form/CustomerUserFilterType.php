<?php

namespace Beon\IntranetBundle\Form;

use Beon\IntranetBundle\IntranetBundle;
use Beon\IntranetBundle\Enums\PressreleaseTypeEnum;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Beon\IntranetBundle\Entity\Repository\UserRepository;

class CustomerUserFilter extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

	$builder->add(
                'user',
                'entity',
                [
                    'attr' => ['class' => 'searchSelect'],
                    'class' => 'IntranetBundle:User',
                    'empty_value' => '',
                    'required' => false,
                    'query_builder' => function ($repository) use ($taskType) {
                            /** @var $repository UserRepository */
                            return $repository->getUsersForTask($taskType);
                        }
                ]
            )
             ->add(
               'stakeholder',
                'entity',
                [
                    'attr' => ['class' => 'searchSelect'],
                    'class' => 'IntranetBundle:Customer',
                    'empty_value' => '',
                    'required' => false,
                    'query_builder' => function ($repository) {
                            /** @var $repository CustomerRepository */
                            $security = $this->container->get('security.context');
                            $qb = $repository->createQueryBuilder('c');
                            if ($security->getToken()->getUser()->getCustomer()) {
                                $qb->where('c.id = :cid')->setParameter('cid', $security->getToken()->getUser()->getCustomer()->getId());
                            }
                            return $qb;
                        }
                ]
             )
            ->add('submit', 'submit', array('label' => 'Filter', 'attr' => ['class' => 'btn btn-table-actions']))
            ->add(
                'clear',
                'submit',
                array('label' => 'Clear', 'attr' => ['value' => 1, 'class' => 'btn btn-table-actions'])
            );
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => ''
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'interanet_beonbundle_customeruserfilter';
    }
}
