<?php

namespace Beon\IntranetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AccessLevel
 */
class AccessLevel
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
     * @var boolean
     */
    private $forCustomers;

    /**
     * @var boolean
     */
    private $forEmployees;

    /**
     * @var boolean
     */
    private $forOthers;


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
     * @return AccessLevel
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $permissions;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->permissions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add permissions
     *
     * @param \Beon\IntranetBundle\Entity\Permission $permissions
     * @return AccessLevel
     */
    public function addPermission(\Beon\IntranetBundle\Entity\Permission $permissions)
    {
        $this->permissions[] = $permissions;

        return $this;
    }

    /**
     * Remove permissions
     *
     * @param \Beon\IntranetBundle\Entity\Permission $permissions
     */
    public function removePermission(\Beon\IntranetBundle\Entity\Permission $permissions)
    {
        $this->permissions->removeElement($permissions);
    }

    /**
     * Get permissions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPermissions()
    {
        return $this->permissions;
    }

    public function hasPermission($identifier) {
        foreach ($this->permissions as $permission) {
            if ($permission->getIdentifier() == $identifier) {
                return true;
            }
        }
        return false;
    }

    public function __toString() {
        return $this->getName();
    }

    /**
     * Set forCustomers
     *
     * @param boolean $forCustomers
     * @return AccessLevel
     */
    public function setForCustomers($forCustomers)
    {
        $this->forCustomers = $forCustomers;

        return $this;
    }

    /**
     * Get forCustomers
     *
     * @return boolean 
     */
    public function getForCustomers()
    {
        return $this->forCustomers;
    }

    /**
     * Set forEmployees
     *
     * @param boolean $forEmployees
     * @return AccessLevel
     */
    public function setForEmployees($forEmployees)
    {
        $this->forEmployees = $forEmployees;

        return $this;
    }

    /**
     * Get forEmployees
     *
     * @return boolean 
     */
    public function getForEmployees()
    {
        return $this->forEmployees;
    }

    /**
     * Set forOthers
     *
     * @param boolean $forOthers
     * @return AccessLevel
     */
    public function setForOthers($forOthers)
    {
        $this->forOthers = $forOthers;

        return $this;
    }

    /**
     * Get forOthers
     *
     * @return boolean 
     */
    public function getForOthers()
    {
        return $this->forOthers;
    }
}
