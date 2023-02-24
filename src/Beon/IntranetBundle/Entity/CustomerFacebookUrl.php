<?php

namespace Beon\IntranetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CustomerFacebookUrl
 */
class CustomerFacebookUrl
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $customer;

    /**
     * @var integer
     */
    protected $facebookUrl;

    /**
     * @var boolean
     */
    private $isOwn = false;


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
     * Set isOwn
     *
     * @param boolean $isOwn
     * @return CustomerFacebookUrl
     */
    public function setIsOwn($isOwn)
    {
        $this->isOwn = $isOwn;

        return $this;
    }

    /**
     * Get isOwn
     *
     * @return boolean
     */
    public function getIsOwn()
    {
        return $this->isOwn;
    }

    /**
     * @return int
     */
    public function getFacebookUrl()
    {
        return $this->facebookUrl;
    }

    /**
     * @param int $facebookUrl
     */
    public function setFacebookUrl($facebookUrl)
    {
        $this->facebookUrl = $facebookUrl;
    }

    /**
     * @return int
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param int $customer
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;
    }
}
