<?php

namespace Beon\IntranetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MonitoredUrl
 */
class MonitoredUrl
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $url;

    /**
     * @var \DateTime
     */
    private $lastCheck;

    /**
     * @var \Beon\IntranetBundle\Entity\Customer
     */
    private $customer;

    /**
     * @var boolean
     */
    private $isOwnWebsite = false;

    function __toString()
    {
        return $this->getUrl();
    }
    
    public function __construct() {
        $this->lastCheck = new \DateTime();
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
     * Set url
     *
     * @param string $url
     * @return MonitoredUrl
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set lastCheck
     *
     * @param \DateTime $lastCheck
     * @return MonitoredUrl
     */
    public function setLastCheck($lastCheck)
    {
        $this->lastCheck = $lastCheck;

        return $this;
    }

    /**
     * Get lastCheck
     *
     * @return \DateTime 
     */
    public function getLastCheck()
    {
        return $this->lastCheck;
    }

    /**
     * Set isOwnWebsite
     *
     * @param boolean $isOwnWebsite
     * @return MonitoredUrl
     */
    public function setIsOwnWebsite($isOwnWebsite)
    {
        $this->isOwnWebsite = $isOwnWebsite;

        return $this;
    }

    /**
     * Get isOwnWebsite
     *
     * @return boolean 
     */
    public function getIsOwnWebsite()
    {
        return $this->isOwnWebsite;
    }

    /**
     * Set customer
     *
     * @param \Beon\IntranetBundle\Entity\Customer $customer
     * @return MonitoredUrl
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
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $notes;


    /**
     * Add notes
     *
     * @param \Beon\IntranetBundle\Entity\Note $notes
     * @return MonitoredUrl
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
}
