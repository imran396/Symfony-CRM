<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140826155238 extends AbstractMigration
{
    public function up(Schema $schema)
    {

    $this->addSql("UPDATE `Complaint` SET channel='7001' WHERE channel=1");
    $this->addSql("UPDATE `Complaint` SET channel='7002' WHERE channel=2");
    $this->addSql("UPDATE `Complaint` SET channel='7003' WHERE channel=3");
    $this->addSql("UPDATE `Complaint` SET channel='7004' WHERE channel=4");
    $this->addSql("UPDATE `Complaint` SET channel='7005' WHERE channel=5");
    $this->addSql("UPDATE `Complaint` SET channel='7006' WHERE channel=6");
    $this->addSql("UPDATE `Complaint` SET channel='7007' WHERE channel=7");
    $this->addSql("UPDATE `Complaint` SET channel='7008' WHERE channel=8");

    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
