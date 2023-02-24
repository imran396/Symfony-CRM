<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140729210327 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("CREATE TABLE AccessLevel (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE AccessLevelPermission (access_level_id INT NOT NULL, permission_id INT NOT NULL, INDEX IDX_9B39E76232A48A96 (access_level_id), INDEX IDX_9B39E762FED90CCA (permission_id), PRIMARY KEY(access_level_id, permission_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE User ADD access_level_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE User ADD `grp` INT DEFAULT NULL");
        $this->addSql("CREATE INDEX IDX_2DA1797732A48A96 ON User (access_level_id)");

        $this->addSql("INSERT INTO `AccessLevel` (`id`, `name`) VALUES
(1, 'Employee'),
(2, 'Stakeholder'),
(3, 'Stakeholder restricted'),
(4, 'Task');
UPDATE `User` SET `access_level_id` = 1 WHERE `role` = 'ROLE_ALL';
UPDATE `User` SET `access_level_id` = 1 WHERE `role` = 'ROLE_PRESS_RELEASE';
UPDATE `User` SET `access_level_id` = 1 WHERE `role` = 'ROLE_FACEBOOK';
UPDATE `User` SET `access_level_id` = 2 WHERE `role` = 'ROLE_STAKEHOLDER';
UPDATE `User` SET `access_level_id` = 3 WHERE `role` = 'ROLE_STAKEHOLDER_RESTRICTED';
UPDATE `User` SET `access_level_id` = 4 WHERE `role` = 'ROLE_TASK';
UPDATE `User` SET `role` = 'ROLE_STAKEHOLDER' WHERE `role` = 'ROLE_STAKEHOLDER_RESTRICTED';
UPDATE `User` SET `grp` = 40 WHERE `role` = 'ROLE_ALL';
UPDATE `User` SET `grp` = 41 WHERE `role` = 'ROLE_TASK';
UPDATE `User` SET `grp` = 42 WHERE `role` = 'ROLE_STAKEHOLDER';
");

        $this->addSql("ALTER TABLE AccessLevelPermission ADD CONSTRAINT FK_9B39E76232A48A96 FOREIGN KEY (access_level_id) REFERENCES AccessLevel (id)");
        $this->addSql("CREATE TABLE Permission (id INT AUTO_INCREMENT NOT NULL, identifier VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");

        $this->addSql("INSERT INTO `Permission` (`id`, `identifier`, `description`) VALUES
(1, 'users', ''),
(2, 'campaigns_all', ''),
(3, 'campaigns_customer', ''),
(4, 'pressreleases_all', ''),
(5, 'pressreleases_customer', ''),
(6, 'suppliers', ''),
(7, 'notes_all', ''),
(8, 'notes_customer', ''),
(9, 'facebookurls', ''),
(10, 'monitoredurls', ''),
(11, 'surveyresults', ''),
(12, 'complaints', ''),
(13, 'timetrackings_all', ''),
(14, 'timetrackings_own', ''),
(15, 'cities', ''),
(16, 'tasks_all', ''),
(17, 'tasks_customer', ''),
(18, 'tasks_owngroup', ''),
(19, 'stakeholders_all', ''),
(20, 'stakeholders_customer', ''),
(21, 'pressreleases_approve', ''),
(22, 'campaigns_approve', ''),
(23, 'tasks_approve', ''),
(24, 'customer_dashboard', ''),
(25, 'uploads_list_all', ''),
(26, 'uploads_new', ''),
(27, 'notes_internal', '');");

        $this->addSql("ALTER TABLE AccessLevelPermission ADD CONSTRAINT FK_9B39E762FED90CCA FOREIGN KEY (permission_id) REFERENCES Permission (id)");
        $this->addSql("ALTER TABLE User ADD CONSTRAINT FK_2DA1797732A48A96 FOREIGN KEY (access_level_id) REFERENCES AccessLevel (id) ON DELETE RESTRICT");

        $this->addSql("INSERT INTO `AccessLevelPermission` (`access_level_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 4),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 15),
(1, 16),
(1, 19),
(1, 21),
(1, 22),
(1, 23),
(1, 25),
(1, 26),
(1, 27),
(2, 3),
(2, 5),
(2, 8),
(2, 17),
(2, 20),
(2, 24),
(3, 5),
(3, 17),
(3, 24),
(4, 18),
(4, 26);");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE AccessLevelPermission DROP FOREIGN KEY FK_9B39E76232A48A96");
        $this->addSql("ALTER TABLE User DROP FOREIGN KEY FK_2DA1797732A48A96");
        $this->addSql("ALTER TABLE AccessLevelPermission DROP FOREIGN KEY FK_9B39E762FED90CCA");
        $this->addSql("DROP TABLE AccessLevel");
        $this->addSql("DROP TABLE AccessLevelPermission");
        $this->addSql("DROP TABLE Permission");
        $this->addSql("DROP INDEX IDX_2DA1797732A48A96 ON User");
        $this->addSql("ALTER TABLE User DROP access_level_id, DROP grp");
    }
}
