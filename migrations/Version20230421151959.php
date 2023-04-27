<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230421151959 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE hopital (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, téléphone VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lits (id INT AUTO_INCREMENT NOT NULL, etat TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE patient (id INT AUTO_INCREMENT NOT NULL, suivie_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, age VARCHAR(255) NOT NULL, sexe VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, téléphone VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_1ADAD7EB9189D8F (suivie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salle (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, nombre_lit VARCHAR(255) NOT NULL, nb_lits_occupé VARCHAR(255) NOT NULL, services VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE suivie (id INT AUTO_INCREMENT NOT NULL, date_entré DATE NOT NULL, date_sortie DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE suivie_salle (suivie_id INT NOT NULL, salle_id INT NOT NULL, INDEX IDX_6A78158E9189D8F (suivie_id), INDEX IDX_6A78158EDC304035 (salle_id), PRIMARY KEY(suivie_id, salle_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE patient ADD CONSTRAINT FK_1ADAD7EB9189D8F FOREIGN KEY (suivie_id) REFERENCES suivie (id)');
        $this->addSql('ALTER TABLE suivie_salle ADD CONSTRAINT FK_6A78158E9189D8F FOREIGN KEY (suivie_id) REFERENCES suivie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE suivie_salle ADD CONSTRAINT FK_6A78158EDC304035 FOREIGN KEY (salle_id) REFERENCES salle (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE patient DROP FOREIGN KEY FK_1ADAD7EB9189D8F');
        $this->addSql('ALTER TABLE suivie_salle DROP FOREIGN KEY FK_6A78158E9189D8F');
        $this->addSql('ALTER TABLE suivie_salle DROP FOREIGN KEY FK_6A78158EDC304035');
        $this->addSql('DROP TABLE hopital');
        $this->addSql('DROP TABLE lits');
        $this->addSql('DROP TABLE patient');
        $this->addSql('DROP TABLE salle');
        $this->addSql('DROP TABLE suivie');
        $this->addSql('DROP TABLE suivie_salle');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
