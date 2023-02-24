<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140829095454 extends AbstractMigration
{
    public function up(Schema $schema)
    {

        $graphicsTypes = $this->connection->fetchAll("SELECT DISTINCT graphicsType FROM Task WHERE graphicsType > 0 AND graphicsType NOT IN ( SELECT E.id FROM Task T LEFT JOIN EnumValue E ON T.graphicsType = E.id WHERE E.className =  'TaskGraphicsTypeEnum' AND T.graphicsType >0)");

        foreach ($graphicsTypes as $graphicsType ){
                $value = $graphicsType['graphicsType'];
                $className = 'TaskGraphicsTypeEnum';
                $reusable = 1;
                $this->addSql("INSERT INTO EnumValue (className,value, reusable) VALUES ( '$className','$value','$reusable')");
        }

        $this->addSql("UPDATE `Task` INNER JOIN `EnumValue` ON (`className` = 'TaskGraphicsTypeEnum' AND `value` = `graphicsType`) SET `graphicsType`  = `EnumValue`.`id` WHERE `graphicsType` > 0;");
        $this->addSql('ALTER TABLE Task CHANGE graphicsType graphicsType INT DEFAULT NULL');
        $this->addSql("UPDATE `Task` SET `graphicsType` = NULL WHERE `graphicsType` = 0;");

        $this->addSql('ALTER TABLE Task ADD CONSTRAINT FK_F24C741B6F4D7699 FOREIGN KEY (graphicsType) REFERENCES EnumValue (id) ON DELETE RESTRICT');
        $this->addSql('CREATE INDEX IDX_F24C741B6F4D7699 ON Task (graphicsType)');

    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
           $this->addSql('ALTER TABLE Task DROP FOREIGN KEY FK_F24C741B6F4D7699');
           $this->addSql('DROP INDEX IDX_F24C741B6F4D7699 ON Task');

    }
}
