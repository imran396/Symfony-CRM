<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140609124705 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $sql = <<<SQL
        CREATE TABLE IF NOT EXISTS Enum (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, value LONGTEXT DEFAULT NULL COMMENT '(DC2Type:json_array)', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;

SQL;
        $this->addSql($sql);

    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
