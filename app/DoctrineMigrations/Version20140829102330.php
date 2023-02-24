<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140829102330 extends AbstractMigration
{
    public function up(Schema $schema)
    {

        $papersTypes = $this->connection->fetchAll("SELECT DISTINCT paperType FROM Task WHERE paperType > 0 AND paperType  NOT IN ( SELECT E.id FROM Task T LEFT JOIN EnumValue E ON T.paperType  = E.id WHERE E.className =  'TaskPaperTypeEnum' AND T.paperType >0)");

       foreach ($papersTypes as $papersType ){
                $value = $papersType['paperType'];
                $className = 'TaskPaperTypeEnum';
                $reusable = 1;
                $this->addSql("INSERT INTO EnumValue (className,value, reusable) VALUES ( '$className','$value','$reusable')");
          }

        $this->addSql("UPDATE `Task` INNER JOIN `EnumValue` ON (`className` = 'TaskPaperTypeEnum' AND `value` = `paperType`) SET `paperType`  = `EnumValue`.`id` WHERE `paperType` > 0;");
        $this->addSql('ALTER TABLE Task  CHANGE paperType paperType INT DEFAULT NULL');
        $this->addSql("UPDATE `Task` SET `paperType` = NULL WHERE `paperType` = 0;");

       $this->addSql('ALTER TABLE Task ADD CONSTRAINT FK_F24C741B3000AD38 FOREIGN KEY (paperType) REFERENCES EnumValue (id) ON DELETE RESTRICT');
       $this->addSql('CREATE INDEX IDX_F24C741B3000AD38 ON Task (paperType)');

    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
           $this->addSql('ALTER TABLE Task DROP FOREIGN KEY FK_F24C741B3000AD38');
           $this->addSql('DROP INDEX IDX_F24C741B3000AD38 ON Task');
    }
}
