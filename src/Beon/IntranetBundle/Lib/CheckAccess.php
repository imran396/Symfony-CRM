<?php
/**
 * User: LITVAN
 * Date: 3/29/14
 * Time: 4:26 PM
 */

namespace Beon\IntranetBundle\Lib;


use Beon\IntranetBundle\Entity\Campaign;
use Beon\IntranetBundle\Entity\Complaint;
use Beon\IntranetBundle\Entity\Customer;
use Beon\IntranetBundle\Entity\Note;
use Beon\IntranetBundle\Entity\Pressrelease;
use Beon\IntranetBundle\Entity\Task;
use Beon\IntranetBundle\Entity\User;
use Beon\IntranetBundle\Entity\Timetracking;
use Beon\IntranetBundle\Entity\BudgetPeriod;
use Beon\IntranetBundle\Enums\TaskTypeEnum;
use Beon\IntranetBundle\Enums\NoteTypeEnum;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\SecurityContext;

abstract class CheckAccess
{
    /**
     * @var $securityContext SecurityContext
     */
    private static $securityContext;
    private static $container;
    private static $readOnly;

    public static function boot($securityContext, $container) {
        self::$securityContext = $securityContext;
        self::$container = $container;
    }

    private static function getCustomerId() {
        if ($customer = self::$securityContext->getToken()->getUser()->getCustomer()) {
            return $customer->getId();
        } else {
            return null;
        }
    }

    private static function getUserGroup() {
        return self::$securityContext->getToken()->getUser()->getGroup();
    }

    private static function getUserId() {
        return self::$securityContext->getToken()->getUser()->getId();
    }

    public static function userWithCustomer(Customer $customer)
    {
        if (self::getCustomerId() && $customer->getId() != self::getCustomerId() && !array_key_exists($customer->getId(), self::$container->get('doctrine.orm.entity_manager')->getRepository('IntranetBundle:Customer')->getCompleteChildParentMapDown(self::getCustomerId()))) {
             throw new AccessDeniedException();
        }
    }

    public static function userWithPressRelease(Pressrelease $pressrelease)
    {
        self::userWithCustomer($pressrelease->getCustomer());
    }

    public static function userWithCampaign(Campaign $campaign)
    {
        self::userWithCustomer($campaign->getCustomer());
    }

    public static function userWithComplaint(Complaint $complaint)
    {
        if (self::getCustomerId() && $complaint->getCustomer()->getId() != self::getCustomerId()) {
             throw new AccessDeniedException();
        }
    }

    public static function userWithTimetracking(Timetracking $timetracking)
    {
        if (!self::$securityContext->isGranted('ROLE_TIMETRACKINGS_ALL')) {
            if ($timetracking->getUser()->getId() != self::getUserId()) {
                if (!self::$securityContext->isGranted('ROLE_TIMETRACKINGS_OWNGROUP') || $timetracking->getUser()->getGroup() != self::getUserGroup()) {
                    throw new AccessDeniedException();
                }
            }
        }
    }
    
    public static function userWithBudgetPeriod(BudgetPeriod $budgetPeriod)
    {
        if (self::getCustomerId() && $budgetPeriod->getCustomer()->getId() != self::getCustomerId()) {
             throw new AccessDeniedException();
        }
    }

    public static function userWithNote(Note $note)
    {
        if (!self::$securityContext->isGranted('ROLE_NOTES_ALL')) {
            $acceptable = false;
            if ($note->getType() && in_array($note->getType()->getId(), NoteTypeEnum::getFixedDateTypes())) {
                $acceptable = true;
            }
            if (!$acceptable && self::getCustomerId() && $note->getCustomer() && $note->getCustomer()->getId() == self::getCustomerId()) {
                $acceptable = true;
            }
            if (!$acceptable && $note->getTask()) {
                try {
                    self::userWithTask($note->getTask(), false);
                    $acceptable = true;
                } catch (AccessDeniedException $e) {
                }
            }
            if (!$acceptable && $note->getComplaint()) {
                try {
                    self::userWithComplaint($note->getComplaint());
                    $acceptable = true;
                } catch (AccessDeniedException $e) {
                }
            }
            if (!$acceptable) {
                throw new AccessDeniedException(); 
            }
        }

        if ($note->getInternalUseOnly() && !self::$securityContext->isGranted('ROLE_NOTES_INTERNAL')) {
            throw new AccessDeniedException();
        }
    }

    /**
     * @param Task $task
     * @throws \Symfony\Component\Security\Core\Exception\AccessDeniedException
     */
    public static function userWithTask(Task $task, $checkDuplicates = true)
    {
        if (!self::$securityContext->isGranted('ROLE_TASKS_ALL')) {
            if ($task->getUser()->getId() == self::$securityContext->getToken()->getUser()->getId()) {
                return;
            } else if ($task->getCarbonCopy() && $task->getCarbonCopy()->getId() == self::$securityContext->getToken()->getUser()->getId()) {
                return;
            } else if (self::$securityContext->isGranted('ROLE_TASKS_OWN')) {
                 throw new AccessDeniedException();
            }
            
            if (self::getCustomerId() && ($task->getType() != TaskTypeEnum::GRAPHICS || !self::taskMatchesCustomer($task, $checkDuplicates))) {
                 throw new AccessDeniedException();
            }

            if (self::$securityContext->isGranted('ROLE_TASKS_OWNGROUP') && $task->getUser()->getGroup() != self::getUserGroup()) {
                throw new AccessDeniedException();
            }
        }
    }

    public static function hasReadOnlyAccess() {
        return self::$readOnly;
    }

    private static function taskMatchesCustomer(Task $task, $checkDuplicates = true, $customerIds = null) {
        if (!$task->getCustomer()) {
            return false;
        } else if ($task->getCustomer()->getId() == self::getCustomerId()) {
            return true;
        } else {
            if (!$customerIds) {
                $customerIds = self::$container->get('doctrine.orm.entity_manager')->getRepository('IntranetBundle:Customer')->getCompleteChildParentMapDown(self::getCustomerId());
            }
            if (array_key_exists($task->getCustomer()->getId(), $customerIds)) {
                return true;
            } else if ($checkDuplicates) {
                foreach (self::$container->get('doctrine.orm.entity_manager')->getRepository('IntranetBundle:Task')->findDuplicates($task) as $duplicate) {
                    if (self::taskMatchesCustomer($duplicate, false, $customerIds)) {
                        self::$readOnly = true;
                        return true;
                    }
                }
            }
            return false;
        }
    }

    public static function userWithConfigValue($role)
    {
        $roles = self::$securityContext->getToken()->getUser()->getRoles();
        if (!in_array($role, $roles)) {
            throw new AccessDeniedException();
        }
    }
}
