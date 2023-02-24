<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140909181835 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $this->addSql("INSERT INTO `Permission` (`id`, `identifier`, `description`) VALUES (34, 'reports_campaignsavings', ''), (35, 'reports_facebook', ''), (36, 'reports_cpspm', ''), (37, 'config_tasks', '');");
        $this->addSql("INSERT INTO `AccessLevelPermission` (`access_level_id`, `permission_id`) VALUES ('5', '34'), ('5', '35'), ('5', '36'), ('5', '37'), ('6', '30'), ('6', '37');");
    }

    public function down(Schema $schema)
    {
        
    }
}
