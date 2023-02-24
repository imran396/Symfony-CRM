<?php

namespace Beon\IntranetBundle\Entity;

use Beon\IntranetBundle\Enums\CustomerLevelEnum;
use Beon\IntranetBundle\Enums\TaskStatusEnum;
use Beon\IntranetBundle\Enums\TaskTypeEnum;
use Beon\IntranetBundle\Enums\TaskApprovalReminderDelayEnum;
use Doctrine\ORM\Mapping as ORM;

/**
 * Task
 */
class Task
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Beon\IntranetBundle\Entity\User
     */
    private $createdBy;

    /**
     * @var string
     */
    private $description;

    /**
     * @var \DateTime
     */
    private $dueDate;

    /**
     * @var integer
     */
    private $status = TaskStatusEnum::NOT_STARTED;

    /**
     * @var integer
     */
    private $printSpeed;

    /**
     * @var \Beon\IntranetBundle\Entity\User
     */
    private $user;

    /**
     * @var \Beon\IntranetBundle\Entity\User
     */
    private $carbonCopy;

    /**
     * @var \Beon\IntranetBundle\Entity\Customer
     */
    private $customer;

    /**
     * @var \Beon\IntranetBundle\Entity\Campaign
     */
    private $campaign;

    /**
     * @var \Beon\IntranetBundle\Entity\Pressrelease
     */
    private $pressrelease;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $notes;

    /**
     * @var boolean
     */
    private $internalapprovalmailsent = false;

    /**
     * @var boolean
     */
    private $approvalmailsent = false;

    /**
     * @var integer
     */
    private $paymentMethod;

    /**
     * @var string
     */
    private $invoiceAddress;

    /**
     * @var string
     */
    private $deliveryAddress;

    /**
     * @var boolean
     */
    private $approved = false;

    /**
     * @var \Beon\IntranetBundle\Entity\User
     */
    private $approvementSender;

    /**
     * @var \Beon\IntranetBundle\Entity\User
     */
    private $internalApprovementSender;

    /**
     * @var \DateTime
     */
    private $approvedAt;

    /**
     * @var \Beon\IntranetBundle\Entity\User
     */
    private $approvedBy;

    /**
     * @var Task
     */
    private $duplicateOf;

    /**
     * @var \Beon\IntranetBundle\Entity\EnumValue
     */
    private $approvalReminderDelay;

    /**
     * @var \DateTime
     */
    private $firstApprovalMailSentAt;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
	    $this->id = $id;
    }

    public function getTitle()
    {
        if ($this->title) {
            return $this->title;
        } else {
            $cut = substr($this->description, 0, 40);
            $cut = ($this->description == $cut) ? $cut : $cut . ' ...';
            return $cut;
        }
    }

    public function __clone()
    {
        $this->id = null;
    }


    /**
     * Set description
     *
     * @param string $description
     * @return Task
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set dueDate
     *
     * @param \DateTime $dueDate
     * @return Task
     */
    public function setDueDate($dueDate)
    {
        $this->dueDate = $dueDate;

        return $this;
    }

    public function setDueDateOffset($addDays, $fromNow = false)
    {
        if ($this->getCreatedAt() && !$fromNow) {
            $dueDate = clone $this->getCreatedAt();
        } else {
            $dueDate = new \DateTime();
        }

        while (!($isOpen = self::isOpenDay($dueDate)) || $addDays > 0) {
            if ($isOpen) {
                $addDays--;
            } else {
            }
            $dueDate->add(new \DateInterval('P1D'));
        }

        return $this->setDueDate($dueDate);
    }

    private static $holidays = array();

    private static function isOpenDay($date) {
        if ($date->format('N') > 5) {
            return false;
        } else {
            $year = $date->format('Y');
            if (!isset(self::$holidays[$year])) {
                $ostersonntag = strtotime('+1 day', easter_date($year));
                $holidays = array();
                $holidays[] = "$year-01-01"; // 1. Januar - Neujahr
                $holidays[] = "$year-01-06"; // 6. Januar - Heilige Drei Könige (Epiphanias)
                $holidays[] = date('Y-m-d', strtotime('-2 days', $ostersonntag));  // Karfreitag
                $holidays[] = date('Y-m-d', strtotime('+1 day', $ostersonntag)); // Ostermontag
                $holidays[] = "$year-05-01"; // 1. Mai - Tag der Arbeit
                $holidays[] = date('Y-m-d', strtotime('+39 days', $ostersonntag)); // Christi Himmelfahrt
                $holidays[] = date('Y-m-d', strtotime('+50 days', $ostersonntag)); // Pfingstmontag
                $holidays[] = date('Y-m-d', strtotime('+60 days', $ostersonntag)); // Fronleichnam
                $holidays[] = "$year-08-15"; // Mariä Himmelfahrt
                $holidays[] = "$year-10-03"; // 3. Oktober - Tag der Deutschen Einheit
                $holidays[] = "$year-11-01"; // 1. November - Allerheiligen
                $holidays[] = "$year-12-25"; // 25. Dezember - Erster Weihnachtstag
                $holidays[] = "$year-12-26"; // 26. Dezember - Zweiter Weihnachtstag
                self::$holidays[$year] = $holidays;
            }
            return !in_array($date->format('Y-m-d'), self::$holidays[$year]);
        }
    }

    /**
     * Get dueDate
     *
     * @return \DateTime
     */
    public function getDueDate()
    {
        return $this->dueDate;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return Task
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set user
     *
     * @param \Beon\IntranetBundle\Entity\User $user
     * @return Task
     */
    public function setUser(\Beon\IntranetBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Beon\IntranetBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set customer
     *
     * @param \Beon\IntranetBundle\Entity\Customer $customer
     * @return Task
     */
    public function setCustomer(\Beon\IntranetBundle\Entity\Customer $customer = null)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return \Beon\IntranetBundle\Entity\Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Set campaign
     *
     * @param \Beon\IntranetBundle\Entity\Campaign $campaign
     * @return Task
     */
    public function setCampaign(\Beon\IntranetBundle\Entity\Campaign $campaign = null)
    {
        $this->campaign = $campaign;

        return $this;
    }

    /**
     * Get campaign
     *
     * @return \Beon\IntranetBundle\Entity\Campaign
     */
    public function getCampaign()
    {
        return $this->campaign;
    }

    /**
     * @var integer
     */
    private $type;

    /**
     * @var \Beon\IntranetBundle\Entity\EnumValue
     */

    private $graphicsType;

    /**
     * @var \Beon\IntranetBundle\Entity\EnumValue
     */

    private $paperType;

    /**
     * @var boolean
     */
    private $newDesign = true;

    /**
     * @var boolean
     */
    private $expedited  = false;

   /**
     * @var \Beon\IntranetBundle\Entity\EnumValue
    */

    private $graphicsFormat;

    /**
     * @var \Beon\IntranetBundle\Entity\EnumValue
     */
    private $graphicsCirculation;

    /**
     * Set type
     *
     * @param integer $type
     * @return Task
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer
     */
    public function getType()
    {
        return $this->type;
    }

   /**
     * Set graphicsFormat
     *
     * @param \Beon\IntranetBundle\Entity\EnumValue $graphicsType
     * @return Task
     */
    public function setGraphicsType($graphicsType)
    {
        $this->graphicsType = $graphicsType;

        return $this;
    }

    /**
     * Get graphicsType
     *
     * @return \Beon\IntranetBundle\Entity\EnumValue
     */
    public function getGraphicsType()
    {
        return $this->graphicsType;
    }

    /**
     * Set paperType
     *
     * @param \Beon\IntranetBundle\Entity\EnumValue $paperType
     * @return Task
     */

    public function setPaperType($paperType)
    {
        $this->paperType = $paperType;

        return $this;
    }

    /**
     * Get paperType
     *
     * @return \Beon\IntranetBundle\Entity\EnumValue
     */
    public function getPaperType()
    {
        return $this->paperType;
    }

    /**
     * Set graphicsFormat
     *
     * @param \Beon\IntranetBundle\Entity\EnumValue $graphicsFormat
     * @return Task
     */

    public function setGraphicsFormat($graphicsFormat)
    {
        $this->graphicsFormat = $graphicsFormat;

        return $this;
    }

   /**
     * Get graphicsFormat
     *
     * @return \Beon\IntranetBundle\Entity\EnumValue
     */

    public function getGraphicsFormat()
    {
        return $this->graphicsFormat;
    }

    /**
     * Set graphicsCirculation
     *
     * @param \Beon\IntranetBundle\Entity\EnumValue $graphicsCirculation
     * @return Task
     */
    public function setGraphicsCirculation($graphicsCirculation)
    {
        $this->graphicsCirculation = $graphicsCirculation;

        return $this;
    }

    /**
     * Get graphicsCirculation
     *
     * @return \Beon\IntranetBundle\Entity\EnumValue
     */
    public function getGraphicsCirculation()
    {
        return $this->graphicsCirculation;
    }


    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $uploads;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->uploads = new \Doctrine\Common\Collections\ArrayCollection();
        $this->approvalReminderDelay = TaskApprovalReminderDelayEnum::getChoice(TaskApprovalReminderDelayEnum::DEFAULT_DELAY);
    }

    /**
     * Add uploads
     *
     * @param \Beon\IntranetBundle\Entity\Upload $uploads
     * @return Task
     */
    public function addUpload(\Beon\IntranetBundle\Entity\Upload $uploads)
    {
        $this->uploads[] = $uploads;

        return $this;
    }

    /**
     * Remove uploads
     *
     * @param \Beon\IntranetBundle\Entity\Upload $uploads
     */
    public function removeUpload(\Beon\IntranetBundle\Entity\Upload $uploads)
    {
        $this->uploads->removeElement($uploads);
    }

    /**
     * Get uploads
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUploads()
    {
        return $this->uploads;
    }

    /**
     * @var \Beon\IntranetBundle\Entity\Complaint
     */
    private $complaint;


    /**
     * Set complaint
     *
     * @param \Beon\IntranetBundle\Entity\Complaint $complaint
     * @return Task
     */
    public function setComplaint(\Beon\IntranetBundle\Entity\Complaint $complaint = null)
    {
        $this->complaint = $complaint;

        return $this;
    }

    /**
     * Get complaint
     *
     * @return \Beon\IntranetBundle\Entity\Complaint
     */
    public function getComplaint()
    {
        return $this->complaint;
    }

    /**
     * Set pressrelease
     *
     * @param \Beon\IntranetBundle\Entity\Pressrelease $pressrelease
     * @return Note
     */
    public function setPressrelease(\Beon\IntranetBundle\Entity\Pressrelease $pressrelease = null)
    {
        $this->pressrelease = $pressrelease;

        return $this;
    }

    /**
     * Get pressrelease
     *
     * @return \Beon\IntranetBundle\Entity\Pressrelease
     */
    public function getPressrelease()
    {
        return $this->pressrelease;
    }

    public function getAttachedRecords()
    {
        $ret = array();
        if ($this->getCustomer()) {
            $ret[CustomerLevelEnum::getTitle($this->getCustomer()->getLevel())] = $this->getCustomer()->getName();
        }
        if ($this->getCampaign()) {
            $ret['Campaign'] = $this->getCampaign();
        }
        if ($this->getComplaint()) {
            $ret['Complaint'] = $this->getComplaint();
        }
        if ($this->getPressrelease()) {
            $ret['Press release'] = $this->getPressrelease();
        }

        return $ret;
    }

    /**
     * Add notes
     *
     * @param \Beon\IntranetBundle\Entity\Note $notes
     * @return Pressrelease
     */
    public function addNote(\Beon\IntranetBundle\Entity\Note $notes)
    {
        $notes->setTask($this);
        $this->notes[] = $notes;

        return $this;
    }

    /**
     * Remove notes
     *
     * @param \Beon\IntranetBundle\Entity\Note $notes
     */
    public function removeNote(\Beon\IntranetBundle\Entity\Note $notes)
    {
        $this->notes->removeElement($notes);
    }

    /**
     * Get notes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @return boolean
     */
    public function getApprovalmailsent()
    {
        return $this->approvalmailsent;
    }

    /**
     * @param boolean $approvalmailsent
     */
    public function setApprovalmailsent($approvalmailsent)
    {
        $this->approvalmailsent = $approvalmailsent;
    }

    /**
     * @return boolean
     */
    public function getInternalapprovalmailsent()
    {
        return $this->internalapprovalmailsent;
    }

    /**
     * @param boolean $approvalmailsent
     */
    public function setInternalapprovalmailsent($internalapprovalmailsent)
    {
        $this->internalapprovalmailsent = $internalapprovalmailsent;
    }

    /**
     * @return boolean
     */
    public function getApproved()
    {
        return $this->approved;
    }

    /**
     * @param boolean $approved
     */
    public function setApproved($approved)
    {
        $this->approved = $approved;
    }


    /**
     * Set approvementSender
     *
     * @param \Beon\IntranetBundle\Entity\User $approvementSender
     * @return Task
     */
    public function setApprovementSender(\Beon\IntranetBundle\Entity\User $approvementSender = null)
    {
        $this->approvementSender = $approvementSender;

        return $this;
    }

    /**
     * Get approvementSender
     *
     * @return \Beon\IntranetBundle\Entity\User
     */
    public function getApprovementSender()
    {
        return $this->approvementSender;
    }


    /**
     * Set internalApprovementSender
     *
     * @param \Beon\IntranetBundle\Entity\User $approvementSender
     * @return Task
     */
    public function setInternalApprovementSender(\Beon\IntranetBundle\Entity\User $internalApprovementSender = null)
    {
        $this->internalApprovementSender = $internalApprovementSender;

        return $this;
    }

    /**
     * Get internalApprovementSender
     *
     * @return \Beon\IntranetBundle\Entity\User
     */
    public function getInternalApprovementSender()
    {
        return $this->internalApprovementSender;
    }


    /**
     * Set approvedBy
     *
     * @param \Beon\IntranetBundle\Entity\User $approvedBy
     * @return Pressrelease
     */
    public function setApprovedBy(\Beon\IntranetBundle\Entity\User $approvedBy = null)
    {
        $this->approvedBy = $approvedBy;

        return $this;
    }

    /**
     * Get approvedBy
     *
     * @return \Beon\IntranetBundle\Entity\User
     */
    public function getApprovedBy()
    {
        return $this->approvedBy;
    }

    /**
     * @return \DateTime
     */
    public function getApprovedAt()
    {
        return $this->approvedAt;
    }

    /**
     * @param \DateTime $approvedAt
     */
    public function setApprovedAt($approvedAt)
    {
        $this->approvedAt = $approvedAt;
    }

    /**
     * @var string
     */
    private $orderReference;


    /**
     * Set orderReference
     *
     * @param string $orderReference
     * @return Task
     */
    public function setOrderReference($orderReference)
    {
        $this->orderReference = $orderReference;

        return $this;
    }

    /**
     * Get orderReference
     *
     * @return string
     */
    public function getOrderReference()
    {
        return $this->orderReference;
    }

    function __toString()
    {
        return sprintf('AG%05d %s', $this->getId(), $this->getTitle());
    }

    /**
     * @return int
     */
    public function getPrintSpeed()
    {
        return $this->printSpeed;
    }

    /**
     * @param int $printSpeed
     */
    public function setPrintSpeed($printSpeed)
    {
        $this->printSpeed = $printSpeed;
    }

    /**
     * @return boolean
     */
    public function getNewDesign()
    {
        return $this->newDesign;
    }

    /**
     * @param boolean $newDesign
     */
    public function setNewDesign($newDesign)
    {
        $this->newDesign = $newDesign;
    }

    /**
     * @return boolean
     */
    public function getExpedited()
    {
        return $this->expedited;
    }

    /**
     * @param boolean $expedited
     */
    public function setExpedited($expedited)
    {
        $this->expedited = $expedited;
    }

    /**
     * @return string
     */
    public function getInvoiceAddress()
    {
        return $this->invoiceAddress;
    }

    /**
     * @param string $invoiceAddress
     */
    public function setInvoiceAddress($invoiceAddress)
    {
        $this->invoiceAddress = $invoiceAddress;
    }

    /**
     * @return string
     */
    public function getDeliveryAddress()
    {
        return $this->deliveryAddress;
    }

    /**
     * @param string $deliveryAddress
     */
    public function setDeliveryAddress($deliveryAddress)
    {
        $this->deliveryAddress = $deliveryAddress;
    }

    /**
     * @return int
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * @param int $paymentMethod
     */
    public function setPaymentMethod($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
    }

    /**
     * @return Task
     */
    public function getDuplicateOf()
    {
        return $this->duplicateOf;
    }

    /**
     * @param Task $duplicateOf
     */
    public function setDuplicateOf($duplicateOf)
    {
        $this->duplicateOf = $duplicateOf;
    }

    public function resetState() {
        $this->setStatus(TaskStatusEnum::NOT_STARTED);
        $this->setApprovalmailsent(false);
        $this->setInternalapprovalmailsent(false);
        $this->setApproved(false);
        $this->setApprovementSender(null);
        $this->setInternalApprovementSender(null);
        $this->setApprovedBy(null);
        $this->setApprovedAt(null);
    }

    /**
     * Set createdBy
     *
     * @param \Beon\IntranetBundle\Entity\User $createdBy
     * @return Task
     */
    public function setCreatedBy(\Beon\IntranetBundle\Entity\User $createdBy = null)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return \Beon\IntranetBundle\Entity\User
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $timetrackings;


    /**
     * Add timetrackings
     *
     * @param \Beon\IntranetBundle\Entity\Timetracking $timetrackings
     * @return Task
     */
    public function addTimetracking(\Beon\IntranetBundle\Entity\Timetracking $timetrackings)
    {
        $this->timetrackings[] = $timetrackings;

        return $this;
    }

    /**
     * Remove timetrackings
     *
     * @param \Beon\IntranetBundle\Entity\Timetracking $timetrackings
     */
    public function removeTimetracking(\Beon\IntranetBundle\Entity\Timetracking $timetrackings)
    {
        $this->timetrackings->removeElement($timetrackings);
    }

    /**
     * Get timetrackings
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTimetrackings()
    {
        return $this->timetrackings;
    }
    /**
     * @var string
     */
    private $title;


    /**
     * Set title
     *
     * @param string $title
     * @return Task
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }
    /**
     * @var \DateTime
     */
    private $createdAt;


    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Task
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
    /**
     * @var \DateTime
     */
    private $lastApprovalMailSentAt;

    /**
     * @var string
     */
    private $serializedApprovalMail;


    /**
     * Set lastApprovalMailSentAt
     *
     * @param \DateTime $lastApprovalMailSentAt
     * @return Task
     */
    public function setLastApprovalMailSentAt($lastApprovalMailSentAt)
    {
        $this->lastApprovalMailSentAt = $lastApprovalMailSentAt;

        return $this;
    }

    /**
     * Get lastApprovalMailSentAt
     *
     * @return \DateTime
     */
    public function getLastApprovalMailSentAt()
    {
        return $this->lastApprovalMailSentAt;
    }

    /**
     * Set serializedApprovalMail
     *
     * @param string $serializedApprovalMail
     * @return Task
     */
    public function setSerializedApprovalMail($serializedApprovalMail)
    {
        $this->serializedApprovalMail = $serializedApprovalMail;

        return $this;
    }

    /**
     * Get serializedApprovalMail
     *
     * @return string
     */
    public function getSerializedApprovalMail()
    {
        return $this->serializedApprovalMail;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */

    private $logs;


    /**
     * Add logs
     *
     * @param \Beon\IntranetBundle\Entity\Log $logs
     * @return Task
     */
    public function addLog(\Beon\IntranetBundle\Entity\Log $logs)
    {
        $this->logs[] = $logs;

        return $this;
    }

    /**
     * Remove logs
     *
     * @param \Beon\IntranetBundle\Entity\Log $logs
     */
    public function removeLog(\Beon\IntranetBundle\Entity\Log $logs)
    {
        $this->logs->removeElement($logs);
    }

    /**
     * Get logs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLogs()
    {
        return $this->logs;
    }


    /**
     * Get status for submitting files
     *
     * @return boolean
     */
    public function getSubmitFilesStatus()
    {
        if ( $this->getCampaign() && ($contact = $this->getCampaign()->getContact())
                && $this->getApproved()
                && $this->getType() == TaskTypeEnum::GRAPHICS
                && $contact->getEmail() )
        {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Set carbonCopy
     *
     * @param \Beon\IntranetBundle\Entity\User $carbonCopy
     * @return Task
     */
    public function setCarbonCopy(\Beon\IntranetBundle\Entity\User $carbonCopy = null)
    {
        $this->carbonCopy = $carbonCopy;

        return $this;
    }

    /**
     * Get carbonCopy
     *
     * @return \Beon\IntranetBundle\Entity\User 
     */
    public function getCarbonCopy()
    {
        return $this->carbonCopy;
    }


    /**
     * Set approvalReminderDelay
     *
     * @param \Beon\IntranetBundle\Entity\EnumValue $approvalReminderDelay
     * @return Task
     */
    public function setApprovalReminderDelay(\Beon\IntranetBundle\Entity\EnumValue $approvalReminderDelay)
    {
        $this->approvalReminderDelay = $approvalReminderDelay;

        return $this;
    }

    /**
     * Get approvalReminderDelay
     *
     * @return \Beon\IntranetBundle\Entity\EnumValue 
     */
    public function getApprovalReminderDelay()
    {
        return $this->approvalReminderDelay;
    }

    /**
     * Set firstApprovalMailSentAt
     *
     * @param \DateTime $firstApprovalMailSentAt
     * @return Task
     */
    public function setFirstApprovalMailSentAt($firstApprovalMailSentAt)
    {
        $this->firstApprovalMailSentAt = $firstApprovalMailSentAt;

        return $this;
    }

    /**
     * Get firstApprovalMailSentAt
     *
     * @return \DateTime 
     */
    public function getFirstApprovalMailSentAt()
    {
        return $this->firstApprovalMailSentAt;
    }
}
