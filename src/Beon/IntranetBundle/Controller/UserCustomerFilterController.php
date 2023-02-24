<?php

namespace Beon\IntranetBundle\Controller;

use Beon\IntranetBundle\Entity\Customer;
use Beon\IntranetBundle\Entity\User;
use Beon\IntranetBundle\Enums\UserGroupEnum;
use Beon\IntranetBundle\Lib\PaginationHelper;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Beon\IntranetBundle\Form\UsersType;
use Symfony\Component\Security\Core\SecurityContext;
use Beon\IntranetBundle\Entity\Repository\LogRepository;
use Beon\IntranetBundle\Form\UserFilterType;
use Symfony\Component\HttpFoundation\Response;

/**
 * UserCustomerFilter controller.
 *
 */
class UserCustomerFilterController extends Controller
{
	
	public function handleRequest($entity, $controller, $request)
	{
		$repository = $controller->getDoctrine()->getRepository('IntranetBundle:'.$entity);	
		
		$userGroup = array();
		$userGroup[]  = 40;
		
		if ($entity == 'Timetracking') {
			$userGroup[] = 41;
		}

    	$displayUser = true;
        $displayCustomer = true;
    	$displayPlainText = false;
        $displaySupplierType = false;
        $displayNoteType = false;
        $displayCity = false;
		
		if ($entity == 'Campaign' || $entity == 'MonitoredUrl' || $entity == 'User') {
            $displayUser = false;
        } else if ($entity == 'Contact') {
            $displayUser = false;
        	$displayPlainText = true;
		} else if ($entity == 'Supplier') {
        	$displayUser = false;
            $displayCustomer = false;
        	$displayPlainText = true;
            $displaySupplierType = true;
            $displayCity = true;
        } else if ($entity == 'Note') {
        	$displayUser = true;
            $displayCustomer = false;
            $displayNoteType = true;
        } else if ($entity == 'SupplierGroup' || $entity == 'Customer' || $entity == 'EnumValue') {
        	$displayUser = false;
            $displayCustomer = false;
        	$displayPlainText = true;
        }
		
		$userChoiceForm = $controller->createForm(new UserFilterType(), null, array('action' => '', 'method' => 'POST', 'userGroup' =>$userGroup, 'displayUser' => $displayUser, 'displayCustomer' => $displayCustomer, 'displaySupplierType' => $displaySupplierType, 'displayNoteType' => $displayNoteType, 'displayCity' => $displayCity, 'displayPlainText' => $displayPlainText));

		if ($request->getMethod() == 'POST') {
			
			$userChoiceForm->handleRequest($request);
			
			if ($userChoiceForm->isValid()) {
				if ($displayCustomer && is_object($userChoiceForm->get('stakeholder')->getData())) {
					$customerId = $userChoiceForm->get('stakeholder')->getData()->getId();
					$customer = $controller->getDoctrine()->getRepository('IntranetBundle:Customer')->find($customerId);
				      
					if ($customer) {
						$customerIds = array_keys($controller->getDoctrine()->getRepository('IntranetBundle:Customer')->getCompleteChildParentMapDown($customerId));
						$customerIds[] = $customerId;
						$repository->setCustomerFilter($customerIds);
					}
				}
				
				if ($displayUser && is_object($userChoiceForm->get('user')->getData())) {
					$userId = $userChoiceForm->get('user')->getData()->getId();
					$user = $controller->getDoctrine()->getRepository('IntranetBundle:User')->find($userId);
					
					if ($user) {
						$repository->setUserFilter($user);
					}
				}

				if ($displaySupplierType && $userChoiceForm->get('supplierType')->getData()) {
			        $repository->setSupplierTypeFilter($userChoiceForm->get('supplierType')->getData());
				}

				if ($displayNoteType && $userChoiceForm->get('noteType')->getData()) {
			        $repository->setNoteTypeFilter($userChoiceForm->get('noteType')->getData());
				}

				if ($displayCity && is_object($userChoiceForm->get('city')->getData())) {
					$cityId = $userChoiceForm->get('city')->getData()->getId();
					$city = $controller->getDoctrine()->getRepository('IntranetBundle:City')->find($cityId);
					
					if ($city) {
						$repository->setCityFilter($city);
					}
				}

				if ($displayPlainText && $userChoiceForm->get('plainText')->getData()) {
			        $repository->setPlainTextFilter($userChoiceForm->get('plainText')->getData());
				}
			}
		}
		
		
		/* Logged in user */
		$securityContext = $controller->get('security.context');
		$user = $securityContext->getToken()->getUser();
	  
		if ($user->getCustomer()==null) {
			$response = $controller->renderView(
				'IntranetBundle:UserCustomerFilter:filter.html.twig',
				array (
					'userChoiceForm' => $userChoiceForm->createView(),
				)
			);
		} else {
			$response = false;
		}
		
		return array('repository' =>$repository, 'filterForm' =>$response);
	}
}
