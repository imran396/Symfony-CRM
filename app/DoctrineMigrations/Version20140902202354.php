<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140902202354 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE Campaign ADD confirmedAt DATETIME DEFAULT NULL");
        $this->addSql("UPDATE `Campaign` SET `confirmedAt` = DATE_FORMAT(`approvedAt`,'%Y-%m-%d 23:59:59') WHERE `approved` = 1 AND `approvedAt` IS NOT NULL");
        $this->addSql("UPDATE `Campaign` SET `confirmedAt` = DATE_SUB(`start`, INTERVAL 1 SECOND) WHERE `approved` = 1 AND `approvedAt` IS NULL");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE Campaign DROP confirmedAt");
    }
}
