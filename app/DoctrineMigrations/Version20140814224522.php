<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140814224522 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("INSERT INTO `EnumValue` (`id`, `className`, `value`, `reusable`) VALUES
(100, 'SupplierTypesEnum', 'Online', 1),
(101, 'SupplierTypesEnum', 'Radio', 1),
(102, 'SupplierTypesEnum', 'Druckerzeugnis', 1),
(103, 'SupplierTypesEnum', 'TV', 1),
(104, 'SupplierTypesEnum', 'Sonstiges', 1),
(105, 'SupplierTypesEnum', 'Parkhaus', 0),
(106, 'SupplierTypesEnum', 'Sport', 0);");

        $this->addSql("UPDATE `Supplier` SET `supplierType` = 100 WHERE `supplierType` = 1;
UPDATE `Supplier` SET `supplierType` = 101 WHERE `supplierType` = 2;
UPDATE `Supplier` SET `supplierType` = 102 WHERE `supplierType` = 3;
UPDATE `Supplier` SET `supplierType` = 103 WHERE `supplierType` = 4;
UPDATE `Supplier` SET `supplierType` = 104 WHERE `supplierType` = 5 AND `typeOther` IS NULL;
UPDATE `Supplier` SET `supplierType` = 105 WHERE `supplierType` = 5 AND `typeOther` = 'Parkhaus';
UPDATE `Supplier` SET `supplierType` = 106 WHERE `supplierType` = 5 AND `typeOther` = 'Sport';");

        $this->addSql("ALTER TABLE Supplier DROP typeOther, CHANGE suppliertype supplierType_id INT NOT NULL");
        $this->addSql("ALTER TABLE Supplier ADD CONSTRAINT FK_625C0E2828A08058 FOREIGN KEY (supplierType_id) REFERENCES EnumValue (id) ON DELETE RESTRICT");
        $this->addSql("CREATE INDEX IDX_625C0E2828A08058 ON Supplier (supplierType_id)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE Supplier DROP FOREIGN KEY FK_625C0E2828A08058");
        $this->addSql("DROP INDEX IDX_625C0E2828A08058 ON Supplier");
        $this->addSql("ALTER TABLE Supplier ADD typeOther VARCHAR(255) DEFAULT NULL, CHANGE suppliertype_id supplierType INT NOT NULL");
    }
}
