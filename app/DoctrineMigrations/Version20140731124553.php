<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140731124553 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $this->addSql("UPDATE `User` SET `role` = 'ROLE_STAKEHOLDER', `access_level_id` = 2 WHERE `access_level_id` IN (2, 3);");
        $this->addSql('DELETE FROM `AccessLevelPermission` WHERE `access_level_id` = 3;');
        $this->addSql('DELETE FROM `AccessLevelPermission` WHERE `access_level_id` = 2 AND `permission_id` IN (8, 20);');
        $this->addSql('INSERT INTO `AccessLevelPermission` (`access_level_id`, `permission_id`) VALUES (2, 21), (2, 22), (2, 23);');
        $this->addSql('DELETE FROM `AccessLevel` WHERE `id` = 3;');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
