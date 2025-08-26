<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250824082644 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE accueil ADD tick_auteur VARCHAR(255) NOT NULL, ADD tick_date_ouv DATE NOT NULL, ADD tick_date_clo DATE DEFAULT NULL, ADD tick_description VARCHAR(255) NOT NULL, ADD tick_categorie VARCHAR(255) NOT NULL, ADD tick_status TINYINT(1) DEFAULT 0 NOT NULL, DROP auteur, DROP date_ouv, DROP date_clo, DROP description, DROP categorie, DROP status, CHANGE responsable tick_responsable VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE accueil ADD auteur VARCHAR(255) NOT NULL, ADD date_clo DATE NOT NULL, ADD description VARCHAR(255) NOT NULL, ADD categorie VARCHAR(255) NOT NULL, ADD status TINYINT(1) NOT NULL, DROP tick_auteur, DROP tick_date_clo, DROP tick_description, DROP tick_categorie, DROP tick_status, CHANGE tick_date_ouv date_ouv DATE NOT NULL, CHANGE tick_responsable responsable VARCHAR(255) DEFAULT NULL');
    }
}
