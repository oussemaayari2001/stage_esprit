<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240819090310 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE esp_etudiant ADD CONSTRAINT FK_E31A1F30625639CD FOREIGN KEY (code_nome) REFERENCES code_nomenclature (code_nome)');
        $this->addSql('CREATE INDEX IDX_E31A1F30625639CD ON esp_etudiant (code_nome)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE esp_etudiant DROP FOREIGN KEY FK_E31A1F30625639CD');
        $this->addSql('DROP INDEX IDX_E31A1F30625639CD ON esp_etudiant');
    }
}
