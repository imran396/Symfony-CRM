<?php

namespace Beon\IntranetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Supplier
 */
class Supplier implements \JsonSerializable
{

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var integer
     */
    private $audiencesize;

    /**
     * @var integer
     */
    private $frequency;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $contacts;

    /**
     * @var integer
     */
    private $supplierType;

     /**
     * @var integer
     */
    private  $pagesizeWidth;

     /**
     * @var integer
     */
    private  $pagesizeHeight;

    /**
     * @var string
     */

    private $typeOther;

    /**
     * Constructor
     */

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $campaigns;



    public function __construct()
    {
        $this->contacts = new \Doctrine\Common\Collections\ArrayCollection();
        $this->campaigns = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Supplier
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set audiencesize
     *
     * @param integer $audiencesize
     * @return Supplier
     */
    public function setAudiencesize($audiencesize)
    {
        $this->audiencesize = $audiencesize;

        return $this;
    }

    /**
     * Get audiencesize
     *
     * @return integer
     */
    public function getAudiencesize()
    {
        return $this->audiencesize;
    }

    /**
     * Set contactname
     *
     * @param string $contactname
     * @return Supplier
     */
    public function setContactname($contactname)
    {
        $this->contactname = $contactname;

        return $this;
    }

    /**
     * Get contactname
     *
     * @return string
     */
    public function getContactname()
    {
        return $this->contactname;
    }

    /**
     * Set frequency
     *
     * @param integer
     * @return Supplier
     */

    public function setFrequency($frequency)
    {
        $this->frequency = $frequency;


        return $this;
    }

    /**
     * Get frequency
     *
     * @return integer <strong>Supplier::FREQUENCY_NONE|FREQUENCY_DAILY|
     * FREQUENCY_WEEKLY|FREQUENCY_BIWEEKLY|FREQUENCY_MONTHLY|FREQUENCY_YEARLY|FREQUENCY_OTHER</strong>
     */
    public function getFrequency()
    {
        return $this->frequency;
    }

    /**
     * Add contacts
     *
     * @param \Beon\IntranetBundle\Entity\Contact $contacts
     * @return Supplier
     */
    public function addContact(\Beon\IntranetBundle\Entity\Contact $contacts)
    {

        $this->contacts[] = $contacts;

        return $this;
    }

    /**
     * Remove contacts
     *
     * @param \Beon\IntranetBundle\Entity\Contact $contacts
     */
    public function removeContact(\Beon\IntranetBundle\Entity\Contact $contacts)
    {
        $this->contacts->removeElement($contacts);
    }

    /**
     * Get contacts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContacts()
    {
        return $this->contacts;
    }

    /**
     * Set supplierType
     *
     * @param integer
     * @return Supplier
     */
    public function setSupplierType($supplierType)
    {
        $this->supplierType = $supplierType;

        return $this;
    }

    /**
     * Get supplierType
     *
     * @return integer
     */
    public function getSupplierType()
    {
        return $this->supplierType;
    }

    function __toString()
    {
        return sprintf('PD%05d %s', $this->getId(), $this->getName());
    }

    /**
     * (PHP 5 &gt;= 5.4.0)<br/>
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     */
    public function jsonSerialize()
    {
        $contact_ids = array();
        foreach ($this->getContacts() as $contact) {
            $contact_ids[] = $contact->getId();
        }
        return array(
            'audiencesize' => $this->audiencesize,
            'type' => $this->getSupplierType()->getId(),
            'contacts' => $contact_ids
        );
    }

    /**
     * @return string
     */
    public function getTypeOther()
    {
        return $this->typeOther;
    }

    /**
     * @param string $typeOther
     */
    public function setTypeOther($typeOther)
    {
        $this->typeOther = $typeOther;
    }


    /**
     * @var \Beon\IntranetBundle\Entity\SupplierGroup
     */
    private $group;


    /**
     * Set group
     *
     * @param \Beon\IntranetBundle\Entity\SupplierGroup $group
     * @return Supplier
     */
    public function setGroup(\Beon\IntranetBundle\Entity\SupplierGroup $group = null)
    {
        $this->group = $group;

        return $this;
    }

    /**
     * Get group
     *
     * @return \Beon\IntranetBundle\Entity\SupplierGroup 
     */
    public function getGroup()
    {
        return $this->group;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $uploads;


    /**
     * Add uploads
     *
     * @param \Beon\IntranetBundle\Entity\Upload $uploads
     * @return Supplier
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
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCampaigns()
    {
        return $this->campaigns;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $campaigns
     */
    public function setCampaigns($campaigns)
    {
        $this->campaigns = $campaigns;
    }

    private $city;

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity(\Beon\IntranetBundle\Entity\City $city = null)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return int
     */
    public function getPagesizeWidth()
    {
        return $this->pagesizeWidth;
    }

    /**
     * @param int $pagesizeW
     */
    public function setPagesizeWidth($pagesizeW)
    {
        $this->pagesizeWidth = $pagesizeW;
    }

    /**
     * @return int
     */
    public function getPagesizeHeight()
    {
        return $this->pagesizeHeight;
    }

    /**
     * @param int $pagesizeH
     */
    public function setPagesizeHeight($pagesizeH)
    {
        $this->pagesizeHeight = $pagesizeH;
    }

    /**
     * Add campaigns
     *
     * @param \Beon\IntranetBundle\Entity\Campaign $campaigns
     * @return Supplier
     */
    public function addCampaign(\Beon\IntranetBundle\Entity\Campaign $campaigns)
    {
        $this->campaigns[] = $campaigns;

        return $this;
    }

    /**
     * Remove campaigns
     *
     * @param \Beon\IntranetBundle\Entity\Campaign $campaigns
     */
    public function removeCampaign(\Beon\IntranetBundle\Entity\Campaign $campaigns)
    {
        $this->campaigns->removeElement($campaigns);
    }
}
