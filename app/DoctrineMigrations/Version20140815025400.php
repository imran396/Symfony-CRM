<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140815025400 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE Campaign ADD includedServices INT NOT NULL");
        $this->addSql("INSERT INTO `EnumValue` (`id`, `className`, `value`, `reusable`) VALUES
(200, 'CampaignIncludedServicesEnum', 'Keine', 1),
(201, 'CampaignIncludedServicesEnum', 'Berichterstattung', 1),
(202, 'CampaignIncludedServicesEnum', 'http://stadtleben.de/mainz/news/2014/04/08/osterbrunch-im-aposto/', 0);");

        $this->addSql("UPDATE `Campaign` SET `includedServices` = 200;
UPDATE `Campaign` SET `includedServices` = 201 WHERE `writingInclusive` = 1;
UPDATE `Campaign` SET `includedServices` = 202 WHERE `writingInclusive` = 1 AND `freePrInclusive` = 'http://stadtleben.de/mainz/news/2014/04/08/osterbrunch-im-aposto/';");

        $this->addSql("ALTER TABLE Campaign DROP writingInclusive, DROP freePrInclusive");
        $this->addSql("ALTER TABLE Campaign ADD CONSTRAINT FK_E663708B46FA0C59 FOREIGN KEY (includedServices) REFERENCES EnumValue (id) ON DELETE RESTRICT");
        $this->addSql("CREATE INDEX IDX_E663708B46FA0C59 ON Campaign (includedServices)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE Campaign DROP FOREIGN KEY FK_E663708B46FA0C59");
        $this->addSql("DROP INDEX IDX_E663708B46FA0C59 ON Campaign");
        $this->addSql("ALTER TABLE Campaign ADD writingInclusive TINYINT(1) NOT NULL, ADD freePrInclusive VARCHAR(255) DEFAULT NULL, DROP includedServices");
    }
}
