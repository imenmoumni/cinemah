<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211111123409 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avs DROP FOREIGN KEY FK_63D86F3BA9CD190');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP INDEX IDX_63D86F3BA9CD190 ON avs');
        $this->addSql('ALTER TABLE avs DROP commentaire_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, admin_id INT DEFAULT NULL, user_id INT DEFAULT NULL, medecin_id INT DEFAULT NULL, avs_id INT DEFAULT NULL, center_id INT DEFAULT NULL, no_id INT NOT NULL, text VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_67F068BCE4727B63 (avs_id), INDEX IDX_67F068BC642B8210 (admin_id), INDEX IDX_67F068BC5932F377 (center_id), INDEX IDX_67F068BCA76ED395 (user_id), INDEX IDX_67F068BC1A65C546 (no_id), INDEX IDX_67F068BC4F31A84 (medecin_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC1A65C546 FOREIGN KEY (no_id) REFERENCES medecin (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC4F31A84 FOREIGN KEY (medecin_id) REFERENCES medecin (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC5932F377 FOREIGN KEY (center_id) REFERENCES center (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC642B8210 FOREIGN KEY (admin_id) REFERENCES admin (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCE4727B63 FOREIGN KEY (avs_id) REFERENCES avs (id)');
        $this->addSql('ALTER TABLE avs ADD commentaire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE avs ADD CONSTRAINT FK_63D86F3BA9CD190 FOREIGN KEY (commentaire_id) REFERENCES commentaire (id)');
        $this->addSql('CREATE INDEX IDX_63D86F3BA9CD190 ON avs (commentaire_id)');
    }
}
