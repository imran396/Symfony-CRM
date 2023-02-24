<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;
use Beon\IntranetBundle\Enums\CampaignStatusEnum;
use Beon\IntranetBundle\Enums\LogActionEnum;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20141205060455 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('ALTER TABLE Campaign ADD status SMALLINT DEFAULT NULL');
        $this->addSql('UPDATE Campaign c SET c.status = ' . CampaignStatusEnum::APPROVED . ' WHERE c.approved <> 0');
        $this->addSql('UPDATE Campaign c SET c.status = ' . CampaignStatusEnum::CONFIRMED . ' WHERE c.approved <> 0 AND c.confirmedAt IS NOT NULL');
        $this->addSql('UPDATE Campaign c INNER JOIN Log l ON c.id = l.campaign_id SET c.status = ' . CampaignStatusEnum::FILES_SUBMITTED . ' WHERE c.approved <> 0 AND l.action = ' . LogActionEnum::FILES_SUBMITTED);
        $this->addSql('UPDATE Campaign c INNER JOIN Upload u ON c.id = u.campaign_id SET c.status = ' . CampaignStatusEnum::INVOICE_RECEIVED . ' WHERE c.approved <> 0 AND u.is_invoice <> 0');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('ALTER TABLE Campaign DROP status');
    }
}
