<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;
use Beon\IntranetBundle\Enums\StakeholderPaymentTypeEnum;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140818075626 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE Customer ADD paymentMethod SMALLINT NOT NULL DEFAULT " . StakeholderPaymentTypeEnum::RECHNUNG);
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE Customer DROP paymentMethod");
    }
}
