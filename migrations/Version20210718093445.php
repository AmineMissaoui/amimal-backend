<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210718093445 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adoption (id INT AUTO_INCREMENT NOT NULL, user INT DEFAULT NULL, animal INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fiche_animal (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL, age VARCHAR(255) DEFAULT NULL, race VARCHAR(255) DEFAULT NULL, etat VARCHAR(255) DEFAULT NULL, espece VARCHAR(255) DEFAULT NULL, couleur VARCHAR(255) DEFAULT NULL, sexe VARCHAR(255) DEFAULT NULL, nbre_like INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE refuges (id INT AUTO_INCREMENT NOT NULL, ville VARCHAR(255) DEFAULT NULL, pays VARCHAR(255) DEFAULT NULL, telephone VARCHAR(255) DEFAULT NULL, latitude NUMERIC(10, 3) DEFAULT NULL, longitude VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE declaration ADD type VARCHAR(20) NOT NULL, ADD titre VARCHAR(50) NOT NULL, ADD gouvernorat VARCHAR(40) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE adoption');
        $this->addSql('DROP TABLE fiche_animal');
        $this->addSql('DROP TABLE refuges');
        $this->addSql('ALTER TABLE declaration DROP type, DROP titre, DROP gouvernorat');
    }
}
