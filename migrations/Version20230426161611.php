<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230426161611 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE patient DROP FOREIGN KEY FK_1ADAD7EB9189D8F');
        $this->addSql('DROP INDEX UNIQ_1ADAD7EB9189D8F ON patient');
        $this->addSql('ALTER TABLE patient DROP suivie_id');
        $this->addSql('ALTER TABLE suivie ADD patient_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE suivie ADD CONSTRAINT FK_92F358216B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_92F358216B899279 ON suivie (patient_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE patient ADD suivie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE patient ADD CONSTRAINT FK_1ADAD7EB9189D8F FOREIGN KEY (suivie_id) REFERENCES suivie (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1ADAD7EB9189D8F ON patient (suivie_id)');
        $this->addSql('ALTER TABLE suivie DROP FOREIGN KEY FK_92F358216B899279');
        $this->addSql('DROP INDEX UNIQ_92F358216B899279 ON suivie');
        $this->addSql('ALTER TABLE suivie DROP patient_id');
    }
}
