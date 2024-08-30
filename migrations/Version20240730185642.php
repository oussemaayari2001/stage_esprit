<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240730185642 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE compteur MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON compteur');
        $this->addSql('ALTER TABLE compteur DROP id');
        $this->addSql('ALTER TABLE compteur ADD PRIMARY KEY (code_cpt)');
        $this->addSql('ALTER TABLE esp_etudiant CHANGE photo_et photo_et VARCHAR(1000) NOT NULL');
        $this->addSql('ALTER TABLE esp_inscription ADD id_et VARCHAR(10) NOT NULL');
        $this->addSql('ALTER TABLE esp_saison_universitaire ADD description VARCHAR(100) NOT NULL, ADD date_debut DATE NOT NULL, ADD date_fin DATE NOT NULL, ADD observation VARCHAR(500) NOT NULL, CHANGE annee_deb annee_deb VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE utilisateur CHANGE id_utilisateur id_utilisateur INT AUTO_INCREMENT NOT NULL, ADD PRIMARY KEY (id_utilisateur)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE compteur ADD id INT AUTO_INCREMENT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE esp_etudiant CHANGE photo_et photo_et VARBINARY(255) NOT NULL');
        $this->addSql('ALTER TABLE esp_inscription DROP id_et');
        $this->addSql('ALTER TABLE esp_saison_universitaire DROP description, DROP date_debut, DROP date_fin, DROP observation, CHANGE annee_deb annee_deb INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE utilisateur MODIFY id_utilisateur INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON utilisateur');
        $this->addSql('ALTER TABLE utilisateur CHANGE id_utilisateur id_utilisateur INT NOT NULL');
    }
}
