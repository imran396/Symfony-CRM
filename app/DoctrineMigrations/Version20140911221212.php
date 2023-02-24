<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140911221212 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $this->addSql("INSERT INTO `Permission` (`id`, `identifier`, `description`) VALUES (38, 'stakeholders_customer', 'Kundenzugriff Kunden/Projekte/Kooperationen');");
        $this->addSql("UPDATE `AccessLevelPermission` SET `permission_id` = 38 WHERE `access_level_id` = 2 AND `permission_id` = 20;");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
