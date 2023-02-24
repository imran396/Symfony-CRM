<?php

namespace Beon\IntranetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Security\Core\SecurityContext;
use Beon\IntranetBundle\IntranetBundle;

class UploadType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
	/** @var $security SecurityContext */
	    $security = IntranetBundle::$containerExternal->get('security.context');

        $builder
            ->add('filename','hidden')
            ->add('file', 'multiplefile', ['mapped' => false])
            ->add('presenterId', 'hidden', ['mapped' => false])
            ->add('presenter', 'hidden', ['mapped' => false])
            ->add('externalInvoice', 'hidden',  ['mapped' => false]);

            if ($security->getToken() && $security->isGranted('ROLE_UPLOAD_INVOICE')) {
		        $builder->add('isInvoice', null, ['required' => false]);
            } else if (isset($options['externalInvoice']) && $options['externalInvoice']) {
                $builder->add('isInvoice', null, ['required' => false, 'data' => true]);
            }
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Beon\IntranetBundle\Entity\Upload',
            'externalInvoice' => false,
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'upload';
    }
}
