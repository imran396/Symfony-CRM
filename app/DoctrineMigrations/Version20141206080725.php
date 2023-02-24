<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20141206080725 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('ALTER TABLE Task ADD approvalReminderDelay INT NOT NULL');

        $this->addSql("INSERT INTO `EnumValue` (`id`, `className`, `value`, `reusable`) VALUES ('1200', 'TaskApprovalReminderDelayEnum', '3/3', '1'), ('1201', 'TaskApprovalReminderDelayEnum', '7/3', '1');");

        $this->addSql("UPDATE `Task` SET `approvalReminderDelay` = 1200;");

        $this->addSql('ALTER TABLE Task ADD CONSTRAINT FK_F24C741B27B21B0A FOREIGN KEY (approvalReminderDelay) REFERENCES EnumValue (id) ON DELETE RESTRICT');
        $this->addSql('CREATE INDEX IDX_F24C741B27B21B0A ON Task (approvalReminderDelay)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('ALTER TABLE Task DROP FOREIGN KEY FK_F24C741B27B21B0A');
        $this->addSql('DROP INDEX IDX_F24C741B27B21B0A ON Task');
        $this->addSql('ALTER TABLE Task DROP approvalReminderDelay');
    }
}
