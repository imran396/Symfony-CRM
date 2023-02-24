<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140814082039 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");

        $this->addSql("CREATE TABLE EnumValue (id INT AUTO_INCREMENT NOT NULL, className VARCHAR(255) NOT NULL, value VARCHAR(255) NOT NULL, reusable TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");

        $this->addSql("UPDATE `Customer` SET `cooperationType` = NULL;");
        $this->addSql("INSERT INTO `EnumValue` (`id`, `className`, `value`, `reusable`) VALUES
(1, 'CooperationTypeEnum', 'Reisebüro', 1),
(2, 'CooperationTypeEnum', 'B&B-Hotel', 1);");

        $this->addSql("DROP TABLE Enum");
        $this->addSql("ALTER TABLE Customer ADD CONSTRAINT FK_784FEC5F2F0BA6F1 FOREIGN KEY (cooperationType) REFERENCES EnumValue (id) ON DELETE RESTRICT");
        $this->addSql("CREATE INDEX IDX_784FEC5F2F0BA6F1 ON Customer (cooperationType)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE Customer DROP FOREIGN KEY FK_784FEC5F2F0BA6F1");
        $this->addSql("CREATE TABLE Enum (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, value LONGTEXT DEFAULT NULL COMMENT '(DC2Type:json_array)', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("DROP TABLE EnumValue");
        $this->addSql("DROP INDEX IDX_784FEC5F2F0BA6F1 ON Customer");
    }
}
