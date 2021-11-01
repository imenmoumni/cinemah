<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211022102129 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE salle_projection (id INT AUTO_INCREMENT NOT NULL, film_id INT DEFAULT NULL, cinema_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, nombre_place INT NOT NULL, image VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_EB883DBE567F5183 (film_id), INDEX IDX_EB883DBEB4CB84B6 (cinema_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE salle_projection ADD CONSTRAINT FK_EB883DBE567F5183 FOREIGN KEY (film_id) REFERENCES film (id)');
        $this->addSql('ALTER TABLE salle_projection ADD CONSTRAINT FK_EB883DBEB4CB84B6 FOREIGN KEY (cinema_id) REFERENCES cinema (id)');
        $this->addSql('ALTER TABLE user CHANGE date_naissance date_naissance INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE salle_projection');
        $this->addSql('ALTER TABLE user CHANGE date_naissance date_naissance INT DEFAULT NULL');
    }
}
