<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140811035735 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $this->addSql("UPDATE `Permission` SET `identifier` = 'complaints_all' WHERE `id` = 12;");
        $this->addSql("INSERT INTO `Permission` (`id`, `identifier`, `description`) VALUES ('31', 'complaints_customer', '');");
        $this->addSql("INSERT INTO `AccessLevelPermission` (`access_level_id`, `permission_id`) VALUES ('2', '31');");
    }

    public function down(Schema $schema)
    {
        $this->addSql("UPDATE `Permission` SET `identifier` = 'complaints' WHERE `id` = 12;");
        $this->addSql("DELETE FROM `Permission` WHERE `id` = 31;");
    }
}
