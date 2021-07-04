<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210704191702 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE donation (id INT AUTO_INCREMENT NOT NULL, montant DOUBLE PRECISION NOT NULL, description VARCHAR(200) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE don DROP FOREIGN KEY FK_F8F081D9A76ED395');
        $this->addSql('DROP INDEX IDX_F8F081D9A76ED395 ON don');
        $this->addSql('ALTER TABLE don DROP user_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE donation');
        $this->addSql('ALTER TABLE don ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE don ADD CONSTRAINT FK_F8F081D9A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_F8F081D9A76ED395 ON don (user_id)');
    }
}