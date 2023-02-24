<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140909191320 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('CREATE TABLE ConfigValue (id INT AUTO_INCREMENT NOT NULL, value VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');

        $this->addSql("INSERT INTO `ConfigValue` (`id`, `value`, `description`, `role`) VALUES ('1001', '3', 'Bearbeitungszeit neues Design (Express)', 'ROLE_CONFIG_TASKS'), ('1002', '1', 'Bearbeitungszeit bestehendes Design (Express)?', 'ROLE_CONFIG_TASKS'), ('1003', '10', 'Bearbeitungszeit neues Design', 'ROLE_CONFIG_TASKS'), ('1004', '3', 'Bearbeitungszeit bestehendes Design', 'ROLE_CONFIG_TASKS'), ('1000', 'Zur Zeit dauert die Bearbeitung dieses Auftrags leider etwas länger als normal, nämlich %actual% statt %usual% Werktage.', 'Warnmeldung für verzögerte Bearbeitung von Grafik-Aufträgen. Wird nur angezeigt wenn Bearbeitungszeit im Format bspw. 10+2 angegeben wurde.', 'ROLE_CONFIG_TASKS');");
    }

    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('DROP TABLE ConfigValue');
    }
}
