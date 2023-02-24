<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140806193637 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $this->addSql('DELETE FROM `AccessLevelPermission`');
        $this->addSql('DELETE FROM `Permission`');
        $this->addSql("INSERT INTO `Permission` (`id`, `identifier`, `description`) VALUES
(1, 'users', ''),
(2, 'campaigns_all', ''),
(3, 'campaigns_customer', ''),
(4, 'pressreleases_all', ''),
(5, 'pressreleases_customer', ''),
(6, 'suppliers', ''),
(7, 'notes_all', ''),
(8, 'notes_related', ''),
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
(27, 'notes_internal', ''),
(28, 'timetrackings_owngroup', ''),
(29, 'reports_survey', ''),
(30, 'reports_timetracking', '');");
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
(4, 18),
(4, 26),
(4, 28);");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
