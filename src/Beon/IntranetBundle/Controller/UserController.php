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

/**
 * User controller.
 *
 */
class UserController extends Controller
{
    const ITEMS_ON_PAGE = 10;

    /**
     * Lists all Users entities.
     *
     */
    public function indexAction(Request $request)
    {
    
	/* applying filters */
	$userFilterService = $this->get('UserCustomerFilterService');
	$filterData =  $userFilterService->handleRequest('User', $this, $request);
	$repository = $filterData['repository'];
	
        $callback = function($qb) use($repository) {
	      if ($repository->getCustomerFilter()!=null) {
		  $qb->andWhere('obj.customer IN (:customerIds)');
		  $qb->setParameter('customerIds', $repository->getCustomerFilter());
	      }
	};
        
        return PaginationHelper::composeFilterIndex($this, $request, 'User', self::ITEMS_ON_PAGE, $callback, $filterData);
    }

    /**
     * Creates a new User entity.
     *
     */
    public function createAction(Request $request)
    {
        /** @var $entity User */
        $entity = new User();

        $entity->setGroup($request->request->get('User')['group']);

        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($entity->getGroup() == UserGroupEnum::CUSTOMERS) {
            $customer = $this->getDoctrine()->getRepository('IntranetBundle:Customer')->find($entity->getCustomerId());
            $entity->setCustomer($customer);
        }

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);

            if (!$entity->getName()) {
                $entity->setName($entity->getCustomer()->getName());
            }

            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('user_show', array('id' => $entity->getId())));
        }

        return $this->render('IntranetBundle:User:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Users entity.
     *
     * @param User $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(User $entity)
    {
        $form = $this->createForm(new UsersType(), $entity, array(
            'action' => $this->generateUrl('user_create'),
            'method' => 'POST',
        ));

        $form
            ->add('submit', 'submit', array('label' => 'Create'))
            ->add('redirect', 'hidden', [
                'data' => null,
                'mapped' => false
            ]);

        $form->add('submit', 'submit', array('label' => 'Create', 'attr' => array('class' => 'btn btn-table-actions')));

        return $form;
    }

    /**
     * Displays a form to create a new Users entity.
     *
     */
    public function newAction(Request $request)
    {
        $entity = new User();
        $form = $this->createCreateForm($entity);

        return $this->render('IntranetBundle:User:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView()
        ));
    }

    private function randomPass($length = 8)
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
        $password = substr(str_shuffle($chars), 0, $length);
        return $password;
    }

    /**
     * Finds and displays a Users entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        /** @var $entity User */
        $entity = $em->getRepository('IntranetBundle:User')->find($id);
        $logRepository = $em->getRepository('IntranetBundle:Log');
        /** @var $logRepository LogRepository */
        $successfullLogin = $logRepository->getLastLoginTime($entity, 0);
        $unsuccessfullLogin = $logRepository->getLastLoginTime($entity, 1);
        $numberOfSuccessfullLogin = $logRepository->getNumberOfSuccessfullLogin($entity);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IntranetBundle:User:show.html.twig', array(
            'entity' => $entity,
            'successfullLogin' => $successfullLogin,
            'unsuccessfullLogin' => $unsuccessfullLogin,
            'numberOfSuccessfullLogin' => $numberOfSuccessfullLogin,
            'delete_form' => $deleteForm->createView(),));
    }

    /**
     * Displays a form to edit an existing Users entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        /** @var $entity User */
        $entity = $em->getRepository('IntranetBundle:User')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        /** @var $securityContext SecurityContext */
        $securityContext = $this->get('security.context');


        return $this->render('IntranetBundle:User:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a User entity.
     *
     * @param User $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(User $entity)
    {
        $form = $this->createForm(new UsersType(), $entity, array(
            'action' => $this->generateUrl('user_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update', 'attr' => array('class' => 'btn btn-table-actions')));

        return $form;
    }

    /**
     * Edits an existing Users entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IntranetBundle:User')->find($id);

        /** @var $entity User */
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            if (!$entity->getCustomer() && $entity->getGroup() == UserGroupEnum::CUSTOMERS) {
                $this->get('session')->getFlashBag()->set('error', 'Customer is not set');

                if ($this->get('request')->headers->get('referer')) {
                    $route = $this->get('request')->headers->get('referer');
                } else {
                    $route = $this->get('request')->generate('beon_homepage');
                }
                return new RedirectResponse($route);
            }

            $em->flush();

            return $this->redirect($this->generateUrl('user_edit', array('id' => $id)));
        }

        return $this->render('IntranetBundle:User:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a User entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IntranetBundle:User')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find User entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('user'));
    }

    /**
     * Creates a form to delete a User entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('user_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete', 'attr' => array('class' => 'btn btn-table-actions')))
            ->getForm();
    }
}
