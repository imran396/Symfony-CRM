<?php

namespace Beon\IntranetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Timetracking 
 */
class Timetracking
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $user;

    /**
     * @var integer
     */
    private $customer;

    /**
     * @var \Beon\IntranetBundle\Entity\Task
     */
    private $task;

    /**
     * @var \DateTime
     */
    private $day;

    /**
     * @var float
     */
    private $hours;

    /**
     * @var integer
     */
    private $tariff;

    /**
     * @var string
     */
    private $note;


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
     * Set day
     *
     * @param \DateTime $day
     * @return Timetracking 
     */
    public function setDay($day)
    {
        $this->day = $day;

        return $this;
    }

    /**
     * Get day
     *
     * @return \DateTime 
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * Set hours
     *
     * @param float $hours
     * @return Timetracking 
     */
    public function setHours($hours)
    {
        $this->hours = $hours;

        return $this;
    }

    /**
     * Get hours
     *
     * @return float 
     */
    public function getHours()
    {
        return $this->hours;
    }

    /**
     * Set note
     *
     * @param string $note
     * @return Timetracking 
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string 
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set user
     *
     * @param \Beon\IntranetBundle\Entity\User $user
     * @return Timetracking
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
     * Get customer
     *
     * @return \Beon\IntranetBundle\Entity\Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Get parent customer
     *
     * @return \Beon\IntranetBundle\Entity\Customer
     */
    public function getParentCustomer()
    {
        if ($this->customer && $this->customer->getLevel() > 2) {
            return $this->customer->getParent();
        } else {
            return $this->customer;
        }
    }


    /**
     * Set customer
     *
     * @param \Beon\IntranetBundle\Entity\Customer $customer
     * @return Timetracking
     */
    public function setCustomer(\Beon\IntranetBundle\Entity\Customer $customer = null)
    {
        $this->customer = $customer;
        return $this;
    }

    /**
     * Set tariff
     *
     * @param \Beon\IntranetBundle\Entity\EnumValue $tariff
     * @return Timetracking
     */
    public function setTariff($tariff)
    {
        $this->tariff = $tariff;

        return $this;
    }

    /**
     * Get tariff
     *
     * @return \Beon\IntranetBundle\Entity\EnumValue
     */
    public function getTariff()
    {
        return $this->tariff;
    }

    /**
     * Set task
     *
     * @param \Beon\IntranetBundle\Entity\Task $task
     * @return Timetracking
     */
    public function setTask(\Beon\IntranetBundle\Entity\Task $task = null)
    {
        $this->task = $task;

        return $this;
    }

    /**
     * Get task
     *
     * @return \Beon\IntranetBundle\Entity\Task 
     */
    public function getTask()
    {
        return $this->task;
    }

    public function checkConsitency() {
        if ($this->getCampaign()) {
            $this->setCustomer($this->getCampaign()->getCustomer());
            $this->setTask(null);
        } else if ($this->getTask()) {
            if ($this->getTask()->getCustomer()) {
                $this->setCustomer($this->getTask()->getCustomer());
            } else if ($this->getTask()->getCampaign()) {
                $this->setCustomer($this->getTask()->getCampaign()->getCustomer());
            } else if ($this->getTask()->getComplaint()) {
                $this->setCustomer($this->getTask()->getComplaint()->getCustomer());
            } else if ($this->getTask()->getPressrelease()) {
                $this->setCustomer($this->getTask()->getPressrelease()->getCustomer());
            } else {
                $this->setCustomer(null);
            }
        }
    }
    /**
     * @var \Beon\IntranetBundle\Entity\Campaign
     */
    private $campaign;


    /**
     * Set campaign
     *
     * @param \Beon\IntranetBundle\Entity\Campaign $campaign
     * @return Timetracking
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
