<?php

namespace Beon\IntranetBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;


abstract class FilteredRepository extends EntityRepository
{
    protected $customerFilter = null;
    protected $userFilter = null;
    protected $plainTextFilter = null;
    protected $supplierTypeFilter = null;
    protected $noteTypeFilter = null;
    protected $cityFilter = null;

    public function getCustomerFilter()
    {
	    return $this->customerFilter;
    }
    
    public function setCustomerFilter($customerEntity)
    {
	    $this->customerFilter = $customerEntity;
    }
    
    public function getUserFilter()
    {
	    return $this->userFilter;
    }
    
    public function setUserFilter($userFilter)
    {
	    $this->userFilter = $userFilter;
    }

    public function getPlainTextFilter()
    {
	    return $this->plainTextFilter;
    }
    
    public function setPlainTextFilter($plainTextFilter)
    {
	    $this->plainTextFilter = $plainTextFilter;
    }

    public function getSupplierTypeFilter()
    {
	    return $this->supplierTypeFilter;
    }
    
    public function setSupplierTypeFilter($supplierTypeFilter)
    {
	    $this->supplierTypeFilter = $supplierTypeFilter;
    }

    public function getNoteTypeFilter()
    {
	    return $this->noteTypeFilter;
    }
    
    public function setNoteTypeFilter($noteTypeFilter)
    {
	    $this->noteTypeFilter = $noteTypeFilter;
    }


    public function getCityFilter()
    {
	    return $this->cityFilter;
    }
    
    public function setCityFilter($cityFilter)
    {
	    $this->cityFilter = $cityFilter;
    }
}
