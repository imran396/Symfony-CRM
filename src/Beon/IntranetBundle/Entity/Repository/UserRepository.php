<?php
/**
 * User: LITVAN
 * Date: 2/24/14
 * Time: 9:57 PM
 */

namespace Beon\IntranetBundle\Entity\Repository;

use Beon\IntranetBundle\IntranetBundle;
use Beon\IntranetBundle\Enums\TaskTypeEnum;
use Beon\IntranetBundle\Enums\UserGroupEnum;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Doctrine\DBAL\Connection;


class UserRepository extends FilteredRepository implements UserProviderInterface
{
    public function getUsersForTask($type = null)
    {
        $security = IntranetBundle::$containerExternal->get('security.context');

        if ($type == TaskTypeEnum::GRAPHICS) {
            $qb = $this->getUsersByGroup(UserGroupEnum::GRAPHICS);
        } else if ($security->isGranted('ROLE_TASKS_ALL')) {
            $qb = $this->getUsersByGroup(array(UserGroupEnum::EMPLOYEES,UserGroupEnum::GRAPHICS,UserGroupEnum::CUSTOMERS));
        } else if ($security->isGranted('ROLE_TASKS_OWNGROUP')) {
            $qb = $this->getUsersByGroup($security->getToken()->getUser()->getGroup());
        } else { // ROLE_TASKS_OWN // ROLE_TASK_CUSTOMER
            $qb = $this->getUsersByGroup(0);
        }
        return $qb->orWhere('u.id = :id')->setParameter('id', $security->getToken()->getUser()->getId());
    }

    public function getUsersForTimeTracking()
    {
        $security = IntranetBundle::$containerExternal->get('security.context');
        if ($security->isGranted('ROLE_TIMETRACKINGS_ALL')) {
            return $this->getUsersByGroup(array(UserGroupEnum::EMPLOYEES,UserGroupEnum::GRAPHICS));
        } else if ($security->isGranted('ROLE_TIMETRACKINGS_OWNGROUP')) {
            return $this->getUsersByGroup($security->getToken()->getUser()->getGroup());
        } else {
            return $this->createQueryBuilder('u')->where('u.id = :id')->setParameter('id', $security->getToken()->getUser()->getId());
        }
    }

    /**
     * Loads the user for the given username.
     *
     * This method must throw UsernameNotFoundException if the user is not
     * found.
     *
     * @param string $username The username
     *
     * @return UserInterface
     *
     * @see UsernameNotFoundException
     *
     * @throws UsernameNotFoundException if the user is not found
     *
     */

    /**
     *
     * @var Connection
     */
    private $connection;


    public function loadUserByUsername($username)
    {
        $q = $this
            ->createQueryBuilder('u')
            ->where('u.name = :name OR u.email = :email')
            ->setParameter('name', $username)
            ->setParameter('email', $username)
            ->getQuery();

        try {
            // The Query::getSingleResult() method throws an exception
            // if there is no record matching the criteria.
            $user = $q->getSingleResult();
        } catch (NoResultException $e) {
            $message = sprintf(
                'Unable to find an active admin AcmeUserBundle:User object identified by "%s".',
                $username
            );
            throw new UsernameNotFoundException($message, 0, $e);
        }

        return $user;
    }

    /**
     * Refreshes the user for the account interface.
     *
     * It is up to the implementation to decide if the user data should be
     * totally reloaded (e.g. from the database), or if the UserInterface
     * object can just be merged into some internal array of users / identity
     * map.
     * @param UserInterface $user
     *
     * @return UserInterface
     *
     * @throws UnsupportedUserException if the account is not supported
     */
    public function refreshUser(UserInterface $user)
    {
        $class = get_class($user);
        if (!$this->supportsClass($class)) {
            throw new UnsupportedUserException(
                sprintf(
                    'Instances of "%s" are not supported.',
                    $class
                )
            );
        }

        /** @var $user User */
        return $this->find($user->getId());
    }

    /**
     * Whether this provider supports the given user class
     *
     * @param string $class
     *
     * @return Boolean
     */
    public function supportsClass($class)
    {
        return $this->getEntityName() === $class
        || is_subclass_of($class, $this->getEntityName());
    }

    /**
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function getUsers()
    {
        return $this->getUsersByGroup(UserGroupEnum::EMPLOYEES);
    }

    public function getUsersByGroup($groups)
    {
        if (!is_array($groups)) {
            $groups = array($groups);
        }
        $qb = $this->createQueryBuilder('u');
        return $qb->where('u.group IN (:group)')->setParameter('group', $groups)->orderBy('u.group');
    }

    public function getUsersForComplaint()
    {
        return $this->getUsers();
    }

    public function getUsersForPressrelease()
    {
        return $this->getUsers();
    }
}
