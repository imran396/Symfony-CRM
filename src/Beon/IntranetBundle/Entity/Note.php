<?php

namespace Beon\IntranetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;
use Beon\IntranetBundle\Enums\NoteTypeEnum;
use Beon\IntranetBundle\Enums\TaskTypeEnum;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Note
 */
class Note
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Beon\IntranetBundle\Entity\EnumValue
     */
    private $type;

    /**
     * @var string
     */
    private $text;

    /**
     * @var \DateTime
     */
    private $createdat;

    /**
     * @var \DateTime
     */
    private $date1;

    /**
     * @var \DateTime
     */
    private $date2;

    /**
     * @var \Beon\IntranetBundle\Entity\User
     */
    private $user;

    /**
     * @var \Beon\IntranetBundle\Entity\Customer
     */
    private $customer;

    /**
     * @var \Beon\IntranetBundle\Entity\Task
     */

    private $task;

     /**
     * @var boolean
     */

    private $internalUseOnly = false;

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
     * Set text
     *
     * @param string $text
     * @return Note
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
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
     * Set user
     *
     * @param \Beon\IntranetBundle\Entity\User $user
     * @return User
     */
    public function setUser(\Beon\IntranetBundle\Entity\User $user = null)
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
     * @return Note
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $uploads;

    /**
     * @var \Beon\IntranetBundle\Entity\Pressrelease
     */
    private $pressrelease;

    /**
     * @var \Beon\IntranetBundle\Entity\Campaign
     */
    private $campaign;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->createdat = new \DateTime();
        $this->uploads = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add uploads
     *
     * @param \Beon\IntranetBundle\Entity\Upload $uploads
     * @return Note
     */
    public function addUpload(\Beon\IntranetBundle\Entity\Upload $uploads)
    {
        $uploads->setNote($this);
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

    public function __toString()
    {
        return $this->text;
    }

    /**
     * @param \DateTime $createdat
     */
    public function setCreatedat($createdat)
    {
        $this->createdat = $createdat;
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

    /**
     * Set campaign
     *
     * @param \Beon\IntranetBundle\Entity\Campaign $campaign
     * @return Note
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
     * @var \Beon\IntranetBundle\Entity\Complaint
     */
    private $complaint;


    /**
     * Set complaint
     *
     * @param \Beon\IntranetBundle\Entity\Complaint $complaint
     * @return Note
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
     * @return \Beon\IntranetBundle\Entity\Task
     */
    public function getTask()
    {
        return $this->task;
    }

    /**
     * @param \Beon\IntranetBundle\Entity\Task $task
     */
    public function setTask($task)
    {
        $this->task = $task;
        if (!$this->getType() && $task->getType() == TaskTypeEnum::GRAPHICS) {
            $this->setType(NoteTypeEnum::getChoice(NoteTypeEnum::GRAPHICS));
        }
        return $this;
    }

    /**
     * @return boolean
     */
    public function getInternalUseOnly()
    {
        return $this->internalUseOnly;
    }

    /**
     * @param boolean $internalUseOnly
     */
    public function setInternalUseOnly($internalUseOnly)
    {
        $this->internalUseOnly = $internalUseOnly;
        return $this;
    }
    /**
     * @var \Beon\IntranetBundle\Entity\MonitoredUrl
     */
    private $monitoredurl;


    /**
     * Set monitoredurl
     *
     * @param \Beon\IntranetBundle\Entity\MonitoredUrl $monitoredurl
     * @return Note
     */
    public function setMonitoredurl(\Beon\IntranetBundle\Entity\MonitoredUrl $monitoredurl = null)
    {
        $this->monitoredurl = $monitoredurl;

        return $this;
    }

    /**
     * Get monitoredurl
     *
     * @return \Beon\IntranetBundle\Entity\MonitoredUrl 
     */
    public function getMonitoredurl()
    {
        return $this->monitoredurl;
    }

    /**
     * Set type
     *
     * @param \Beon\IntranetBundle\Entity\EnumValue $type
     * @return Note
     */
    public function setType(\Beon\IntranetBundle\Entity\EnumValue $type = null)
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
     * Set date1
     *
     * @param \DateTime $date1
     * @return Note
     */
    public function setDate1($date1)
    {
        $this->date1 = $date1;

        return $this;
    }

    /**
     * Get date1
     *
     * @return \DateTime 
     */
    public function getDate1()
    {
        return $this->date1;
    }

    /**
     * Set date2
     *
     * @param \DateTime $date2
     * @return Note
     */
    public function setDate2($date2)
    {
        $this->date2 = $date2;

        return $this;
    }

    /**
     * Get date2
     *
     * @return \DateTime 
     */
    public function getDate2()
    {
        return $this->date2;
    }

    public function validate(ExecutionContextInterface $context)
    {
        if ($this->getType() && !$this->getDate1() && in_array($this->getType()->getId(), NoteTypeEnum::getSpecialTypes())) {
            $context->buildViolation('Required!')
                ->atPath('date1')
                ->addViolation();
        }
    }
    /**
     * @var \Beon\IntranetBundle\Entity\Supplier
     */
    private $supplier;


    /**
     * Set supplier
     *
     * @param \Beon\IntranetBundle\Entity\Supplier $supplier
     * @return Note
     */
    public function setSupplier(\Beon\IntranetBundle\Entity\Supplier $supplier = null)
    {
        $this->supplier = $supplier;

        return $this;
    }

    /**
     * Get supplier
     *
     * @return \Beon\IntranetBundle\Entity\Supplier 
     */
    public function getSupplier()
    {
        return $this->supplier;
    }
}
