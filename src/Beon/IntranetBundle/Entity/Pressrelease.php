<?php

namespace Beon\IntranetBundle\Entity;

use Beon\IntranetBundle\Entity\Interfaces\Approvable;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Pressrelease
 */
class Pressrelease implements Approvable
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var boolean
     */
    private $approvalmailsent = false;

    /**
     * @var boolean
     */
    private $approved = false;

    /**
     * @var boolean
     */
    private $deleted = false;

    /**
     * @var boolean
     */

    private $submitted = false;
    /**
     * @var string
     */

    private $title;

    /**
     * @var \DateTime
     */
    private $createdat;

    /**
     * @var \DateTime
     */
    private $approvedAt;

    /**
     * @var \DateTime
     */

    private $approvalMailSentAt;

    /**
     * @var \DateTime
     */

    private $submittedAt;


    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $uploads;

    /**
     * @var \Beon\IntranetBundle\Entity\Customer
     */
    private $customer;

    /**
     * @var \Beon\IntranetBundle\Entity\User
     */
    private $approvedBy;

   /**
     * @var \Beon\IntranetBundle\Entity\User
     */
    protected $user;

    /**
     * @var Pressrelease
     */
    private $duplicateOf;

    /**
     * Constructor
     */
    public function __construct()
    {
        if (!$this->createdat) {
            $this->createdat = new \DateTime();
        }

        $this->uploads = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set approvalmailsent
     *
     * @param boolean $approvalmailsent
     * @return Pressrelease
     */
    public function setApprovalmailsent($approvalmailsent)
    {
        $this->approvalmailsent = $approvalmailsent;

        return $this;
    }

    /**
     * Get approvalmailsent
     *
     * @return boolean
     */
    public function getApprovalmailsent()
    {
        return $this->approvalmailsent;
    }

    /**
     * Set approved
     *
     * @param boolean $approved
     * @return Pressrelease
     */
    public function setApproved($approved)
    {
        $this->approved = $approved;

        return $this;
    }

    /**
     * Get approved
     *
     * @return boolean
     */
    public function getApproved()
    {
        return $this->approved;
    }

    /**
     * Set deleted
     *
     * @param boolean $deleted
     * @return Pressrelease
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;

        return $this;
    }

    /**
     * Get deleted
     *
     * @return boolean
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * Get createdat
     *
     * @return \DateTime
     */
    public function getCreatedat()
    {
        return $this->createdat;
    }

    /**
     * Set approvedAt
     *
     * @param \DateTime $approvedAt
     * @return Pressrelease
     */
    public function setApprovedAt($approvedAt)
    {
        $this->approvedAt = $approvedAt;

        return $this;
    }

    /**
     * Get approvedAt
     *
     * @return \DateTime
     */
    public function getApprovedAt()
    {
        return $this->approvedAt;
    }

    /**
     * Add uploads
     *
     * @param \Beon\IntranetBundle\Entity\Upload $uploads
     * @return Pressrelease
     */
    public function addUpload(\Beon\IntranetBundle\Entity\Upload $uploads)
    {
        $uploads->setPressrelease($this);
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
     * Set customer
     *
     * @param \Beon\IntranetBundle\Entity\Customer $customer
     * @return Pressrelease
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

    function __toString()
    {
        return sprintf('PM%05d %s', $this->getId(), $this->getTitle());
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
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
    public function getApprovalMailSentAt()
    {
        return $this->approvalMailSentAt;
    }

    /**
     * @param \DateTime $approvalMailSentAt
     */
    public function setApprovalMailSentAt($approvalMailSentAt)
    {
        $this->approvalMailSentAt = $approvalMailSentAt;
    }

    /**
     * @return boolean
     */
    public function getSubmitted()
    {
        return $this->submitted;
    }

    /**
     * @param boolean $submitted
     */
    public function setSubmitted($submitted)
    {
        $this->submitted = $submitted;
    }

    /**
     * @return \DateTime
     */
    public function getSubmittedAt()
    {
        return $this->submittedAt;
    }

    /**
     * @param \DateTime $submittedAt
     */
    public function setSubmittedAt($submittedAt)
    {
        $this->submittedAt = $submittedAt;
    }

    /**
     * Set createdat
     *
     * @param \DateTime $createdat
     * @return Pressrelease
     */
    public function setCreatedat($createdat)
    {
        $this->createdat = $createdat;

        return $this;
    }

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $notes;


    private $pressreleasenotes;


    /**
     * Add notes
     *
     * @param \Beon\IntranetBundle\Entity\Note $notes
     * @return Pressrelease
     */
    public function addNote(\Beon\IntranetBundle\Entity\Note $notes)
    {
        $notes->setPressrelease($this);
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $tasks;


    /**
     * Add tasks
     *
     * @param \Beon\IntranetBundle\Entity\Task $tasks
     * @return Pressrelease
     */
    public function addTask(\Beon\IntranetBundle\Entity\Task $tasks)
    {
        $tasks->setPressrelease($this);
        $this->tasks[] = $tasks;

        return $this;
    }

    /**
     * Remove tasks
     *
     * @param \Beon\IntranetBundle\Entity\Task $notes
     */
    public function removeTask(\Beon\IntranetBundle\Entity\Task $tasks)
    {
         $this->tasks->removeElement($tasks);
    }

    /**
     * Get notes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTasks()
    {
        return $this->tasks;
    }

    /**
     * @var \Beon\IntranetBundle\Entity\User
     */
    private $approvementSender;


    /**
     * Set approvementSender
     *
     * @param \Beon\IntranetBundle\Entity\User $approvementSender
     * @return Pressrelease
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
     * @return mixed
     */
    public function getPressreleasenotes()
    {
        return $this->pressreleasenotes;
    }

    /**
     * @param mixed $pressreleasenotes
     */
    public function setPressreleasenotes($pressreleasenotes)
    {
        $this->pressreleasenotes = $pressreleasenotes;
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
     * @return Pressrelease
     */
    public function getDuplicateOf()
    {
        return $this->duplicateOf;
    }

    /**
     * @param Pressrelease $duplicateOf
     */
    public function setDuplicateOf($duplicateOf)
    {
        $this->duplicateOf = $duplicateOf;
    }

    public function resetState() {
        $this->setApprovalmailsent(false);
        $this->setApproved(false);
        $this->setDeleted(false);
        $this->setApprovedAt(null);
        $this->setApprovedBy(null);
        $this->setApprovalMailSentAt(null);
        $this->setSubmitted(false);
        $this->setSubmittedAt(null);
        $this->setApprovementSender(null);
    }
    /**
     * @var \Beon\IntranetBundle\Entity\EnumValue
     */
    private $type;


    /**
     * Set type
     *
     * @param \Beon\IntranetBundle\Entity\EnumValue $type
     * @return Pressrelease
     */
    public function setType(\Beon\IntranetBundle\Entity\EnumValue $type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \Beon\IntranetBundle\Entity\EnumValue 
     */
    public function getType()
    {
        return $this->type;
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
     * @return Pressrelease
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
     * @return Pressrelease
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
     * @var \Beon\IntranetBundle\Entity\Campaign
     */
    private $campaign;


    /**
     * Set campaign
     *
     * @param \Beon\IntranetBundle\Entity\Campaign $campaign
     * @return Pressrelease
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
}
