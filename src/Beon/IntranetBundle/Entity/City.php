<?php

namespace Beon\IntranetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * City
 */
class City
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
    private $population;

    /**
     * @var string
     */
    private $notes;

    /**
     * @var string
     */
    private $events;

    /**
     * @var integer
     */
    private $customer;

     /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $suppliers;

     /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $customers;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected  $contacts;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->suppliers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->customers = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return City
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
     * Set population
     *
     * @param integer $population
     * @return City
     */
    public function setPopulation($population)
    {
        $this->population = $population;

        return $this;
    }

    /**
     * Get population
     *
     * @return integer 
     */
    public function getPopulation()
    {
        return $this->population;
    }

    /**
     * Set notes
     *
     * @param string $notes
     * @return City
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get notes
     *
     * @return string 
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set events
     *
     * @param string $events
     * @return City
     */
    public function setEvents($events)
    {
        $this->events = $events;

        return $this;
    }

    /**
     * Get events
     *
     * @return string 
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * Add tasks
     *
     * @param \Beon\IntranetBundle\Entity\Customer  $customers
     * @return Customer
     */
    public function addCustomer(\Beon\IntranetBundle\Entity\Customer $customers)
    {
        $this->customers[] = $customers;

        return $this;
    }

    /**
     * Remove $customers
     * @param \Beon\IntranetBundle\Entity\Customer  $customers
     */
    public function removeCustomer(\Beon\IntranetBundle\Entity\Customer $customers)
    {
        $this->customers->removeElement($customers);
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCustomers()
    {
        return $this->customers;
    }

     function __toString()
    {
        return  $this->getName();
    }

    /**
     * Add tasks
     *
     * @param \Beon\IntranetBundle\Entity\Supplier  $suppliers
     * @return Customer
     */
    public function addSupplier(\Beon\IntranetBundle\Entity\Supplier $suppliers)
    {
        $this->suppliers[] = $suppliers;

        return $this;
    }

    /**
     * Remove $suppliers
     * @param \Beon\IntranetBundle\Entity\Supplier  $suppliers
     */
    public function removeSupplier(\Beon\IntranetBundle\Entity\Supplier $suppliers)
    {
        $this->suppliers->removeElement($suppliers);
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSuppliers()
    {
        return $this->suppliers;
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



}
