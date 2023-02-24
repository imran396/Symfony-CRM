<?php

namespace Beon\IntranetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Log
 */
class Log
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Beon\IntranetBundle\Entity\User
     */
    private $user;

    /**
     * @var integer
     */
    private $action;
	
	/**
     * @var integer
     */

    /**
     * @var \DateTime
     */
    private $createdAt;

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
     * Set action
     *
     * @param integer $action
     * @return Log
     */
    public function setAction($action)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * Get action
     *
     * @return integer 
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Log
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
    
     * @var \Beon\IntranetBundle\Entity\FacebookUrl
    
     */
    
    private $facebookurl;

    
    /**
     * @var \Beon\IntranetBundle\Entity\MonitoredUrl
    
     */
    private $monitoredurl;


    /**
     * @var \Beon\IntranetBundle\Entity\Campaign
     */
    private  $campaign;

    /**
     * @var \Beon\IntranetBundle\Entity\Pressrelease
     */
    private  $pressrelease;

    /**
     * @var \Beon\IntranetBundle\Entity\Task
     */
    private  $task;


    /**
     * @var \Beon\IntranetBundle\Entity\Contact
     */
    private  $contact;


    /**

     * Set facebookurl
    
     *
    
     * @param \Beon\IntranetBundle\Entity\FacebookUrl $facebookurl
    
     * @return Log
    
     */
    
    public function setFacebookurl(\Beon\IntranetBundle\Entity\FacebookUrl $facebookurl = null)
    {
        
         $this->facebookurl = $facebookurl;
         return $this;
   
    }

    
    
    /**
    
     * Get facebookurl
    
     *
    
     * @return \Beon\IntranetBundle\Entity\FacebookUrl 
    
     */
     public function getFacebookurl()
   
     {
        
         return $this->facebookurl;
   
     }

    
     /**
    
      * Set monitoredurl
    
      *
    
      * @param \Beon\IntranetBundle\Entity\MonitoredUrl $monitoredurl
    
      * @return Log
    
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
     * @return \Beon\IntranetBundle\Entity\Campaign
     */
    public function getCampaign()
    {
        return $this->campaign;
    }

    /**
     * @param \Beon\IntranetBundle\Entity\Campaign $campaign
     */
    public function setCampaign($campaign)
    {
        $this->campaign = $campaign;
    }

    /**
     * @return \Beon\IntranetBundle\Entity\Pressrelease
     */
    public function getPressrelease()
    {
        return $this->pressrelease;
    }

    /**
     * @param \Beon\IntranetBundle\Entity\Pressrelease $pressrelease
     */
    public function setPressrelease($pressrelease)
    {
        $this->pressrelease = $pressrelease;
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
    }


    /**
     * @var integer
     */
    private $status;


    /**
     * Set status
     *
     * @param integer $status
     * @return Log
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
     * @return \Beon\IntranetBundle\Entity\Contact
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @param \Beon\IntranetBundle\Entity\Contact $contact
     */
    public function setContact($contact)
    {
        $this->contact = $contact;
    }
    /**
     * @var \Beon\IntranetBundle\Entity\Complaint
     */
    private $complaint;


    /**
     * Set complaint
     *
     * @param \Beon\IntranetBundle\Entity\Complaint $complaint
     * @return Log
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
     * @var \Beon\IntranetBundle\Entity\Supplier
     */
    private $supplier;

    /**
     * @var string
     */
    private $text;

    /**
     * Set supplier
     *
     * @param \Beon\IntranetBundle\Entity\Supplier $supplier
     * @return Log
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

    /**
     * Set text
     *
     * @param string $text
     * @return Log
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
}
