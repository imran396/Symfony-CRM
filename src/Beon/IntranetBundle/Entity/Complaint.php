<?php

namespace Beon\IntranetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Complaint
 */
class Complaint
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $subject;

    /**
     * @var string
     */
    private $body;

    /**
     * @var \Beon\IntranetBundle\Entity\EnumValue
     */

    private $channel;

    /**
     * @var \DateTime
     */
    private $outletReceivedAt;

    /**
     * @var \DateTime
     */
    private $beonReceivedAt;

    /**
     * @var string
     */
    private $proposal;

    /**
     * @var \DateTime
     */
    private $respondedAt;

    /**
     * @var \DateTime
     */
    private $notifiedAt;

    /**
     * @var \DateTime
     */
    private $resolutiondAt;

    /**
     * @var integer
     */
    private $status;

    /**
     * @var integer
     */
    private $resolution;

    /**
     * @var \Beon\IntranetBundle\Entity\User
     */
    protected $user;

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
     * Set subject
     *
     * @param string $sublect
     * @return Complaint
     */
    public function setSubject($sublect)
    {
        $this->subject = $sublect;

        return $this;
    }

    /**
     * Get subject
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set body
     *
     * @param string $body
     * @return Complaint
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

   /**
     * Set graphicsFormat
     *
     * @param \Beon\IntranetBundle\Entity\EnumValue $channel
     * @return Task
     */
    public function setChannel($channel)
    {
        $this->channel = $channel;

        return $this;
    }

    /**
     * Get graphicsType
     *
     * @return \Beon\IntranetBundle\Entity\EnumValue
     */

    public function getChannel()
    {
        return $this->channel;
    }

    /**
     * Set outletReceivedAt
     *
     * @param \DateTime $outletReceivedAt
     * @return Complaint
     */
    public function setOutletReceivedAt($outletReceivedAt)
    {
        $this->outletReceivedAt = $outletReceivedAt;

        return $this;
    }

    /**
     * Get outletReceivedAt
     *
     * @return \DateTime
     */
    public function getOutletReceivedAt()
    {
        return $this->outletReceivedAt;
    }

    /**
     * Set beonReceivedAt
     *
     * @param \DateTime $beonReceivedAt
     * @return Complaint
     */
    public function setBeonReceivedAt($beonReceivedAt)
    {
        $this->beonReceivedAt = $beonReceivedAt;

        return $this;
    }

    /**
     * Get beonReceivedAt
     *
     * @return \DateTime
     */
    public function getBeonReceivedAt()
    {
        return $this->beonReceivedAt;
    }

    /**
     * Set respondedAt
     *
     * @param \DateTime $respondedAt
     * @return Complaint
     */
    public function setRespondedAt($respondedAt)
    {
        $this->respondedAt = $respondedAt;

        return $this;
    }

    /**
     * Get respondedAt
     *
     * @return \DateTime
     */
    public function getRespondedAt()
    {
        return $this->respondedAt;
    }

    /**
     * @var \Beon\IntranetBundle\Entity\Customer
     */
    private $customer;


    /**
     * Set customer
     *
     * @param \Beon\IntranetBundle\Entity\Customer $customer
     * @return Complaint
     */
    public function setCustomer(\Beon\IntranetBundle\Entity\Customer $customer)
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
        return sprintf('RX%05d %s', $this->getId(), $this->subject);
    }

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $notes;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $tasks;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->notes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tasks = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add notes
     *
     * @param \Beon\IntranetBundle\Entity\Note $notes
     * @return Complaint
     */
    public function addNote(\Beon\IntranetBundle\Entity\Note $notes)
    {
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
     * Add tasks
     *
     * @param \Beon\IntranetBundle\Entity\Task $tasks
     * @return Complaint
     */
    public function addTask(\Beon\IntranetBundle\Entity\Task $tasks)
    {
        $this->tasks[] = $tasks;

        return $this;
    }

    /**
     * Remove tasks
     *
     * @param \Beon\IntranetBundle\Entity\Task $tasks
     */
    public function removeTask(\Beon\IntranetBundle\Entity\Task $tasks)
    {
        $this->tasks->removeElement($tasks);
    }

    /**
     * Get tasks
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTasks()
    {
        return $this->tasks;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
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
     * @return int
     */
    public function getResolution()
    {
        return $this->resolution;
    }

    /**
     * @param int $resolution
     */
    public function setResolution($resolution)
    {
        $this->resolution = $resolution;
    }

    /**
     * @return string
     */
    public function getProposal()
    {
        return $this->proposal;
    }

    /**
     * @param string $proposal
     */
    public function setProposal($proposal)
    {
        $this->proposal = $proposal;
    }

    /**
     * @return \DateTime
     */
    public function getNotifiedAt()
    {
        return $this->notifiedAt;
    }

    /**
     * @param \DateTime $notifiedAt
     */
    public function setNotifiedAt($notifiedAt)
    {
        $this->notifiedAt = $notifiedAt;
    }

    /**
     * @return \DateTime
     */
    public function getResolutiondAt()
    {
        return $this->resolutiondAt;
    }

    /**
     * @param \DateTime $resolutiondAt
     */
    public function setResolutiondAt($resolutiondAt)
    {
        $this->resolutiondAt = $resolutiondAt;
    }
}
