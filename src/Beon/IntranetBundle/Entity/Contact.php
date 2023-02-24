<?php

namespace Beon\IntranetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contact
 */
class Contact implements \JsonSerializable
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var string
     */
    private $mobile;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $role;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $suppliergroups;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $cities;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $customers;


     /**
     * @var \DateTime
     */
    private $birthday;

    /**
     * @var string
     */

    private $notes;


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
     * Set firstName
     *
     * @param string $firstName
     * @return Contact
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return Contact
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Contact
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set mobile
     *
     * @param string $mobile
     * @return Contact
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * Get mobile
     *
     * @return string
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Contact
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set role
     *
     * @param string $role
     * @return Contact
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $suppliers;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->suppliers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->cities = new \Doctrine\Common\Collections\ArrayCollection();
        $this->suppliergroups = new \Doctrine\Common\Collections\ArrayCollection();
        $this->customers = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add suppliers
     *
      * @param \Beon\IntranetBundle\Entity\Supplier $suppliers
     * @return AccessLevel
     */
    public function addSupplier(\Beon\IntranetBundle\Entity\Supplier $suppliers)
    {
        $this->suppliers[] = $suppliers;

        return $this;
    }

    /**
     * Remove permissions
     *
     * @param \Beon\IntranetBundle\Entity\Supplier $suppliers
     */
    public function removeSupplier(\Beon\IntranetBundle\Entity\Supplier $suppliers)
    {
        $this->suppliers->removeElement($suppliers);
    }

    /**
     * Get permissions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSuppliers()
    {
        return $this->suppliers;
    }

     /**
     * Add supplierGroup
     *
     * @param \Beon\IntranetBundle\Entity\SupplierGroup $suppliergroups
     * @return SupplierGroup
     */
    public function addSupplierGroup(\Beon\IntranetBundle\Entity\SupplierGroup $suppliergroups)
    {
        $this->suppliergroups[] = $suppliergroups;

        return $this;
    }

     /**
     * Remove supplierGroup
     *
     * @param \Beon\IntranetBundle\Entity\SupplierGroup $suppliergroups
     */
    public function removeSupplierGroup(\Beon\IntranetBundle\Entity\SupplierGroup $suppliergroups)
    {
        $this->suppliergroups->removeElement($suppliergroups);
    }

    /**
     * Get permissions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSuppliergroups()
    {
        return $this->suppliergroups;
    }

    /**
     * Add City
     * @param \Beon\IntranetBundle\Entity\City $cities
     * @return City
     */
    public function addCity(\Beon\IntranetBundle\Entity\City $cities)
    {
        $this->cities[] = $cities;

        return $this;
    }

    /**
     * Remove city
     *
    * @param \Beon\IntranetBundle\Entity\City $cities
     */
    public function removeCity(\Beon\IntranetBundle\Entity\City $cities)
    {
        $this->cities->removeElement($cities);
    }

    /**
     * Get permissions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCities()
    {
        return $this->cities;
    }

    function __toString()
    {
        return $this->getfirstName() . ' ' . $this->getLastName();
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
        return array(
            'id' => $this->id,
            'name' => $this->firstName . ' ' . $this->lastName
        );
    }

    /**
     * @return \DateTime
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @param \DateTime $birthday
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
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
     * Add customers
     *
      * @param \Beon\IntranetBundle\Entity\Customer $customers
     * @return Customer
     */
    public function addCustomer(\Beon\IntranetBundle\Entity\Customer $customers)
    {
        $this->customers[] = $customers;

        return $this;
    }

    /**
     * Remove permissions
     *
     * @param \Beon\IntranetBundle\Entity\Supplier $customers
     */
    public function removeCustomer(\Beon\IntranetBundle\Entity\Customer $customers)
    {
        $this->customers->removeElement($customers);
    }

    /**
     * Get customers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCustomers()
    {
        return $this->customers;
    }
}
