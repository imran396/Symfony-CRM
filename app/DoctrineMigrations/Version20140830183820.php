<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140830183820 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $this->addSql("UPDATE `Permission` SET `identifier` = 'stakeholders_view' WHERE `id` = 20;");
        $this->addSql("INSERT INTO `AccessLevelPermission` (`access_level_id`, `permission_id`) VALUES ('2', '20'), ('4', '20'), ('6', '20');");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
