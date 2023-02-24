<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150101171523 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $this->addSql("INSERT INTO `Permission` (`id`, `identifier`) VALUES (43, 'reports_visit'), (44, 'reports_missingtt');");
        $this->addSql("INSERT INTO `AccessLevelPermission` (`access_level_id`, `permission_id`) VALUES (5, 43), (5, 44);");        
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
