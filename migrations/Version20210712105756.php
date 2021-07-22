<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210712105756 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adoption ADD user_id INT DEFAULT NULL, ADD animal_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE adoption ADD CONSTRAINT FK_EDDEB6A9A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE adoption ADD CONSTRAINT FK_EDDEB6A98E962C16 FOREIGN KEY (animal_id) REFERENCES fiche_animal (id)');
        $this->addSql('CREATE INDEX IDX_EDDEB6A9A76ED395 ON adoption (user_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EDDEB6A98E962C16 ON adoption (animal_id)');
        $this->addSql('ALTER TABLE commentaire_refuge ADD refuge_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commentaire_refuge ADD CONSTRAINT FK_E96D4F00AD3404C1 FOREIGN KEY (refuge_id) REFERENCES refuges (id)');
        $this->addSql('CREATE INDEX IDX_E96D4F00AD3404C1 ON commentaire_refuge (refuge_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adoption DROP FOREIGN KEY FK_EDDEB6A9A76ED395');
        $this->addSql('ALTER TABLE adoption DROP FOREIGN KEY FK_EDDEB6A98E962C16');
        $this->addSql('DROP INDEX IDX_EDDEB6A9A76ED395 ON adoption');
        $this->addSql('DROP INDEX UNIQ_EDDEB6A98E962C16 ON adoption');
        $this->addSql('ALTER TABLE adoption DROP user_id, DROP animal_id');
        $this->addSql('ALTER TABLE commentaire_refuge DROP FOREIGN KEY FK_E96D4F00AD3404C1');
        $this->addSql('DROP INDEX IDX_E96D4F00AD3404C1 ON commentaire_refuge');
        $this->addSql('ALTER TABLE commentaire_refuge DROP refuge_id');
    }
}
