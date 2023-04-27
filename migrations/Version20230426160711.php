<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230426160711 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lits ADD nom_lit VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE patient ADD telephone VARCHAR(255) NOT NULL, ADD id_lit VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE salle ADD nb_lits_occupe VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE suivie CHANGE date_entré date_entre DATE NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lits DROP nom_lit');
        $this->addSql('ALTER TABLE patient DROP telephone, DROP id_lit');
        $this->addSql('ALTER TABLE salle DROP nb_lits_occupe');
        $this->addSql('ALTER TABLE suivie CHANGE date_entre date_entré DATE NOT NULL');
    }
}
