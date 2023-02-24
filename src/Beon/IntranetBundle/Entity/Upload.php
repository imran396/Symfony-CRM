<?php

namespace Beon\IntranetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Translation\Tests\String;
use Beon\IntranetBundle\Enums\TaskTypeEnum;

/**
 * Upload
 */
class Upload
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $filename;

    /**
     * @var String
     */
    private $fsFilename;

    /**
     * @var String
     */
    private $mimeType;

    /**
     * @var integer
     */
    private $size;

    /**
     * @var \DateTime
     */
    private $createdat;

    /**
     * @var \Beon\IntranetBundle\Entity\Note
     */
    private $note;

    /**
     * @var \Beon\IntranetBundle\Entity\Pressrelease
     */
    private $pressrelease;

    /**
     * @var \Beon\IntranetBundle\Entity\Campaign
     */
    private $campaign;
  /**
     * @var \Beon\IntranetBundle\Entity\Customer
     */
    private $customer;


   public function __clone() {
        $this->id = null;
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
     * Set filename
     *
     * @param string $filename
     * @return Upload
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * Get filename
     *
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * @return String
     */
    public function getFsFilename()
    {
        return $this->fsFilename;
    }

    /**
     * @return String
     */
    public function getMimeType()
    {
        return $this->mimeType;
    }

    /**
     * @param String $mimeType
     */
    public function setMimeType($mimeType)
    {
        $this->mimeType = $mimeType;
    }


    /**
     * @param String $fsFilename
     */
    public function setFsFilename($fsFilename)
    {
        $this->fsFilename = $fsFilename;
    }

    /**
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param int $size
     */
    public function setSize($size)
    {
        $this->size = $size;
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
     * Set note
     *
     * @param \Beon\IntranetBundle\Entity\Note $note
     * @return Upload
     */
    public function setNote(\Beon\IntranetBundle\Entity\Note $note = null)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return \Beon\IntranetBundle\Entity\Note
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set pressrelease
     *
     * @param \Beon\IntranetBundle\Entity\Pressrelease $pressrelease
     * @return Upload
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
     * @return Upload
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

    function __construct()
    {
        if (!isset($this->createdat)) {
            $this->createdat = new \DateTime();
        }
    }



    /**
     * Set createdat
     *
     * @param \DateTime $createdat
     * @return Upload
     */
    public function setCreatedat($createdat)
    {
        $this->createdat = $createdat;

        return $this;
    }
    /**
     * @var \Beon\IntranetBundle\Entity\Supplier
     */
    private $supplier;

    /**
     * @var \Beon\IntranetBundle\Entity\SupplierGroup
     */
    private $supplierGroup;


    /**
     * Set supplier
     *
     * @param \Beon\IntranetBundle\Entity\Supplier $supplier
     * @return Upload
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
     * Set supplierGroup
     *
     * @param \Beon\IntranetBundle\Entity\SupplierGroup $supplierGroup
     * @return Upload
     */
    public function setSupplierGroup(\Beon\IntranetBundle\Entity\SupplierGroup $supplierGroup = null)
    {
        $this->supplierGroup = $supplierGroup;

        return $this;
    }

    /**
     * Get supplierGroup
     *
     * @return \Beon\IntranetBundle\Entity\SupplierGroup
     */
    public function getSupplierGroup()
    {
        return $this->supplierGroup;
    }
    /**
     * @var \Beon\IntranetBundle\Entity\Task
     */
    private $task;


    /**
     * Set task
     *
     * @param \Beon\IntranetBundle\Entity\Task $task
     * @return Upload
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

    /**
     * @return \Beon\IntranetBundle\Entity\Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param \Beon\IntranetBundle\Entity\Customer $customer
     */
    public function setCustomer(\Beon\IntranetBundle\Entity\Customer $customer)
    {
        $this->customer = $customer;
        return $this;
    }

    /**
     * @var boolean
     */
    private $isInvoice = false;


    /**
     * Set isInvoice
     *
     * @param boolean $isInvoice
     * @return Upload
     */
    public function setIsInvoice($isInvoice)
    {
        $this->isInvoice = $isInvoice;

        return $this;
    }

    /**
     * Get isInvoice
     *
     * @return boolean
     */
    public function getIsInvoice()
    {
        return $this->isInvoice;
    }

    /**
     * @var boolean
     */
    private $groupFlag41 = false;

    /**
     * @var boolean
     */
    private $groupFlag42 = false;


    /**
     * Set groupFlag41
     *
     * @param boolean $groupFlag41
     * @return Upload
     */
    public function setGroupFlag41($groupFlag41)
    {
        $this->groupFlag41 = $groupFlag41;

        return $this;
    }

    /**
     * Get groupFlag41
     *
     * @return boolean
     */
    public function getGroupFlag41()
    {
        return $this->groupFlag41;
    }

    /**
     * Set groupFlag42
     *
     * @param boolean $groupFlag42
     * @return Upload
     */
    public function setGroupFlag42($groupFlag42)
    {
        $this->groupFlag42 = $groupFlag42;

        return $this;
    }

    /**
     * Get groupFlag42
     *
     * @return boolean
     */
    public function getGroupFlag42()
    {
        return $this->groupFlag42;
    }

    public function getTagColor() {
        if ($this->submitFlag) {
            return 'blue';
        } else if (!$this->task || $this->task->getType() != TaskTypeEnum::GRAPHICS) {
            return null;
        } else if ($this->groupFlag42) {
            return 'green';
        } else if ($this->groupFlag41) {
            return 'yellow';
        } else {
            return 'grey';
        }
    }

    /**
    * @var boolean
    */
    private $submitFlag = false;
    
    /**
    * Set submitFlag
    *
    * @param boolean $submitFlag
    * @return Upload
    */
    public function setSubmitFlag($submitFlag) {
        $this->submitFlag = $submitFlag;
        return $this;
    }
    /**
    * Get submitFlag
    *
    * @return boolean
    */
    public function getSubmitFlag() {
        return $this->submitFlag;
    }
}
