<?php
/**
 * User: LITVAN
 * Date: 2/23/14
 * Time: 4:58 PM
 */

namespace Beon\IntranetBundle\Helper;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormBuilder;

class FormHelper
{

    public static function composeDeleteForm(Controller $controller, $options = array())
    {
        $defaults = array(
            'action' => null,
            'actionParameters' => array(),
            'redirectPath' => null,
            'redirectParams' => array()
        );

        $defaults = array_merge($defaults, $options);

        $builder = $controller->createFormBuilder(null, array('attr' => array('data-delete-type' => 'upload')));

        if (isset($defaults['action'])) {
            $builder->setAction($controller->generateUrl($defaults['action'], $defaults{'actionParameters'}));
        }

        return $builder
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete', 'attr'=> array('class' =>'btn btn-table-actions') /*, 'attr' => array('data-target' => '#deleteModal', 'data-toggle' => 'modal', 'class' => 'btn btn-primary')*/))
            ->add('redirect', 'hidden', array('data' => $controller->generateUrl($defaults['redirectPath'], $defaults['redirectParams'])))
            ->getForm()
            ->createView();
    }
} 