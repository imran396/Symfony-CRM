<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140605212606 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $sql = <<<SQL

ALTER TABLE `Task` DROP FOREIGN KEY `FK_F24C741BCB599186`;
ALTER TABLE `User` DROP FOREIGN KEY `FK_2DA179771AAA1299`;
ALTER TABLE `Customer` DROP FOREIGN KEY `FK_784FEC5FCB94D64E`;

ALTER TABLE `Customer`
DROP COLUMN `affiliation_id`;

DROP TABLE  `AccessLevel`;
DROP TABLE  `Affiliation`;

ALTER TABLE `User`
DROP COLUMN `accessLevel_id`;

ALTER TABLE `Task`
DROP COLUMN `affiliationType_id`;

ALTER TABLE Customer ADD cooperationType INT NOT NULL, ADD note VARCHAR(255) DEFAULT NULL, ADD discountInfo LONGTEXT DEFAULT NULL, ADD internetPermission TINYINT(1) NOT NULL;

ALTER TABLE Customer CHANGE cooperationType cooperationType INT DEFAULT NULL;

SQL;

        $this->addSql($sql);

    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
