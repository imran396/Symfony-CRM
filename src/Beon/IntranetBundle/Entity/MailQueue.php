<?php

namespace Beon\IntranetBundle\Entity;

use Beon\IntranetBundle\Lib\GUID;
use Doctrine\ORM\Mapping as ORM;

/**
 * MailQueue
 */
class MailQueue
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $entity;

    /**
     * @var integer
     */
    private $entityId;

    /**
     * @var integer
     */
    private $state;

    /**
     * @var \DateTime
     */
    private $sentDate;

    /**
     * @var string
     */
    private $message;

    /**
     * @var string
     */
    private $redirect;


    /**
     * Set id
     *
     * @param string $id
     * @return MailQueue
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set entity
     *
     * @param string $entity
     * @return MailQueue
     */
    public function setEntity($entity)
    {
        $this->entity = $entity;

        return $this;
    }

    /**
     * Get entity
     *
     * @return string
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * Set entityId
     *
     * @param integer $entityId
     * @return MailQueue
     */
    public function setEntityId($entityId)
    {
        $this->entityId = $entityId;

        return $this;
    }

    /**
     * Get entityId
     *
     * @return integer
     */
    public function getEntityId()
    {
        return $this->entityId;
    }

    /**
     * Set state
     *
     * @param integer $state
     * @return MailQueue
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return integer
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set sentDate
     *
     * @param \DateTime $sentDate
     * @return MailQueue
     */
    public function setSentDate($sentDate)
    {
        $this->sentDate = $sentDate;

        return $this;
    }

    /**
     * Get sentDate
     *
     * @return \DateTime
     */
    public function getSentDate()
    {
        return $this->sentDate;
    }

    /**
     * Set message
     *
     * @param string $message
     * @return MailQueue
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set redirect
     *
     * @param string $redirect
     * @return MailQueue
     */
    public function setRedirect($redirect)
    {
        $this->redirect = $redirect;

        return $this;
    }

    /**
     * Get redirect
     *
     * @return string
     */
    public function getRedirect()
    {
        return $this->redirect;
    }

    function __construct()
    {
        $this->id = GUID::get();
    }

    /**
     * @var \DateTime
     */
    private $lastApprovalReminderSentAt;


    /**
     * Set lastApprovalReminderSentAt
     *
     * @param \DateTime $lastApprovalReminderSentAt
     * @return MailQueue
     */
    public function setLastApprovalReminderSentAt($lastApprovalReminderSentAt)
    {
        $this->lastApprovalReminderSentAt = $lastApprovalReminderSentAt;

        return $this;
    }

    /**
     * Get lastApprovalReminderSentAt
     *
     * @return \DateTime 
     */
    public function getLastApprovalReminderSentAt()
    {
        return $this->lastApprovalReminderSentAt;
    }
}
