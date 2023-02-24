<?php

namespace Beon\IntranetBundle\Entity;

use Beon\IntranetBundle\Entity\Interfaces\Approvable;
use Beon\IntranetBundle\IntranetBundle;
use Beon\IntranetBundle\Enums\CampaignStatusEnum;
use Doctrine\ORM\Mapping as ORM;

/**
 * Campaign
 */
class Campaign implements Approvable
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var boolean
     */
    private $approvalmailsent = false;

    /**
     * @var boolean
     */
    private $approved = false;

    /**
     * @var string
     */
    private $details;

    /**
     * @var \DateTime
     */
    private $start;

    /**
     * @var \DateTime
     */
    private $end;

    /**
     * @var integer
     */
    private $budget;

    /**
     * @var integer
     */
    private $regularPrice;

    /**
     * @var integer
     */
    private $numberOfAds;

    /**
     * @var integer
     */
    private $numberOfSeconds;

    /**
     * @var integer
     */
    private $audiencesize;

    /**
     * @var string
     */
    private $adDetails;

    /**
     * @var \Beon\IntranetBundle\Entity\EnumValue
     */
    private $includedServices;

    /**
     * @var \DateTime
     */
    private $createdat;

    /**
     * @var \DateTime
     */
    private $approvedAt;

    /**
     * @var \DateTime
     */
    private $confirmedAt;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $uploads;

    /**
     * @var \Beon\IntranetBundle\Entity\Supplier
     */
    private $supplier;

    /**
     * @var \Beon\IntranetBundle\Entity\Customer
     */
    private $customer;

    /**
     * @var \Beon\IntranetBundle\Entity\Contact
     */
    private $contact;

    /**
     * @var \Beon\IntranetBundle\Entity\User
     */
    private $approvedBy;

    /**
     * @var \DateTime
     */

    private $approvalMailSentAt;

        /**
     * @var integer
     */
    private $adsizeWidth;

     /**
     * @var integer
     */
    private $adsizeHeight;

    /**
     * @var Campaign
     */
    private $duplicateOf;
    
    /**
     * @var boolean
     */
    private $deleted = false;

    /**
     * @var string
     */
    private $invoiceAddress;
    
    /**
     * @var \DateTime
     */
    private $lastApprovalMailSentAt;

    /**
     * @var string
     */
    private $serializedApprovalMail;

    /**
     * Constructor
     */
    public function __construct()
    {
        if (!$this->createdat) {
            $this->createdat = new \DateTime();
        }
        $this->uploads = new \Doctrine\Common\Collections\ArrayCollection();
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

    public function __clone() {
        $this->id = null;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Campaign
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set approvalmailsent
     *
     * @param boolean $approvalmailsent
     * @return Campaign
     */
    public function setApprovalmailsent($approvalmailsent)
    {
        $this->approvalmailsent = $approvalmailsent;

        return $this;
    }

    /**
     * Get approvalmailsent
     *
     * @return boolean
     */
    public function getApprovalmailsent()
    {
        return $this->approvalmailsent;
    }

    /**
     * Set approved
     *
     * @param boolean $approved
     * @return Campaign
     */
    public function setApproved($approved)
    {
        $this->approved = $approved;

        return $this;
    }

    /**
     * Get approved
     *
     * @return boolean
     */
    public function getApproved()
    {
        return $this->approved;
    }

    /**
     * Set details
     *
     * @param string $details
     * @return Campaign
     */
    public function setDetails($details)
    {
        $this->details = $details;

        return $this;
    }

    /**
     * Get details
     *
     * @return string
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * Set start
     *
     * @param \DateTime $start
     * @return Campaign
     */
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Get start
     *
     * @return \DateTime
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set end
     *
     * @param \DateTime $end
     * @return Campaign
     */
    public function setEnd($end)
    {
        $this->end = $end;

        return $this;
    }

    /**
     * Get end
     *
     * @return \DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * Set budget
     *
     * @param integer $budget
     * @return Campaign
     */
    public function setBudget($budget)
    {
        $this->budget = $budget;

        return $this;
    }

    /**
     * Get budget
     *
     * @return integer
     */
    public function getBudget()
    {
        return $this->budget;
    }


    /**
     * Set regularPrice
     *
     * @param integer $regularPrice
     * @return Campaign
     */
    public function setRegularPrice($regularPrice)
    {
        $this->regularPrice = $regularPrice;

        return $this;
    }

    /**
     * Get regularPrice
     *
     * @return integer
     */
    public function getRegularPrice()
    {
        return $this->regularPrice;
    }

    public function getDiscount() {
        if ($this->getRegularPrice() > $this->getBudget()) {
            return $this->getRegularPrice() - $this->getBudget();
        } else {
            return 0; 
        }
    }

    public function getDiscountPercent() {
		$regularPrice = max($this->regularPrice, $this->budget);
		if ($regularPrice > 0) {
			return round($this->getDiscount() / $regularPrice * 100, 2);
		} else {
			return 0;
		}
    }

    /**
     * Set numberOfAds
     *
     * @param integer $numberOfAds
     * @return Campaign
     */
    public function setNumberOfAds($numberOfAds)
    {
        $this->numberOfAds = $numberOfAds;

        return $this;
    }

    /**
     * Get numberOfAds
     *
     * @return integer
     */
    public function getNumberOfAds()
    {
        return $this->numberOfAds;
    }


    /**
     * Set numberOfSeconds
     *
     * @param integer $numberOfSeconds
     * @return Campaign
     */
    public function setNumberOfSeconds($numberOfSeconds)
    {
        $this->numberOfSeconds = $numberOfSeconds;

        return $this;
    }

    /**
     * Get numberOfSeconds
     *
     * @return integer
     */
    public function getNumberOfSeconds()
    {
        return $this->numberOfSeconds;
    }

    /**
     * Set audiencesize
     *
     * @param integer $audiencesize
     * @return Campaign
     */
    public function setAudiencesize($audiencesize)
    {
        $this->audiencesize = $audiencesize;

        return $this;
    }

    /**
     * Get audiencesize
     *
     * @return integer
     */
    public function getAudiencesize()
    {
        return $this->audiencesize;
    }

    /**
     * Set adDetails
     *
     * @param string $adDetails
     * @return Campaign
     */
    public function setAdDetails($adDetails)
    {
        $this->adDetails = $adDetails;

        return $this;
    }

    /**
     * Get adDetails
     *
     * @return string
     */
    public function getAdDetails()
    {
        return $this->adDetails;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedat()
    {
        return $this->createdat;
    }

    /**
     * @param \DateTime $createdat
     */
    public function setCreatedat($createdat)
    {
        $this->createdat = $createdat;
    }

    /**
     * Set approvedAt
     *
     * @param \DateTime $approvedAt
     * @return Campaign
     */
    public function setApprovedAt($approvedAt)
    {
        $this->approvedAt = $approvedAt;

        return $this;
    }

    /**
     * Get approvedAt
     *
     * @return \DateTime
     */
    public function getApprovedAt()
    {
        return $this->approvedAt;
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
     * Set supplier
     *
     * @param \Beon\IntranetBundle\Entity\Supplier $supplier
     * @return Campaign
     */
    public function setSupplier(\Beon\IntranetBundle\Entity\Supplier $supplier = null)
    {
        $this->supplier = $supplier;

        return $this;
    }

    /**
     * Get supplier
     *
     * @return \Beon\IntranetBundle\Entity\Supplier
     */
    public function getSupplier()
    {
        return $this->supplier;
    }

    /**
     * Set customer
     *
     * @param \Beon\IntranetBundle\Entity\Customer $customer
     * @return Campaign
     */
    public function setCustomer(\Beon\IntranetBundle\Entity\Customer $customer = null)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return \Beon\IntranetBundle\Entity\Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Set supplierContact
     *
     * @param \Beon\IntranetBundle\Entity\Contact $supplierContact
     * @return Campaign
     */
    public function setContact(\Beon\IntranetBundle\Entity\Contact $contact = null)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get supplierContact
     *
     * @return \Beon\IntranetBundle\Entity\Contact
     */
    public function getContact()
    {
        return $this->contact;
    }


    /**
     * Set approvedBy
     *
     * @param \Beon\IntranetBundle\Entity\User $approvedBy
     * @return Campaign
     */
    public function setApprovedBy(\Beon\IntranetBundle\Entity\User $approvedBy = null)
    {
        $this->approvedBy = $approvedBy;

        return $this;
    }

    /**
     * Get approvedBy
     *
     * @return \Beon\IntranetBundle\Entity\User
     */
    public function getApprovedBy()
    {
        return $this->approvedBy;
    }

    public function isStartLess()
    {
        return $this->start <= $this->end;
    }

    function __toString()
    {
        return sprintf('AD%05d %s', $this->getId(), $this->getTitle());
    }

    /**
     * @return \DateTime
     */
    public function getApprovalMailSentAt()
    {
        return $this->approvalMailSentAt;
    }

    /**
     * @param \DateTime $approvalMailSentAt
     */
    public function setApprovalMailSentAt($approvalMailSentAt)
    {
        $this->approvalMailSentAt = $approvalMailSentAt;
    }

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $notes;


    /**
     * Add notes
     *
     * @param \Beon\IntranetBundle\Entity\Note $notes
     * @return Campaign
     */
    public function addNote(\Beon\IntranetBundle\Entity\Note $notes)
    {
        $notes->setCampaign($this);
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $tasks;


    /**
     * Add tasks
     *
     * @param \Beon\IntranetBundle\Entity\Task $tasks
     * @return Campaign
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
     * @var \Beon\IntranetBundle\Entity\User
     */
    private $approvementSender;


    /**
     * Set approvementSender
     *
     * @param \Beon\IntranetBundle\Entity\User $approvementSender
     * @return Campaign
     */
    public function setApprovementSender(\Beon\IntranetBundle\Entity\User $approvementSender = null)
    {
        $this->approvementSender = $approvementSender;

        return $this;
    }

    /**
     * Get approvementSender
     *
     * @return \Beon\IntranetBundle\Entity\User
     */
    public function getApprovementSender()
    {
        return $this->approvementSender;
    }

    /**
     * @var boolean
     */
    private $denied = false;


    /**
     * Set denied
     *
     * @internal param bool $denied
     * @param $denied
     * @return Campaign
     */
    public function setDenied($denied)
    {
        $this->denied = $denied;

        return $this;
    }

    /**
     * Get denied
     *
     * @return boolean
     */
    public function getDenied()
    {
        return $this->denied;
    }

    public function getFormattedId()
    {
        return sprintf('AD%05d', $this->id);
    }

    public function getFormattedIdWithTitle()
    {
        return sprintf('AD%05d', $this->id) . ' ' . $this->title;
    }

    /**
     * @return int
     */
    public function getAdsizeWidth()
    {
        return $this->adsizeWidth;
    }

    /**
     * @param int $adsizeWidth
     */
    public function setAdsizeWidth($adsizeWidth)
    {
        $this->adsizeWidth = $adsizeWidth;
    }

    /**
     * @return int
     */
    public function getAdsizeHeight()
    {
        return $this->adsizeHeight;
    }

    /**
     * @param int $adsizeHeight
     */
    public function setAdsizeHeight($adsizeHeight)
    {
        $this->adsizeHeight = $adsizeHeight;
    }

    /**
     * @return Campaign
     */
    public function getDuplicateOf()
    {
        return $this->duplicateOf;
    }

    /**
     * @param Campaign $duplicateOf
     */
    public function setDuplicateOf($duplicateOf)
    {
        $this->duplicateOf = $duplicateOf;
    }

    public function resetState() {
        $this->setDeleted(false);
        $this->setConfirmedAt(null);
        $this->setApprovalmailsent(false);
        $this->setApproved(false);
        $this->setApprovedAt(null);
        $this->setApprovedBy(null);
        $this->setApprovalMailSentAt(null);
        $this->setApprovementSender(null);
        $this->setDenied(false);
    }


    /**
     * Set includedServices
     *
     * @param \Beon\IntranetBundle\Entity\EnumValue $includedServices
     * @return Campaign
     */
    public function setIncludedServices(\Beon\IntranetBundle\Entity\EnumValue $includedServices)
    {
        $this->includedServices = $includedServices;

        return $this;
    }

    /**
     * Get includedServices
     *
     * @return \Beon\IntranetBundle\Entity\EnumValue 
     */
    public function getIncludedServices()
    {
        return $this->includedServices;
    }
    /**
     * @var string
     */
    private $returnPath;


    /**
     * Set returnPath
     *
     * @param string $returnPath
     * @return Campaign
     */
    public function setReturnPath($returnPath)
    {
        $this->returnPath = $returnPath;

        return $this;
    }

    /**
     * Get returnPath
     *
     * @return string 
     */
    public function getReturnPath()
    {
        return $this->returnPath;
    }

    /**
     * Set confirmedAt
     *
     * @param \DateTime $confirmedAt
     * @return Campaign
     */
    public function setConfirmedAt($confirmedAt)
    {
        $this->confirmedAt = $confirmedAt;

        return $this;
    }

    /**
     * Get confirmedAt
     *
     * @return \DateTime 
     */
    public function getConfirmedAt()
    {
        return $this->confirmedAt;
    }


    /**
     * Set invoiceAddress
     *
     * @param string $invoiceAddress
     * @return Campaign
     */
    public function setInvoiceAddress($invoiceAddress)
    {
        $this->invoiceAddress = $invoiceAddress;

        return $this;
    }

    /**
     * Get invoiceAddress
     *
     * @return string 
     */
    public function getInvoiceAddress()
    {
        return $this->invoiceAddress;
    }

    /**
     * Set lastApprovalMailSentAt
     *
     * @param \DateTime $lastApprovalMailSentAt
     * @return Campaign
     */
    public function setLastApprovalMailSentAt($lastApprovalMailSentAt)
    {
        $this->lastApprovalMailSentAt = $lastApprovalMailSentAt;

        return $this;
    }

    /**
     * Get lastApprovalMailSentAt
     *
     * @return \DateTime 
     */
    public function getLastApprovalMailSentAt()
    {
        return $this->lastApprovalMailSentAt;
    }

    /**
     * Set serializedApprovalMail
     *
     * @param string $serializedApprovalMail
     * @return Campaign
     */
    public function setSerializedApprovalMail($serializedApprovalMail)
    {
        $this->serializedApprovalMail = $serializedApprovalMail;

        return $this;
    }

    /**
     * Get serializedApprovalMail
     *
     * @return string 
     */
    public function getSerializedApprovalMail()
    {
        return $this->serializedApprovalMail;
    }

     public function getInvoiceUploadHash() {
         return md5(IntranetBundle::$containerExternal->getParameter('kernel.secret'). $this->getId());
     }

    /**
     * Set deleted
     *
     * @param boolean $deleted
     * @return Campaign
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;

        return $this;
    }

    /**
     * Get deleted
     *
     * @return boolean 
     */
    public function getDeleted()
    {
        return $this->deleted;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $timetrackings;


    /**
     * Add timetrackings
     *
     * @param \Beon\IntranetBundle\Entity\Timetracking $timetrackings
     * @return Campaign
     */
    public function addTimetracking(\Beon\IntranetBundle\Entity\Timetracking $timetrackings)
    {
        $this->timetrackings[] = $timetrackings;

        return $this;
    }

    /**
     * Remove timetrackings
     *
     * @param \Beon\IntranetBundle\Entity\Timetracking $timetrackings
     */
    public function removeTimetracking(\Beon\IntranetBundle\Entity\Timetracking $timetrackings)
    {
        $this->timetrackings->removeElement($timetrackings);
    }

    /**
     * Get timetrackings
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTimetrackings()
    {
        return $this->timetrackings;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $pressreleases;


    /**
     * Add pressreleases
     *
     * @param \Beon\IntranetBundle\Entity\Pressrelease $pressreleases
     * @return Campaign
     */
    public function addPressrelease(\Beon\IntranetBundle\Entity\Pressrelease $pressreleases)
    {
        $this->pressreleases[] = $pressreleases;

        return $this;
    }

    /**
     * Remove pressreleases
     *
     * @param \Beon\IntranetBundle\Entity\Pressrelease $pressreleases
     */
    public function removePressrelease(\Beon\IntranetBundle\Entity\Pressrelease $pressreleases)
    {
        $this->pressreleases->removeElement($pressreleases);
    }

    /**
     * Get pressreleases
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPressreleases()
    {
        return $this->pressreleases;
    }
    /**
     * @var integer
     */
    private $status;


    /**
     * Set status
     *
     * @param integer $status
     * @return Campaign
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }
    /**
     * @var \Beon\IntranetBundle\Entity\EnumValue
     */
    private $beonRecommendation;


    /**
     * Set beonRecommendation
     *
     * @param \Beon\IntranetBundle\Entity\EnumValue $beonRecommendation
     * @return Campaign
     */
    public function setBeonRecommendation(\Beon\IntranetBundle\Entity\EnumValue $beonRecommendation = null)
    {
        $this->beonRecommendation = $beonRecommendation;

        return $this;
    }

    /**
     * Get beonRecommendation
     *
     * @return \Beon\IntranetBundle\Entity\EnumValue 
     */
    public function getBeonRecommendation()
    {
        return $this->beonRecommendation;
    }
    
    public function getSupplierAction() {
        if ($this->getApproved()) {
          if ($this->getStatus() < CampaignStatusEnum::CONFIRMED) {
            return 'confirm';
          } else {
            return null;
          }
        } else if ($this->getDenied()) {
          return 'reject';
        } else {
          return 'ack';
        }
    }
}
