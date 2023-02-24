<?php

namespace Application\Migrations;

use Beon\IntranetBundle\Entity\User;
use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140524233551 extends AbstractMigration implements ContainerAwareInterface
{
    /**
     * @var Container
     */
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function up(Schema $schema)
    {
        $sql = <<<SQL
ALTER TABLE `User`
ADD COLUMN `role` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL AFTER `accessLevel_id`;
SQL;
        $this->addSql($sql);
    }

    public function down(Schema $schema)
    {

        $sql = <<<SQL
ALTER TABLE `User`
DROP COLUMN `role`
SQL;

        $this->addSql($sql);

    }

    public function postUp(Schema $schema)
    {
        /** @var $em EntityManager */
        $em = $this->container->get('doctrine.orm.entity_manager');

        $em->getRepository('IntranetBundle:User');
        /** @var $users User[] */
        $users = $em->getRepository('IntranetBundle:User')->findAll();

        foreach ($users as $user) {
            $user->setRole($user->getAccessLevel()->getRole());
            $em->persist($user);
        }

        $em->flush();
    }


}
