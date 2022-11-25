<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221125093702 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE season_controller (id INT AUTO_INCREMENT NOT NULL, program_id INT NOT NULL, number INT NOT NULL, year INT NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_7CCCAB3D3EB8070A (program_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE season_controller ADD CONSTRAINT FK_7CCCAB3D3EB8070A FOREIGN KEY (program_id) REFERENCES program (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE season_controller DROP FOREIGN KEY FK_7CCCAB3D3EB8070A');
        $this->addSql('DROP TABLE season_controller');
    }
}
