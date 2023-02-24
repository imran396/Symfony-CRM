<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140821100851 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $this->addSql("INSERT INTO `AccessLevel` (`id`, `name`, `forCustomers`, `forEmployees`, `forOthers`) VALUES ('6',  'Task Admin',  '0',  '1',  '1');
INSERT INTO `AccessLevelPermission` (`access_level_id`, `permission_id`) VALUES
(6, 8),
(6, 28),
(6, 18),
(6, 26),
(6, 32);
UPDATE `User` SET  `access_level_id` = 6 WHERE `id` = 13;");
    }

    public function down(Schema $schema)
    {
        
    }
}
