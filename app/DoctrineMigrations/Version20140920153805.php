<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140920153805 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $this->addSql("UPDATE `Task` SET `serializedApprovalMail` = NULL WHERE `serializedApprovalMail` = 'a:0:{}'");
    }

    public function down(Schema $schema)
    {

    }
}
