<?php

namespace Beon\IntranetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EnumValue
 */
class EnumValue
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $className;

    /**
     * @var string
     */
    private $value;

    /**
     * @var boolean
     */
    private $reusable = false;


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
     * Set className
     *
     * @param string $className
     * @return EnumValue
     */
    public function setClassName($className)
    {
        $this->className = $className;

        return $this;
    }

    /**
     * Get className
     *
     * @return string 
     */
    public function getClassName()
    {
        return $this->className;
    }

    /**
     * Set value
     *
     * @param string $value
     * @return EnumValue
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
        if ($this->className == 'TimetrackingTariffEnum') {
            return $this->getValueIdx(0);
        } else {
            return $this->value;
        }
    }
    
    public function getFullValue() {
        return $this->value;
    }
    
    public function getValueIdx($idx, $split = '|')
    {
        $split = explode($split, $this->value);
        return count($split) >= $idx + 1 ? $split[$idx] : null;
    }

    /**
     * Set reusable
     *
     * @param boolean $reusable
     * @return EnumValue
     */
    public function setReusable($reusable)
    {
        $this->reusable = $reusable;

        return $this;
    }

    /**
     * Get reusable
     *
     * @return boolean 
     */
    public function getReusable()
    {
        return $this->reusable;
    }

    public function __toString() {
        return $this->getValue();
    }
}
