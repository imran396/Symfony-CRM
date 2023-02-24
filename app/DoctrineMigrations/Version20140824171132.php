<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140824171132 extends AbstractMigration
{
    public function up(Schema $schema)
    {
     $this->addSql("INSERT INTO `EnumValue` (`id`, `className`, `value`, `reusable`) VALUES
      (1001, 'TaskGraphicsType', 'Anzeige', 1),
      (1002, 'TaskGraphicsType', 'Flyer', 1),
      (1003, 'TaskGraphicsType', 'Plakat', 1),
      (1004, 'TaskGraphicsType', 'Web', 1),
      (1005, 'TaskGraphicsType', 'Aufsteller', 1),
      (1006, 'TaskGraphicsType', 'Visitenkarte/Cocktailfähnchen', 1),
      (1007, 'TaskGraphicsType', 'Sonstiges', 1)");

    $this->addSql("INSERT INTO `EnumValue` (`id`, `className`, `value`, `reusable`) VALUES
      (2000, 'TaskPaperType', 'kein Druck', 1),
      (2001, 'TaskPaperType', 'Standard – bester Preis', 1),
      (2002, 'TaskPaperType', 'besonderes Papier / siehe Beschreibung', 1)");

    $this->addSql("INSERT INTO `EnumValue` (`id`, `className`, `value`, `reusable`) VALUES
      (7000, 'ComplaintChanelEnum', 'Telefon', 1),
      (7001, 'ComplaintChanelEnum', 'Fax', 1),
      (7002, 'ComplaintChanelEnum', 'Email', 1),
      (7003, 'ComplaintChanelEnum', 'Facebook', 1),
      (7004, 'ComplaintChanelEnum', 'Sonstiges', 1),
      (7005, 'ComplaintChanelEnum', 'Yelp', 1),
      (7006, 'ComplaintChanelEnum', 'restaurant-kritik.de', 1),
      (7007, 'ComplaintChanelEnum', 'Tripadvisor', 1),
      (7008, 'ComplaintChanelEnum', 'Google Places', 1)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
