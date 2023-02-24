<?php

namespace Beon\IntranetBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * FacebookUrl
 */
class FacebookUrl
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $alias;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $facebooklikecounts;


    /**
     * @var \Doctrine\Common\Collections\Collection
     */

    private $customerfacebookurls;

     /**
     * @var \DateTime
     */

    private $last_post;

    /**
     * @var integer
     */
    private $page_id;

     /**
     * @var boolean
     */
    private $warning_mail_sent = false;

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
     * Set alias
     *
     * @param string $alias
     * @return FacebookUrl
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;

        return $this;
    }

    /**
     * Get alias
     *
     * @return string 
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFacebooklikecounts()
    {
        return $this->facebooklikecounts;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $facebooklikecounts
     */
    public function setFacebooklikecounts($facebooklikecounts)
    {
        $this->facebooklikecounts = $facebooklikecounts;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCustomerfacebookurls()
    {
        return $this->customerfacebookurls;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $customerfacebookurls
     */
    public function setCustomerfacebookurls($customerfacebookurls)
    {
        $this->customerfacebookurls = $customerfacebookurls;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $this->cleanUpFbUrl($url);
    }

    public function __toString()
    {
        return (string)$this->url;
    }


    public function cleanUpFbUrl($url){
        $url = explode('?',$url);
        return $url[0];
    }

    /**
     * @return \DateTime
     */
    public function getLastPost()
    {
        return $this->last_post;
    }

    /**
     * @param \DateTime $last_post
     */
    public function setLastPost($last_post)
    {
        $this->last_post = $last_post;
    }

    /**
     * @return mixed
     */
    public function getPageId()
    {
        return $this->page_id;
    }

    /**
     * @param mixed $page_id
     */
    public function setPageId($page_id)
    {
        $this->page_id = $page_id;
    }

    /**
     * @param boolean $warning_mail_sent
     */
    public function setWarningMailSent($warning_mail_sent)
    {
        $this->warning_mail_sent = $warning_mail_sent;
    }

    /**
     * @return boolean
     */
    public function getWarningMailSent()
    {
        return $this->warning_mail_sent;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->facebooklikecounts = new \Doctrine\Common\Collections\ArrayCollection();
        $this->customerfacebookurls = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add facebooklikecounts
     *
     * @param \Beon\IntranetBundle\Entity\FacebookLikecount $facebooklikecounts
     * @return FacebookUrl
     */
    public function addFacebooklikecount(\Beon\IntranetBundle\Entity\FacebookLikecount $facebooklikecounts)
    {
        $this->facebooklikecounts[] = $facebooklikecounts;

        return $this;
    }

    /**
     * Remove facebooklikecounts
     *
     * @param \Beon\IntranetBundle\Entity\FacebookLikecount $facebooklikecounts
     */
    public function removeFacebooklikecount(\Beon\IntranetBundle\Entity\FacebookLikecount $facebooklikecounts)
    {
        $this->facebooklikecounts->removeElement($facebooklikecounts);
    }

    /**
     * Add customerfacebookurls
     *
     * @param \Beon\IntranetBundle\Entity\CustomerFacebookUrl $customerfacebookurls
     * @return FacebookUrl
     */
    public function addCustomerfacebookurl(\Beon\IntranetBundle\Entity\CustomerFacebookUrl $customerfacebookurls)
    {
        $this->customerfacebookurls[] = $customerfacebookurls;

        return $this;
    }

    /**
     * Remove customerfacebookurls
     *
     * @param \Beon\IntranetBundle\Entity\CustomerFacebookUrl $customerfacebookurls
     */
    public function removeCustomerfacebookurl(\Beon\IntranetBundle\Entity\CustomerFacebookUrl $customerfacebookurls)
    {
        $this->customerfacebookurls->removeElement($customerfacebookurls);
    }

    public function getLikeCountDiff() {
        $max = 0;
        $min = PHP_INT_MAX;
        foreach ($this->getFacebooklikecounts() as $lc) {
            $max = max($max, $lc->getLikeCount());
            $min = min($min, $lc->getLikeCount());
        }
        return $max . ' (+ ' . ($max-$min) . ')';
    }
}
