<?php

namespace Beon\IntranetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ConfigValue
 */
class ConfigValue
{
    const DESIGN_DELAY_MESSAGE = 1000;
    const NEWDESIGN_EXPRESS = 1001;
    const OLDDESIGN_EXPRESS = 1002;
    const NEWDESIGN_NORMAL = 1003;
    const OLDDESIGN_NORMAL = 1004;
    const URL_GFX_PRICELIST = 1050;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $value;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $role;


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
     * Set value
     *
     * @param string $value
     * @return ConfigValue
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return ConfigValue
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set role
     *
     * @param string $role
     * @return ConfigValue
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

    public function getActualDays() {
        return $this->getUsualDays() + $this->getAdditionalDays();
    }

    public function getUsualDays() {
        $split = explode('+', $this->getValue(), 2);
        return (int)$split[0];
    }

    public function getAdditionalDays() {
        $split = explode('+', $this->getValue(), 2);
        return isset($split[1]) ? (int)$split[1] : 0;
    }
}
