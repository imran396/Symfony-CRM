<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140826230514 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $this->addSql("INSERT INTO `EnumValue` (`className`, `value`, `reusable`) VALUES ('TaskGraphicsCirculationEnum', '5', 1), ('TaskGraphicsCirculationEnum', '6', 1), ('TaskGraphicsCirculationEnum', '7', 1), ('TaskGraphicsCirculationEnum', '8', 1), ('TaskGraphicsCirculationEnum', '9', 1), ('TaskGraphicsCirculationEnum', '15', 1), ('TaskGraphicsCirculationEnum', '20', 1), ('TaskGraphicsCirculationEnum', '25', 1);");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
