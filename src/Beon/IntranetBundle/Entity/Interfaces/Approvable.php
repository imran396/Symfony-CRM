<?php
/**
 * User: LITVAN
 * Date: 4/12/14
 * Time: 4:37 PM
 */

namespace Beon\IntranetBundle\Entity\Interfaces;


interface Approvable
{


    public function setApproved($approved);

    public function setApprovedAt($approvedAt);

    public function setApprovedBy(\Beon\IntranetBundle\Entity\User $approvedBy = null);

    public function resetState();

} 
