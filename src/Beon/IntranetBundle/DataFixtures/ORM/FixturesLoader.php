<?php
/**
 * User: LITVAN
 * Date: 2/17/14
 * Time: 12:19 AM
 */

namespace Beon\IntranetBundle\DataFixtures\ORM;

use Beon\IntranetBundle\Entity\Campaign;
use Beon\IntranetBundle\Entity\Customer;
use Beon\IntranetBundle\Entity\Note;
use Beon\IntranetBundle\Entity\Pressrelease;
use Beon\IntranetBundle\Entity\Supplier;
use Beon\IntranetBundle\Entity\Contact;
use Beon\IntranetBundle\Entity\Upload;
use Beon\IntranetBundle\Entity\User;
use Beon\IntranetBundle\Enums\SupplierTypesEnum;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Validator\Constraints\DateTime;


class FixturesLoader implements FixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {

    }
}
