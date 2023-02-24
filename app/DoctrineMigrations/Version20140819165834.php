<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140819165834 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE Campaign DROP FOREIGN KEY FK_E663708BE7A1254A");
        $this->addSql("RENAME TABLE SupplierContact TO Contact");
        $this->addSql("CREATE TABLE ContactSupplier (contact_id INT NOT NULL, supplier_id INT NOT NULL, INDEX IDX_4FEF04AE7A1254A (contact_id), INDEX IDX_4FEF04A2ADD6D8C (supplier_id), PRIMARY KEY(contact_id, supplier_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE ContactCity (contact_id INT NOT NULL, city_id INT NOT NULL, INDEX IDX_BBA45A1FE7A1254A (contact_id), INDEX IDX_BBA45A1F8BAC62AF (city_id), PRIMARY KEY(contact_id, city_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE ContactSupplierGroup (contact_id INT NOT NULL, suppliergroup_id INT NOT NULL, INDEX IDX_E312A650E7A1254A (contact_id), INDEX IDX_E312A650B794C25 (suppliergroup_id), PRIMARY KEY(contact_id, suppliergroup_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE ContactSupplier ADD CONSTRAINT FK_4FEF04AE7A1254A FOREIGN KEY (contact_id) REFERENCES Contact (id) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE ContactSupplier ADD CONSTRAINT FK_4FEF04A2ADD6D8C FOREIGN KEY (supplier_id) REFERENCES Supplier (id) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE ContactCity ADD CONSTRAINT FK_BBA45A1FE7A1254A FOREIGN KEY (contact_id) REFERENCES Contact (id) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE ContactCity ADD CONSTRAINT FK_BBA45A1F8BAC62AF FOREIGN KEY (city_id) REFERENCES City (id) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE ContactSupplierGroup ADD CONSTRAINT FK_E312A650E7A1254A FOREIGN KEY (contact_id) REFERENCES Contact (id) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE ContactSupplierGroup ADD CONSTRAINT FK_E312A650B794C25 FOREIGN KEY (suppliergroup_id) REFERENCES SupplierGroup (id) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE Campaign ADD CONSTRAINT FK_E663708BE7A1254A FOREIGN KEY (contact_id) REFERENCES Contact (id) ON DELETE SET NULL");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE Campaign DROP FOREIGN KEY FK_E663708BE7A1254A");
        $this->addSql("ALTER TABLE ContactSupplier DROP FOREIGN KEY FK_4FEF04AE7A1254A");
        $this->addSql("ALTER TABLE ContactCity DROP FOREIGN KEY FK_BBA45A1FE7A1254A");
        $this->addSql("ALTER TABLE ContactSupplierGroup DROP FOREIGN KEY FK_E312A650E7A1254A");
        $this->addSql("CREATE TABLE SupplierContact (id INT AUTO_INCREMENT NOT NULL, supplier_id INT DEFAULT NULL, firsName VARCHAR(255) DEFAULT NULL, lastName VARCHAR(255) DEFAULT NULL, phone VARCHAR(255) DEFAULT NULL, mobile VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, role VARCHAR(255) DEFAULT NULL, INDEX IDX_294BD46D2ADD6D8C (supplier_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE SupplierContact ADD CONSTRAINT FK_294BD46D2ADD6D8C FOREIGN KEY (supplier_id) REFERENCES Supplier (id) ON DELETE SET NULL");
        $this->addSql("DROP TABLE Contact");
        $this->addSql("DROP TABLE ContactSupplier");
        $this->addSql("DROP TABLE ContactCity");
        $this->addSql("DROP TABLE ContactSupplierGroup");
        $this->addSql("ALTER TABLE Campaign ADD CONSTRAINT FK_E663708BE7A1254A FOREIGN KEY (contact_id) REFERENCES SupplierContact (id) ON DELETE SET NULL");
    }
}
