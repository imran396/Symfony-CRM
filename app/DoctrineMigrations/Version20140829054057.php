<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140829054057 extends AbstractMigration
{
     public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        $this->addSql("UPDATE `EnumValue` SET `className` = 'TaskGraphicsTypeEnum' WHERE `className` = 'TaskGraphicsType';");
        $this->addSql("UPDATE `EnumValue` SET `className` = 'TaskPaperTypeEnum' WHERE `className` = 'TaskPaperType';");
        $this->addSql("ALTER TABLE `EnumValue` AUTO_INCREMENT = 8032");
        $this->addSql("INSERT INTO EnumValue (`className`, `value`, `reusable`) SELECT DISTINCT 'TaskGraphicsFormatEnum', `graphicsFormat`, 1 FROM `Task` WHERE `graphicsFormat` IS NOT NULL ORDER BY `graphicsFormat`;");
        $this->addSql("UPDATE `Task` INNER JOIN `EnumValue` ON (`className` = 'TaskGraphicsFormatEnum' AND `value` = `graphicsFormat`) SET `graphicsFormat`  = `EnumValue`.`id` WHERE `graphicsFormat` IS NOT NULL;");
        $this->addSql('ALTER TABLE Task  CHANGE graphicsFormat graphicsFormat INT DEFAULT NULL');

        $this->addSql('ALTER TABLE Task ADD CONSTRAINT FK_F24C741B76162FAA FOREIGN KEY (graphicsFormat) REFERENCES EnumValue (id) ON DELETE RESTRICT');
        $this->addSql('CREATE INDEX IDX_F24C741B76162FAA ON Task (graphicsFormat)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        $this->addSql('ALTER TABLE Task DROP FOREIGN KEY FK_F24C741B76162FAA');
        $this->addSql('DROP INDEX IDX_F24C741B76162FAA ON Task');
    }
}
