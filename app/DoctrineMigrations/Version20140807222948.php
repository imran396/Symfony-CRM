<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140807222948 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE AccessLevel ADD forCustomers TINYINT(1) NOT NULL, ADD forEmployees TINYINT(1) NOT NULL, ADD forOthers TINYINT(1) NOT NULL");
        $this->addSql("ALTER TABLE AccessLevelPermission DROP FOREIGN KEY FK_9B39E76232A48A96");
        $this->addSql("ALTER TABLE AccessLevelPermission DROP FOREIGN KEY FK_9B39E762FED90CCA");

        $this->addSql("UPDATE `AccessLevel` SET `forEmployees` = '1' WHERE `AccessLevel`.`id` = 1;");
        $this->addSql("UPDATE `AccessLevel` SET `forCustomers` = '1' WHERE `AccessLevel`.`id` = 2;");
        $this->addSql("UPDATE `AccessLevel` SET `forEmployees` = '1', `forOthers` = '1' WHERE `AccessLevel`.`id` = 4;");
        $this->addSql("INSERT INTO `AccessLevel` (`id`, `name`, `forCustomers`, `forEmployees`, `forOthers`) VALUES ('5', 'Admin', '0', '1', '0');");
        $this->addSql("UPDATE `User` SET `access_level_id` = 5 WHERE `id` IN (9, 11);");
        $this->addSql("DELETE FROM `AccessLevelPermission`;");
        $this->addSql("INSERT INTO `AccessLevelPermission` (`access_level_id`, `permission_id`) VALUES
(1, 2),
(1, 4),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 14),
(1, 15),
(1, 16),
(1, 19),
(1, 21),
(1, 22),
(1, 23),
(1, 25),
(1, 26),
(1, 27),
(1, 29),
(1, 30),
(2, 3),
(2, 5),
(2, 8),
(2, 17),
(2, 21),
(2, 22),
(2, 23),
(2, 24),
(4, 8),
(4, 14),
(4, 18),
(4, 26),
(5, 1),
(5, 2),
(5, 4),
(5, 6),
(5, 7),
(5, 8),
(5, 9),
(5, 10),
(5, 11),
(5, 12),
(5, 13),
(5, 15),
(5, 16),
(5, 19),
(5, 21),
(5, 22),
(5, 23),
(5, 25),
(5, 26),
(5, 27),
(5, 29),
(5, 30);");

        $this->addSql("ALTER TABLE AccessLevelPermission ADD CONSTRAINT FK_9B39E76232A48A96 FOREIGN KEY (access_level_id) REFERENCES AccessLevel (id) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE AccessLevelPermission ADD CONSTRAINT FK_9B39E762FED90CCA FOREIGN KEY (permission_id) REFERENCES Permission (id) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE User DROP role");
        $this->addSql("ALTER TABLE User CHANGE access_level_id access_level_id INT NOT NULL");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("UPDATE `User` SET `access_level_id` = 1 WHERE `id` IN (9, 11);");
        $this->addSql("DELETE FROM `AccessLevel` WHERE `id` = 5;");

        $this->addSql("ALTER TABLE AccessLevel DROP forCustomers, DROP forEmployees, DROP forOthers");
        $this->addSql("ALTER TABLE AccessLevelPermission DROP FOREIGN KEY FK_9B39E76232A48A96");
        $this->addSql("ALTER TABLE AccessLevelPermission DROP FOREIGN KEY FK_9B39E762FED90CCA");
        $this->addSql("ALTER TABLE AccessLevelPermission ADD CONSTRAINT FK_9B39E76232A48A96 FOREIGN KEY (access_level_id) REFERENCES AccessLevel (id)");
        $this->addSql("ALTER TABLE AccessLevelPermission ADD CONSTRAINT FK_9B39E762FED90CCA FOREIGN KEY (permission_id) REFERENCES Permission (id)");
        $this->addSql("ALTER TABLE User ADD role VARCHAR(255) DEFAULT NULL");
        $this->addSql("ALTER TABLE User CHANGE access_level_id access_level_id INT DEFAULT NULL");
    }
}
