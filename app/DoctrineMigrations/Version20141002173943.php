<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Beon\IntranetBundle\Enums\TimetrackingTariffEnumOld;
use Beon\IntranetBundle\Entity\EnumValue;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20141002173943 extends AbstractMigration implements ContainerAwareInterface
{
    private $mapping = array();
    
    public function preUp(Schema $schema)
    {
        /** @var $em EntityManager */
        $em = $this->container->get('doctrine.orm.entity_manager');

        foreach (TimetrackingTariffEnumOld::getTitles() as $key => $title) {
            $val = new EnumValue();
            $val->setValue($title . '|' . TimetrackingTariffEnumOld::getPrice($key));
            $val->setClassName('TimetrackingTariffEnum');
            $val->setReusable(true);
            $em->persist($val);
            $em->flush();
            $this->mapping[$key] = $val->getId();
        }

        $em->flush();
    }
    
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        foreach ($this->mapping as $from => $to) {
            $this->addSql("UPDATE `Timetracking` SET `tariff` = $to WHERE `tariff` = $from;");
        }
        
        $this->addSql('ALTER TABLE Timetracking ADD CONSTRAINT FK_9082F9FF9465207D FOREIGN KEY (tariff) REFERENCES EnumValue (id) ON DELETE RESTRICT');
        $this->addSql('CREATE INDEX IDX_9082F9FF9465207D ON Timetracking (tariff)');
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

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        //$this->addSql('ALTER TABLE Timetracking DROP FOREIGN KEY FK_9082F9FF9465207D');
        //$this->addSql('DROP INDEX IDX_9082F9FF9465207D ON Timetracking');
        
        $this->addSql("DELETE FROM EnumValue WHERE `className` = 'TimetrackingTariffEnum';");
        $this->addSql("UPDATE `Timetracking` SET `tariff` = `tariff` - 2000 WHERE `tariff` > 2000;");
    }
}
