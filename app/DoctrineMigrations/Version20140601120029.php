<?php

namespace Application\Migrations;

use Beon\IntranetBundle\Entity\Affiliation;
use Beon\IntranetBundle\Entity\Customer;
use Beon\IntranetBundle\Entity\Task;
use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140601120029 extends AbstractMigration implements ContainerAwareInterface
{
    /**
     * @var Container
     */
    private $container;

    public function up(Schema $schema)
    {
        $this->addSql("UPDATE `User` SET role = 'ROLE_STAKEHOLDER' WHERE role = 'ROLE_CUSTOMER';");
        $this->addSql("UPDATE `AccessLevel` SET role = 'ROLE_STAKEHOLDER', `name` = 'Stakeholder' WHERE role = 'ROLE_CUSTOMER';");
    }

    public function postUp(Schema $schema)
    {
        /** @var $em EntityManager */
        $em = $this->container->get('doctrine.orm.entity_manager');

        /** @var $affiliations Affiliation[] */
        $affiliations = $em->getRepository('IntranetBundle:Affiliation')->findAll();

        foreach ($affiliations as $affiliation) {
            $customer = new Customer();

            $customer->setLevel(1);
            $customer->setName($affiliation->getName());
            $customer->setContractstart(new \DateTime('0000-00-00 00:00:00'));
            $em->persist($customer);

            /** @var $customersWithAffiliation Customer[] */
            $customersWithAffiliation = $em->getRepository('IntranetBundle:Customer')
                ->createQueryBuilder('c')
                ->where('c.level = :level')
                ->setParameter('level', 2)
                ->andWhere('c.affiliationtype = :affiliation')
                ->setParameter('affiliation', $affiliation->getId())->getQuery()->getResult();

            foreach ($customersWithAffiliation as $value) {
                $value->setParent($customer);
                $em->persist($value);
            }

            /** @var $tasks Task[] */
            $tasks = $em->getRepository('IntranetBundle:Task')->findBy(['affiliationType' => $affiliation->getId()]);

            foreach ($tasks as $task) {
                $task->setCustomer($customer);
                $em->persist($task);
            }


        }

        $em->flush();


    }

    public function down(Schema $schema)
    {

        /** @var $em EntityManager */
        $em = $this->container->get('doctrine.orm.entity_manager');

        /** @var $parentCustomers [] Customer */
        $parentCustomers = $em->getRepository('IntranetBundle:Customer')
            ->createQueryBuilder('c')
            ->where('c.level = 1')
            ->andWhere('c.contractstart = \'0000-00-00\'')->getQuery()->getResult();

        foreach ($parentCustomers as $customer) {
            $em->remove($customer);
        }

        $em->flush();

    }

    public function postDown(Schema $schema)
    {
    }


    /**
     * Sets the Container.
     *
     * @param ContainerInterface|null $container A ContainerInterface instance or null
     *
     * @api
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
}
