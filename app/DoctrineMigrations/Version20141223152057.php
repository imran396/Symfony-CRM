<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20141223152057 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('ALTER TABLE Log DROP FOREIGN KEY FK_B7722E25E7A1254A');
        $this->addSql('ALTER TABLE Log ADD supplier_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE Log ADD CONSTRAINT FK_B7722E252ADD6D8C FOREIGN KEY (supplier_id) REFERENCES Supplier (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE Log ADD CONSTRAINT FK_B7722E25E7A1254A FOREIGN KEY (contact_id) REFERENCES Contact (id) ON DELETE SET NULL');
        $this->addSql('CREATE INDEX IDX_B7722E252ADD6D8C ON Log (supplier_id)');
        $this->addSql('ALTER TABLE Log ADD text LONGTEXT DEFAULT NULL');
        $this->addSql('UPDATE `Log` l INNER JOIN `Campaign` c ON l.campaign_id = c.id SET l.contact_id = c.contact_id, l.supplier_id = c.supplier_id WHERE `action` = 10;');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('ALTER TABLE Log DROP FOREIGN KEY FK_B7722E252ADD6D8C');
        $this->addSql('ALTER TABLE Log DROP FOREIGN KEY FK_B7722E25E7A1254A');
        $this->addSql('DROP INDEX IDX_B7722E252ADD6D8C ON Log');
        $this->addSql('ALTER TABLE Log DROP supplier_id');
        $this->addSql('ALTER TABLE Log ADD CONSTRAINT FK_B7722E25E7A1254A FOREIGN KEY (contact_id) REFERENCES Contact (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE Log DROP text');
    }
}
