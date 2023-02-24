<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140829160953 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $channelTypes = $this->connection->fetchAll("SELECT DISTINCT channel FROM Complaint WHERE channel > 0 AND channel  NOT IN ( SELECT E.id FROM Complaint T LEFT JOIN EnumValue E ON T.channel  = E.id WHERE E.className =  'ComplaintChanelEnum' AND T.channel >0)");

       foreach ($channelTypes as $channelType ){
                $value = $channelType['channel'];
                $className = 'ComplaintChanelEnum';
                $reusable = 1;
                $this->addSql("INSERT INTO EnumValue (className,value, reusable) VALUES ( '$className','$value','$reusable')");
        }

        $this->addSql('ALTER TABLE Complaint CHANGE channel channel INT DEFAULT NULL');
        $this->addSql("UPDATE `Complaint` SET `channel` = NULL WHERE `channel` = 0;");
        $this->addSql('ALTER TABLE Complaint ADD CONSTRAINT FK_DDD6B016A2F98E47 FOREIGN KEY (channel) REFERENCES EnumValue (id) ON DELETE RESTRICT');
        $this->addSql('CREATE INDEX IDX_DDD6B016A2F98E47 ON Complaint (channel)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('ALTER TABLE Complaint DROP FOREIGN KEY FK_DDD6B016A2F98E47');
        $this->addSql('DROP INDEX IDX_DDD6B016A2F98E47 ON Complaint');
        $this->addSql('ALTER TABLE Complaint CHANGE channel channel SMALLINT NOT NULL');
    }
}
