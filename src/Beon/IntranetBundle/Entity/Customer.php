<?php

namespace Beon\IntranetBundle\Entity;

use Beon\IntranetBundle\Enums\CustomerLevelEnum;
use Symfony\Component\Translation\Translator;
use Doctrine\ORM\Mapping as ORM;
use Beon\IntranetBundle\Enums\StakeholderPaymentTypeEnum;

/**
 * Customer
 */
class Customer implements \JsonSerializable
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
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $contactname;

    /**
     * @var string
     */
    private $contactphone;

    /**
     * @var string
     */
    private $contactmobile;

    /**
     * @var string
     */
    private $contactemail;

    /**
     * @var \DateTime
     */
    private $contractstart;

    /**
     * @var \DateTime
     */
    private $contractend;

    /**
     * @var \DateTime
     */
    private $contactBirthday;

    /**
     * @var string
     */
    private $monday;

    /**
     * @var string
     */
    private $tuesday;

    /**
     * @var string
     */
    private $wednesday;

    /**
     * @var string
     */
    private $thursday;

    /**
     * @var string
     */
    private $friday;

    /**
     * @var string
     */
    private $saturday;

    /**
     * @var string
     */
    private $sunday;

    /**
     * @var string
     */
    private $holiday;

    /**
     * @var string
     */
    private $daily;

    /**
     * @var string
     */
    private $irregular;

    /**
     * @var string
     */
    private $postingInfo;

    /**
     * @var \DateTime
     */
    private $checkWebsite;

    /**
     * @var \DateTime
     */
    private $checkCityPage;

    /**
     * @var \DateTime
     */
    private $lastFbSitePost;

    /**
     * @var \DateTime
     */
    private $lastFbPrivatePost;

    /**
     * @var \DateTime
     */
    private $lastVisit;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $users;


    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $campaigns;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $pressReleases;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $monitoredUrl;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $notes;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $budgetPeriods;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */

    private $customerfacebookurls;

    /**
     * @var \DateTime
     */
    private $cocktailCasino;

    /**
     * @var \DateTime
     */
    private $ladiesNight;

    /**
     * @var \DateTime
     */
    private $nightlounge;

    /**
     * @var \DateTime
     */
    private $fajitaDay;

    /**
     * @var boolean
     */
    private $invoicesToBeon = false;

    /**
     * @var integer
     */
    private $paymentMethod = StakeholderPaymentTypeEnum::RECHNUNG;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $uploads;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $contacts;

    /**
     * @var boolean
     */
    private $fixedDate = false;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
        $this->campaigns = new \Doctrine\Common\Collections\ArrayCollection();
        $this->pressReleases = new \Doctrine\Common\Collections\ArrayCollection();
        $this->notes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->monitoredUrl = new \Doctrine\Common\Collections\ArrayCollection();
        $this->uploads = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Customer
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
     * Set address
     *
     * @param string $address
     * @return Customer
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    public function getAddressLines() {
        $address = $this->getName() . "\n" . $this->getAddress();
        $address = preg_replace('/,\\s*/', "\n", $address);
        $address = preg_replace('/[\\n\\r]+/', "\n", $address);
        return trim($address);
    }

    /**
     * Set contactname
     *
     * @param string $contactname
     * @return Customer
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
     * Set contactphone
     *
     * @param string $contactphone
     * @return Customer
     */
    public function setContactphone($contactphone)
    {
        $this->contactphone = $contactphone;

        return $this;
    }

    /**
     * Get contactphone
     *
     * @return string
     */
    public function getContactphone()
    {
        return $this->contactphone;
    }

    /**
     * Set contactmobile
     *
     * @param string $contactmobile
     * @return Customer
     */
    public function setContactmobile($contactmobile)
    {
        $this->contactmobile = $contactmobile;

        return $this;
    }

    /**
     * Get contactmobile
     *
     * @return string
     */
    public function getContactmobile()
    {
        return $this->contactmobile;
    }

    /**
     * Set contactemail
     *
     * @param string $contactemail
     * @return Customer
     */
    public function setContactemail($contactemail)
    {
        $this->contactemail = $contactemail;

        return $this;
    }

    /**
     * Get contactemail
     *
     * @return string
     */
    public function getContactemail()
    {
        return $this->contactemail;
    }

    /**
     * Set contractstart
     *
     * @param \DateTime $contractstart
     * @return Customer
     */
    public function setContractstart($contractstart)
    {
        $this->contractstart = $contractstart;

        return $this;
    }

    /**
     * Get contractstart
     *
     * @return \DateTime
     */
    public function getContractstart()
    {
        return $this->contractstart;
    }

    /**
     * Set contractend
     *
     * @param \DateTime $contractend
     * @return Customer
     */
    public function setContractend($contractend)
    {
        $this->contractend = $contractend;

        return $this;
    }

    /**
     * Get contractend
     *
     * @return \DateTime
     */
    public function getContractend()
    {
        return $this->contractend;
    }


    /**
     * Set contactBirthday
     *
     * @param \DateTime $contactBirthday
     * @return Customer
     */
    public function setContactBirthday($contactBirthday)
    {
        $this->contactBirthday = $contactBirthday;

        return $this;
    }

    /**
     * Get contactBirthday
     *
     * @return \DateTime
     */
    public function getContactBirthday()
    {
        return $this->contactBirthday;
    }

    /**
     * Set monday
     *
     * @param string $monday
     * @return Customer
     */
    public function setMonday($monday)
    {
        $this->monday = $monday;

        return $this;
    }

    /**
     * Get monday
     *
     * @return string
     */
    public function getMonday()
    {
        return $this->monday;
    }

    /**
     * Set tuesday
     *
     * @param string $tuesday
     * @return Customer
     */
    public function setTuesday($tuesday)
    {
        $this->tuesday = $tuesday;

        return $this;
    }

    /**
     * Get tuesday
     *
     * @return string
     */
    public function getTuesday()
    {
        return $this->tuesday;
    }

    /**
     * Set wednesday
     *
     * @param string $wednesday
     * @return Customer
     */
    public function setWednesday($wednesday)
    {
        $this->wednesday = $wednesday;

        return $this;
    }

    /**
     * Get wednesday
     *
     * @return string
     */
    public function getWednesday()
    {
        return $this->wednesday;
    }

    /**
     * Set thursday
     *
     * @param string $thursday
     * @return Customer
     */
    public function setThursday($thursday)
    {
        $this->thursday = $thursday;

        return $this;
    }

    /**
     * Get thursday
     *
     * @return string
     */
    public function getThursday()
    {
        return $this->thursday;
    }

    /**
     * Set friday
     *
     * @param string $friday
     * @return Customer
     */
    public function setFriday($friday)
    {
        $this->friday = $friday;

        return $this;
    }

    /**
     * Get friday
     *
     * @return string
     */
    public function getFriday()
    {
        return $this->friday;
    }

    /**
     * Set saturday
     *
     * @param string $saturday
     * @return Customer
     */
    public function setSaturday($saturday)
    {
        $this->saturday = $saturday;

        return $this;
    }

    /**
     * Get saturday
     *
     * @return string
     */
    public function getSaturday()
    {
        return $this->saturday;
    }

    /**
     * Set sunday
     *
     * @param string $sunday
     * @return Customer
     */
    public function setSunday($sunday)
    {
        $this->sunday = $sunday;

        return $this;
    }

    /**
     * Get sunday
     *
     * @return string
     */
    public function getSunday()
    {
        return $this->sunday;
    }

    /**
     * Set holiday
     *
     * @param string $holiday
     * @return Customer
     */
    public function setHoliday($holiday)
    {
        $this->holiday = $holiday;

        return $this;
    }

    /**
     * Get holiday
     *
     * @return string
     */
    public function getHoliday()
    {
        return $this->holiday;
    }

    /**
     * Set daily
     *
     * @param string $daily
     * @return Customer
     */
    public function setDaily($daily)
    {
        $this->daily = $daily;

        return $this;
    }

    /**
     * Get daily
     *
     * @return string
     */
    public function getDaily()
    {
        return $this->daily;
    }

    /**
     * Set irregular
     *
     * @param string $irregular
     * @return Customer
     */
    public function setIrregular($irregular)
    {
        $this->irregular = $irregular;

        return $this;
    }

    /**
     * Get irregular
     *
     * @return string
     */
    public function getIrregular()
    {
        return $this->irregular;
    }

    /**
     * Set postingInfo
     *
     * @param string $postingInfo
     * @return Customer
     */
    public function setPostingInfo($postingInfo)
    {
        $this->postingInfo = $postingInfo;

        return $this;
    }

    /**
     * Get postingInfo
     *
     * @return string
     */
    public function getPostingInfo()
    {
        return $this->postingInfo;
    }

    /**
     * Set checkWebsite
     *
     * @param \DateTime $checkWebsite
     * @return Customer
     */
    public function setCheckWebsite($checkWebsite)
    {
        $this->checkWebsite = $checkWebsite;

        return $this;
    }

    /**
     * Get checkWebsite
     *
     * @return \DateTime
     */
    public function getCheckWebsite()
    {
        return $this->checkWebsite;
    }

    /**
     * Set checkCityPage
     *
     * @param \DateTime $checkCityPage
     * @return Customer
     */
    public function setCheckCityPage($checkCityPage)
    {
        $this->checkCityPage = $checkCityPage;

        return $this;
    }

    /**
     * Get checkCityPage
     *
     * @return \DateTime
     */
    public function getCheckCityPage()
    {
        return $this->checkCityPage;
    }

    /**
     * Set lastFbSitePost
     *
     * @param \DateTime $lastFbSitePost
     * @return Customer
     */
    public function setLastFbSitePost($lastFbSitePost)
    {
        $this->lastFbSitePost = $lastFbSitePost;

        return $this;
    }

    /**
     * Get lastFbSitePost
     *
     * @return \DateTime
     */
    public function getLastFbSitePost()
    {
        return $this->lastFbSitePost;
    }

    /**
     * Set lastFbPrivatePost
     *
     * @param \DateTime $lastFbPrivatePost
     * @return Customer
     */
    public function setLastFbPrivatePost($lastFbPrivatePost)
    {
        $this->lastFbPrivatePost = $lastFbPrivatePost;

        return $this;
    }

    /**
     * Get lastFbPrivatePost
     *
     * @return \DateTime
     */
    public function getLastFbPrivatePost()
    {
        return $this->lastFbPrivatePost;
    }

    /**
     * Set lastVisit
     *
     * @param \DateTime $lastVisit
     * @return Customer
     */
    public function setLastVisit($lastVisit)
    {
        $this->lastVisit = $lastVisit;

        return $this;
    }

    /**
     * Get lastVisit
     *
     * @return \DateTime
     */
    public function getLastVisit()
    {
        return $this->lastVisit;
    }

    /**
     * Add users
     *
     * @param \Beon\IntranetBundle\Entity\User $user
     * @return Customer
     */
    public function addUser(\Beon\IntranetBundle\Entity\User $user)
    {
        $user->setCustomer($this);
        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove users
     *
     * @param \Beon\IntranetBundle\Entity\User $user
     */
    public function removeUser(\Beon\IntranetBundle\Entity\User $user)
    {
        $this->users->removeElement($user);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Get users than can approve
     *
     * @return array
     */
    public function getUsersWithRole($role)
    {
        $ret = array();

        foreach ($this->users as $user) {
            if ($user->isGranted($role)) {
                $ret[] = $user;
            }
        }

        if (!$ret && $this->getLevel() >= 3) {
            return $this->getParent()->getUsersWithRole($role);
        }

        return $ret;
    }

    /**
     * Add campaigns
     *
     * @param \Beon\IntranetBundle\Entity\Campaign $campaigns
     * @return Customer
     */
    public function addCampaign(\Beon\IntranetBundle\Entity\Campaign $campaigns)
    {
        $campaigns->setCustomer($this);
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

    /**
     * Get campaigns
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCampaigns()
    {
        return $this->campaigns;
    }

    /**
     * Add pressReleases
     *
     * @param \Beon\IntranetBundle\Entity\Pressrelease $pressReleases
     * @return Customer
     */
    public function addPressRelease(\Beon\IntranetBundle\Entity\Pressrelease $pressReleases)
    {
        $pressReleases->setCustomer($this);
        $this->pressReleases[] = $pressReleases;

        return $this;
    }

    /**
     * Remove pressReleases
     *
     * @param \Beon\IntranetBundle\Entity\Pressrelease $pressReleases
     */
    public function removePressRelease(\Beon\IntranetBundle\Entity\Pressrelease $pressReleases)
    {
        $this->pressReleases->removeElement($pressReleases);
    }

    /**
     * Get pressReleases
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPressReleases()
    {
        return $this->pressReleases;
    }

    /**
     * Add notes
     *
     * @param \Beon\IntranetBundle\Entity\Note $notes
     * @return Customer
     */
    public function addNote(\Beon\IntranetBundle\Entity\Note $notes)
    {
        $this->notes[] = $notes;

        return $this;
    }

    /**
     * Remove notes
     *
     * @param \Beon\IntranetBundle\Entity\Note $notes
     */
    public function removeNote(\Beon\IntranetBundle\Entity\Note $notes)
    {
        $this->notes->removeElement($notes);
    }

    /**
     * Get notes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Add budgetPeriods
     *
     * @param \Beon\IntranetBundle\Entity\BudgetPeriod $budgetPeriods
     * @return Customer
     */
    public function addBudgetPeriod(\Beon\IntranetBundle\Entity\BudgetPeriod $budgetPeriods)
    {
        $budgetPeriods->setCustomer($this);
        $this->budgetPeriods[] = $budgetPeriods;

        return $this;
    }

    /**
     * Remove budgetPeriods
     *
     * @param \Beon\IntranetBundle\Entity\BudgetPeriod $budgetPeriods
     */
    public function removeBudgetPeriod(\Beon\IntranetBundle\Entity\BudgetPeriod $budgetPeriods)
    {
        $this->budgetPeriods->removeElement($budgetPeriods);
    }

    /**
     * Get budgetPeriods
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBudgetPeriods()
    {
        return $this->budgetPeriods;
    }

    public function __toString()
    {
        if ($this->getLevel() == 2) {
            return sprintf('KU%05d %s', $this->getId(), $this->name);
        } else if ($this->getLevel() == 3 || $this->getLevel() == 4) {
            if ($this->getLevel() == 4) {
                $id = sprintf('KO%05d', $this->getId());
            } else {
                $id = CustomerLevelEnum::getTranslatedTitle($this->getLevel());
            }
            $parentName = $this->getParent() ? $this->getParent()->getName() : null;
            return trim($id . ' ' . $parentName) . ': ' . $this->getName();
        } else {
            return CustomerLevelEnum::getTranslatedTitle($this->getLevel()) . ': ' . $this->name;
        }
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $tasks;


    /**
     * Add tasks
     *
     * @param \Beon\IntranetBundle\Entity\Task $tasks
     * @return Customer
     */
    public function addTask(\Beon\IntranetBundle\Entity\Task $tasks)
    {
        $this->tasks[] = $tasks;

        return $this;
    }

    /**
     * Remove tasks
     *
     * @param \Beon\IntranetBundle\Entity\Task $tasks
     */
    public function removeTask(\Beon\IntranetBundle\Entity\Task $tasks)
    {
        $this->tasks->removeElement($tasks);
    }

    /**
     * Get tasks
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTasks()
    {
        return $this->tasks;
    }

    /**
     * Add customerfacebookurls
     *
     * @param \Beon\IntranetBundle\Entity\CustomerFacebookUrl $customerfacebookurls
     * @return Customer
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

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $complaints;


    /**
     * Add complaints
     *
     * @param \Beon\IntranetBundle\Entity\Complaint $complaints
     * @return Customer
     */
    public function addComplaint(\Beon\IntranetBundle\Entity\Complaint $complaints)
    {
        $this->complaints[] = $complaints;

        return $this;
    }

    /**
     * Remove complaints
     *
     * @param \Beon\IntranetBundle\Entity\Complaint $complaints
     */
    public function removeComplaint(\Beon\IntranetBundle\Entity\Complaint $complaints)
    {
        $this->complaints->removeElement($complaints);
    }

    /**
     * Get complaints
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComplaints()
    {
        return $this->complaints;
    }

    /**
     * @return \DateTime
     */
    public function getCocktailCasino()
    {
        return $this->cocktailCasino;
    }

    /**
     * @param \DateTime $cocktailCasino
     */
    public function setCocktailCasino($cocktailCasino)
    {
        $this->cocktailCasino = $cocktailCasino;
    }

    /**
     * @return \DateTime
     */
    public function getLadiesNight()
    {
        return $this->ladiesNight;
    }

    /**
     * @param \DateTime $ladiesNight
     */
    public function setLadiesNight($ladiesNight)
    {
        $this->ladiesNight = $ladiesNight;
    }

    /**
     * @return \DateTime
     */
    public function getNightlounge()
    {
        return $this->nightlounge;
    }

    /**
     * @param \DateTime $nightlounge
     */
    public function setNightlounge($nightlounge)
    {
        $this->nightlounge = $nightlounge;
    }

    /**
     * @return \DateTime
     */
    public function getFajitaDay()
    {
        return $this->fajitaDay;
    }

    /**
     * @var integer
     */
    private $level;

    /**
     * @var \Beon\IntranetBundle\Entity\Customer
     */
    private $parent;


    /**
     * Set level
     *
     * @param integer $level
     * @return Customer
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return integer
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set parent
     *
     * @param \Beon\IntranetBundle\Entity\Customer $parent
     * @return Customer
     */
    public function setParent(\Beon\IntranetBundle\Entity\Customer $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \Beon\IntranetBundle\Entity\Customer
     */
    public function getParent()
    {
        return $this->parent;
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
        return [
            'id' => $this->id,
            'name' => $this->name ? $this->name : "customer " . $this->id
        ];
    }


    public function isValidLevelAndParent()
    {

        if (!$this->getParent()) {
            return true;
        }

        if ($this->level == 1 && $this->getParent()->level <= 0) {
            return true;
        }
        if ($this->level == 2 && $this->getParent()->level <= 1) {
            return true;
        }
        if ($this->level == 3 && $this->getParent()->level <= 2) {
            return true;
        }
        if ($this->level == 4 && $this->getParent()->level <= 2) {
            return true;
        }

        return false;
    }

    /**
     * @param \DateTime $fajitaDay
     */
    public function setFajitaDay($fajitaDay)
    {
        $this->fajitaDay = $fajitaDay;
    }

    /**
     * @var integer
     */
    private $cooperationType;

    /**
     * @var string
     */
    private $note;

    /**
     * @var string
     */
    private $discountInfo;

    /**
     * @var boolean
     */
    private $internetPermission = false;


    /**
     * Set cooperationType
     *
     * @param integer $cooperationType
     * @return Customer
     */
    public function setCooperationType($cooperationType)
    {
        $this->cooperationType = $cooperationType;

        return $this;
    }

    /**
     * Get cooperationType
     *
     * @return integer
     */
    public function getCooperationType()
    {
        return $this->cooperationType;
    }

    /**
     * Set note
     *
     * @param string $note
     * @return Customer
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set discountInfo
     *
     * @param string $discountInfo
     * @return Customer
     */
    public function setDiscountInfo($discountInfo)
    {
        $this->discountInfo = $discountInfo;

        return $this;
    }

    /**
     * Get discountInfo
     *
     * @return string
     */
    public function getDiscountInfo()
    {
        return $this->discountInfo;
    }

    /**
     * Set internetPermission
     *
     * @param boolean $internetPermission
     * @return Customer
     */
    public function setInternetPermission($internetPermission)
    {
        $this->internetPermission = $internetPermission;

        return $this;
    }

    /**
     * Get internetPermission
     *
     * @return boolean
     */
    public function getInternetPermission()
    {
        return $this->internetPermission;
    }



    /**
     * Add monitoredUrls
     *
     * @param \Beon\IntranetBundle\Entity\MonitoredUrl $monitoredUrl
     * @return Customer
     */
    public function addMonitoredUrls(\Beon\IntranetBundle\Entity\MonitoredUrl $monitoredUrl)
    {
        $monitoredUrl->setCustomer($this);
        $this->monitoredUrl[] = $monitoredUrl;

        return $this;
    }

    /**
     * Remove monitoredUrls
     *
     * @param \Beon\IntranetBundle\Entity\MonitoredUrl $monitoredUrl
     */
    public function removeMonitoredUrls(\Beon\IntranetBundle\Entity\MonitoredUrl $monitoredUrl)
    {
       $this->monitoredUrl->removeElement($monitoredUrl);
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMonitoredUrl()
    {
        return $this->monitoredUrl;
    }

        /**
     * Add uploads
     *
     * @param \Beon\IntranetBundle\Entity\Upload $uploads
     * @return Campaign
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $timetrackings;

    /**
     * Add tasks
     *
     * @param \Beon\IntranetBundle\Entity\Timetracking  $timetrackings
     * @return Customer
     */
    public function addTimetracking(\Beon\IntranetBundle\Entity\Timetracking $timetrackings)
    {
        $this->timetrackings[] = $timetrackings;

        return $this;
    }

    /**
     * Remove $timetrackings
     * @param \Beon\IntranetBundle\Entity\Timetracking  $timetrackings
     */
    public function removeTimetracking(\Beon\IntranetBundle\Entity\Timetracking $timetrackings)
    {
        $this->timetrackings->removeElement($timetrackings);
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTimetrackings()
    {
        return $this->timetrackings;
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
     * Set invoicesToBeon
     *
     * @param boolean $invoicesToBeon
     * @return Customer
     */
    public function setInvoicesToBeon($invoicesToBeon)
    {
        $this->invoicesToBeon = $invoicesToBeon;

        return $this;
    }

    /**
     * Get invoicesToBeon
     *
     * @return boolean 
     */
    public function getInvoicesToBeon()
    {
        return $this->invoicesToBeon;
    }

    /**
     * Add monitoredUrl
     *
     * @param \Beon\IntranetBundle\Entity\MonitoredUrl $monitoredUrl
     * @return Customer
     */
    public function addMonitoredUrl(\Beon\IntranetBundle\Entity\MonitoredUrl $monitoredUrl)
    {
        $this->monitoredUrl[] = $monitoredUrl;

        return $this;
    }

    /**
     * Remove monitoredUrl
     *
     * @param \Beon\IntranetBundle\Entity\MonitoredUrl $monitoredUrl
     */
    public function removeMonitoredUrl(\Beon\IntranetBundle\Entity\MonitoredUrl $monitoredUrl)
    {
        $this->monitoredUrl->removeElement($monitoredUrl);
    }

    /**
     * Set paymentMethod
     *
     * @param integer $paymentMethod
     * @return Customer
     */
    public function setPaymentMethod($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;

        return $this;
    }

    /**
     * Get paymentMethod
     *
     * @return integer 
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }
    /**
     * @var string
     */
    private $christmasEve;

    /**
     * @var string
     */
    private $christmasDay;

    /**
     * @var string
     */
    private $boxingDay;

    /**
     * @var string
     */
    private $newYearsEve;

    /**
     * @var string
     */
    private $newYearsDay;


    /**
     * Set christmasEve
     *
     * @param string $christmasEve
     * @return Customer
     */
    public function setChristmasEve($christmasEve)
    {
        $this->christmasEve = $christmasEve;

        return $this;
    }

    /**
     * Get christmasEve
     *
     * @return string 
     */
    public function getChristmasEve()
    {
        return $this->christmasEve;
    }

    /**
     * Set christmasDay
     *
     * @param string $christmasDay
     * @return Customer
     */
    public function setChristmasDay($christmasDay)
    {
        $this->christmasDay = $christmasDay;

        return $this;
    }

    /**
     * Get christmasDay
     *
     * @return string 
     */
    public function getChristmasDay()
    {
        return $this->christmasDay;
    }

    /**
     * Set boxingDay
     *
     * @param string $boxingDay
     * @return Customer
     */
    public function setBoxingDay($boxingDay)
    {
        $this->boxingDay = $boxingDay;

        return $this;
    }

    /**
     * Get boxingDay
     *
     * @return string 
     */
    public function getBoxingDay()
    {
        return $this->boxingDay;
    }

    /**
     * Set newYearsEve
     *
     * @param string $newYearsEve
     * @return Customer
     */
    public function setNewYearsEve($newYearsEve)
    {
        $this->newYearsEve = $newYearsEve;

        return $this;
    }

    /**
     * Get newYearsEve
     *
     * @return string 
     */
    public function getNewYearsEve()
    {
        return $this->newYearsEve;
    }

    /**
     * Set newYearsDay
     *
     * @param string $newYearsDay
     * @return Customer
     */
    public function setNewYearsDay($newYearsDay)
    {
        $this->newYearsDay = $newYearsDay;

        return $this;
    }

    /**
     * Get newYearsDay
     *
     * @return string 
     */
    public function getNewYearsDay()
    {
        return $this->newYearsDay;
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
     * Set fixedDate
     *
     * @param boolean $fixedDate
     * @return Customer
     */
    public function setFixedDate($fixedDate)
    {
        $this->fixedDate = $fixedDate;

        return $this;
    }

    /**
     * Get fixedDate
     *
     * @return boolean 
     */
    public function getFixedDate()
    {
        return $this->fixedDate;
    }
}
