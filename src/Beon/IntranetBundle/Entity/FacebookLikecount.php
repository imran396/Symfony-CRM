<?php

namespace Beon\IntranetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FacebookLikecount
 */
class FacebookLikecount
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    protected  $facebookUrl;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var integer
     */
    private $likecount;

    /**
     * @var boolean
     */
    private $isPosted = false;

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
     * Set date
     *
     * @param \DateTime $date
     * @return FacebookLikecount
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set likecount
     *
     * @param integer $likecount
     * @return FacebookLikecount
     */
    public function setLikecount($likecount)
    {
        $this->likecount = $likecount;

        return $this;
    }

    /**
     * Get likecount
     *
     * @return integer 
     */
    public function getLikecount()
    {
        return $this->likecount;
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
     * @return boolean
     */
    public function getIsPosted()
    {
        return $this->isPosted;
    }

    /**
     * @param boolean $isPosted
     */
    public function setIsPosted($isPosted)
    {
        $this->isPosted = $isPosted;
    }


}
