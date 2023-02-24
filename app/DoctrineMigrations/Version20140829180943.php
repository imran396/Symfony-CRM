<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140829180943 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $this->addSql("INSERT INTO `EnumValue` (`id`, `className`, `value`, `reusable`) VALUES ('1008', 'TaskGraphicsTypeEnum', 'Facebook', '1'), ('1009', 'TaskGraphicsTypeEnum', 'Autobeklebung', '1'), ('1010', 'TaskGraphicsTypeEnum', 'PVC-Plane', '1'), ('1011', 'TaskGraphicsTypeEnum', 'Mashplane', '1'), ('1012', 'TaskGraphicsTypeEnum', 'Beachflag', '1'), ('1013', 'TaskGraphicsTypeEnum', 'Speisekarte', '1'), ('1014', 'TaskGraphicsTypeEnum', 'Speisekartenaushang', '1');");
        //$this->addSql("UPDATE `EnumValue` SET `reusable` = '0' WHERE `id` IN (1007,2002,8065,8068,8070,8073,8074,8075,8076,8077,8078,8082,8083,8084) OR `id` BETWEEN 8032 AND 8056;");
        $this->addSql("UPDATE `EnumValue` SET `value` = 'A3' WHERE `value` = 'a3';");
        $this->addSql("INSERT INTO `EnumValue` (`className`, `value`, `reusable`) VALUES ('TaskGraphicsFormatEnum', 'A0', '1');");
    }

    public function down(Schema $schema)
    {
    }
}
