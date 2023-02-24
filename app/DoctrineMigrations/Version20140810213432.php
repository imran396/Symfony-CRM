<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140810213432 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $this->addSql("UPDATE `SurveyResult` SET happyHour = happyHour - 1, enchiladaHour = enchiladaHour - 1, casinoMexicano = casinoMexicano - 1, ladiesNight = ladiesNight - 1");
    }

    public function down(Schema $schema)
    {
        $this->addSql("UPDATE `SurveyResult` SET happyHour = happyHour + 1, enchiladaHour = enchiladaHour + 1, casinoMexicano = casinoMexicano + 1, ladiesNight = ladiesNight + 1");
    }
}
