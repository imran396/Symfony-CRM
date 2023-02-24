<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140821165611 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $results = $this->connection->fetchAll('SELECT id, supplier_id FROM Contact');

        foreach ($results as $result ){
                $contact_id = $result['id'];
                $supplier_id = $result['supplier_id'];
                $this->addSql("INSERT INTO ContactSupplier (contact_id,supplier_id) VALUES ( '$contact_id','$supplier_id')");
        }

       $this->addSql("ALTER TABLE Contact DROP FOREIGN KEY FK_294BD46D2ADD6D8C");
       $this->addSql("ALTER TABLE Contact DROP supplier_id");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
