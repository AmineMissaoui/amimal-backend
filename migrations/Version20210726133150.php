<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210726133150 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commentaire_refuge (id INT AUTO_INCREMENT NOT NULL, refuge_id INT DEFAULT NULL, user_id INT DEFAULT NULL, contenu VARCHAR(255) DEFAULT NULL, INDEX IDX_E96D4F00AD3404C1 (refuge_id), INDEX IDX_E96D4F00A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commentaire_refuge ADD CONSTRAINT FK_E96D4F00AD3404C1 FOREIGN KEY (refuge_id) REFERENCES refuges (id)');
        $this->addSql('ALTER TABLE commentaire_refuge ADD CONSTRAINT FK_E96D4F00A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('DROP TABLE refuge');
        $this->addSql('ALTER TABLE adoption ADD user_id INT DEFAULT NULL, ADD animal_id INT DEFAULT NULL, DROP user, DROP animal');
        $this->addSql('ALTER TABLE adoption ADD CONSTRAINT FK_EDDEB6A9A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE adoption ADD CONSTRAINT FK_EDDEB6A98E962C16 FOREIGN KEY (animal_id) REFERENCES fiche_animal (id)');
        $this->addSql('CREATE INDEX IDX_EDDEB6A9A76ED395 ON adoption (user_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EDDEB6A98E962C16 ON adoption (animal_id)');
        $this->addSql('ALTER TABLE declaration ADD fk_user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE declaration ADD CONSTRAINT FK_7AA3DAC25741EEB9 FOREIGN KEY (fk_user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_7AA3DAC25741EEB9 ON declaration (fk_user_id)');
        $this->addSql('ALTER TABLE fiche_animal ADD image VARCHAR(255) DEFAULT NULL, CHANGE nbre_like refuge_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE fiche_animal ADD CONSTRAINT FK_DCB78EC8AD3404C1 FOREIGN KEY (refuge_id) REFERENCES refuges (id)');
        $this->addSql('CREATE INDEX IDX_DCB78EC8AD3404C1 ON fiche_animal (refuge_id)');
        $this->addSql('ALTER TABLE intervention ADD fk_user_id INT DEFAULT NULL, ADD fk_declaration_id INT DEFAULT NULL, ADD type VARCHAR(100) NOT NULL, ADD date DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE intervention ADD CONSTRAINT FK_D11814AB5741EEB9 FOREIGN KEY (fk_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE intervention ADD CONSTRAINT FK_D11814ABB56CB14A FOREIGN KEY (fk_declaration_id) REFERENCES declaration (id)');
        $this->addSql('CREATE INDEX IDX_D11814AB5741EEB9 ON intervention (fk_user_id)');
        $this->addSql('CREATE INDEX IDX_D11814ABB56CB14A ON intervention (fk_declaration_id)');
        $this->addSql('ALTER TABLE refuges ADD nbre_like INT DEFAULT NULL, CHANGE latitude latitude VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE refuge (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, adresse VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, longitude DOUBLE PRECISION NOT NULL, latitude DOUBLE PRECISION NOT NULL, place_disponible INT NOT NULL, telephone VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, contact_principale VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE commentaire_refuge');
        $this->addSql('ALTER TABLE adoption DROP FOREIGN KEY FK_EDDEB6A9A76ED395');
        $this->addSql('ALTER TABLE adoption DROP FOREIGN KEY FK_EDDEB6A98E962C16');
        $this->addSql('DROP INDEX IDX_EDDEB6A9A76ED395 ON adoption');
        $this->addSql('DROP INDEX UNIQ_EDDEB6A98E962C16 ON adoption');
        $this->addSql('ALTER TABLE adoption ADD user INT DEFAULT NULL, ADD animal INT DEFAULT NULL, DROP user_id, DROP animal_id');
        $this->addSql('ALTER TABLE declaration DROP FOREIGN KEY FK_7AA3DAC25741EEB9');
        $this->addSql('DROP INDEX IDX_7AA3DAC25741EEB9 ON declaration');
        $this->addSql('ALTER TABLE declaration DROP fk_user_id');
        $this->addSql('ALTER TABLE fiche_animal DROP FOREIGN KEY FK_DCB78EC8AD3404C1');
        $this->addSql('DROP INDEX IDX_DCB78EC8AD3404C1 ON fiche_animal');
        $this->addSql('ALTER TABLE fiche_animal DROP image, CHANGE refuge_id nbre_like INT DEFAULT NULL');
        $this->addSql('ALTER TABLE intervention DROP FOREIGN KEY FK_D11814AB5741EEB9');
        $this->addSql('ALTER TABLE intervention DROP FOREIGN KEY FK_D11814ABB56CB14A');
        $this->addSql('DROP INDEX IDX_D11814AB5741EEB9 ON intervention');
        $this->addSql('DROP INDEX IDX_D11814ABB56CB14A ON intervention');
        $this->addSql('ALTER TABLE intervention DROP fk_user_id, DROP fk_declaration_id, DROP type, DROP date');
        $this->addSql('ALTER TABLE refuges DROP nbre_like, CHANGE latitude latitude NUMERIC(10, 3) DEFAULT NULL');
    }
}
