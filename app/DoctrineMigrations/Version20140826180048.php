<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140826180048 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("INSERT INTO EnumValue (`className`, `value`, `reusable`) SELECT DISTINCT 'TaskGraphicsCirculationEnum', `graphicsCirculation`, 1 FROM `Task` WHERE `graphicsCirculation` > 0 ORDER BY `graphicsCirculation`;");

        $this->addSql("UPDATE `Task` INNER JOIN `EnumValue` ON (`className` = 'TaskGraphicsCirculationEnum' AND `value` = `graphicsCirculation`) SET `graphicsCirculation`  = `EnumValue`.`id` WHERE `graphicsCirculation` > 0;");
        $this->addSql("UPDATE `Task` SET `graphicsCirculation` = NULL WHERE `graphicsCirculation` = 0;");

        $this->addSql("ALTER TABLE Task ADD CONSTRAINT FK_F24C741B3F9B9A42 FOREIGN KEY (graphicsCirculation) REFERENCES EnumValue (id) ON DELETE RESTRICT");
        $this->addSql("CREATE INDEX IDX_F24C741B3F9B9A42 ON Task (graphicsCirculation)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE Task DROP FOREIGN KEY FK_F24C741B3F9B9A42");
        $this->addSql("DROP INDEX IDX_F24C741B3F9B9A42 ON Task");
    }
}
