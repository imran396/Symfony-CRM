<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140815033230 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE PressRelease ADD type INT NOT NULL");

        $this->addSql("INSERT INTO `EnumValue` (`id`, `className`, `value`, `reusable`) VALUES
(300, 'PressreleaseTypeEnum', 'Pressemitteilung', 1),
(301, 'PressreleaseTypeEnum', 'Imagetext', 1)");

        $this->addSql("UPDATE PressRelease SET type = 300");

        $this->addSql("ALTER TABLE PressRelease ADD CONSTRAINT FK_F14934F98CDE5729 FOREIGN KEY (type) REFERENCES EnumValue (id) ON DELETE RESTRICT");
        $this->addSql("CREATE INDEX IDX_F14934F98CDE5729 ON PressRelease (type)");


    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE PressRelease DROP FOREIGN KEY FK_F14934F98CDE5729");
        $this->addSql("DROP INDEX IDX_F14934F98CDE5729 ON PressRelease");
        $this->addSql("ALTER TABLE PressRelease DROP type");
    }
}
