<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240819084540 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE code_nomenclature ADD code_str VARCHAR(2) DEFAULT NULL, ADD PRIMARY KEY (code_nome)');
        $this->addSql('ALTER TABLE code_nomenclature ADD CONSTRAINT FK_B2B2C437B48E9453 FOREIGN KEY (code_str) REFERENCES str_nome (code_str) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_B2B2C437B48E9453 ON code_nomenclature (code_str)');
        $this->addSql('ALTER TABLE esp_etudiant ADD code_nome VARCHAR(3) NOT NULL, DROP cycle_et, CHANGE photo_et photo_et VARCHAR(5000) NOT NULL');
        $this->addSql('ALTER TABLE esp_etudiant ADD CONSTRAINT FK_E31A1F30625639CD FOREIGN KEY (code_nome) REFERENCES code_nomenclature (code_nome)');
        $this->addSql('CREATE INDEX IDX_E31A1F30625639CD ON esp_etudiant (code_nome)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE code_nomenclature DROP FOREIGN KEY FK_B2B2C437B48E9453');
        $this->addSql('DROP INDEX IDX_B2B2C437B48E9453 ON code_nomenclature');
        $this->addSql('DROP INDEX `primary` ON code_nomenclature');
        $this->addSql('ALTER TABLE code_nomenclature DROP code_str');
        $this->addSql('ALTER TABLE esp_etudiant DROP FOREIGN KEY FK_E31A1F30625639CD');
        $this->addSql('DROP INDEX IDX_E31A1F30625639CD ON esp_etudiant');
        $this->addSql('ALTER TABLE esp_etudiant ADD cycle_et VARCHAR(2) NOT NULL, DROP code_nome, CHANGE photo_et photo_et VARCHAR(1000) NOT NULL');
    }
}
