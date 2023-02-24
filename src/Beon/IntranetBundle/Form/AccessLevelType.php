<?php

namespace Beon\IntranetBundle\Form;

use Proxies\__CG__\Beon\IntranetBundle\Entity\Permission;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Beon\IntranetBundle\Entity\Repository\PermissionRepository;

class AccessLevelType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('forCustomers')
            ->add('forEmployees')
            ->add('forOthers')
            ->add('permissions', 'entity', array(
                'class' => 'IntranetBundle:Permission',
                'multiple'     => true,
                'expanded'     =>true,
                'query_builder' => function(PermissionRepository $er) {
                    return $er->createQueryBuilder('p')
                        ->orderBy('p.identifier', 'ASC');
                }
            ));
     }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Beon\IntranetBundle\Entity\AccessLevel'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'beon_intranetbundle_accesslevel';
    }
}
