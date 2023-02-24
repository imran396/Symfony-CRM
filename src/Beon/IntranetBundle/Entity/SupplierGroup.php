<?php

namespace Beon\IntranetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SupplierGroup
 */
class SupplierGroup
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $suppliers;


    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $contacts;

    /**
     * @var boolean
     */
    private  $frameworkContract = false;

    /**
     * @var integer
     */
    private $discount = 0;

    /**
     * @var string
     */
    private $notes;

    /**
     * @var string
     */
    private $bonusInKind;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->suppliers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->contacts = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return SupplierGroup
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
     * Add suppliers
     *
     * @param \Beon\IntranetBundle\Entity\Supplier $suppliers
     * @return SupplierGroup
     */
    public function addSupplier(\Beon\IntranetBundle\Entity\Supplier $suppliers)
    {
        $suppliers->setGroup($this);
        $this->suppliers[] = $suppliers;

        return $this;
    }

    /**
     * Remove suppliers
     *
     * @param \Beon\IntranetBundle\Entity\Supplier $suppliers
     */
    public function removeSupplier(\Beon\IntranetBundle\Entity\Supplier $suppliers)
    {
        $this->suppliers->removeElement($suppliers);
    }

    /**
     * Get suppliers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSuppliers()
    {
        return $this->suppliers;
    }

    function __toString()
    {
        return sprintf('GR%05d %s', $this->getId(), $this->name);
    }

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $uploads;


    /**
     * Add uploads
     *
     * @param \Beon\IntranetBundle\Entity\Upload $uploads
     * @return SupplierGroup
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
     * @return boolean
     */
    public function getFrameworkContract()
    {
        return $this->frameworkContract;
    }

    /**
     * @param boolean $frameworkContract
     */
    public function setFrameworkContract($frameworkContract)
    {
        $this->frameworkContract = $frameworkContract;
    }

    /**
     * @return int
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * @param int $discount
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;
    }

    /**
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param string $notes
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    /**
     * @return string
     */
    public function getBonusInKind()
    {
        return $this->bonusInKind;
    }

    /**
     * @param string $bonusInKind
     */
    public function setBonusInKind($bonusInKind)
    {
        $this->bonusInKind = $bonusInKind;
    }
}
