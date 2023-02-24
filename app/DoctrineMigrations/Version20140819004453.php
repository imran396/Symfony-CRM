<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140819004453 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE Note ADD type_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE Note ADD CONSTRAINT FK_6F8F552AC54C8C93 FOREIGN KEY (type_id) REFERENCES EnumValue (id) ON DELETE RESTRICT");
        $this->addSql("CREATE INDEX IDX_6F8F552AC54C8C93 ON Note (type_id)");

        $this->addSql("INSERT INTO `EnumValue` (`id`, `className`, `value`, `reusable`) VALUES ('400', 'NoteTypeEnum', 'Grafik', '0'), ('401', 'NoteTypeEnum', 'Veröffentlichung', '1');");

        $this->addSql("UPDATE `Note` INNER JOIN `Task` ON `task_id` = `Task`.`id` SET `type_id` = 400 WHERE `Task`.`type` = 1");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE Note DROP FOREIGN KEY FK_6F8F552AC54C8C93");
        $this->addSql("DROP INDEX IDX_6F8F552AC54C8C93 ON Note");
        $this->addSql("ALTER TABLE Note DROP type_id");
    }
}
