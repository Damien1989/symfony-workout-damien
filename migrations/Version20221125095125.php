<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221125095125 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE season (id INT AUTO_INCREMENT NOT NULL, program_id INT NOT NULL, number INT NOT NULL, year INT NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_F0E45BA93EB8070A (program_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE season ADD CONSTRAINT FK_F0E45BA93EB8070A FOREIGN KEY (program_id) REFERENCES program (id)');
        $this->addSql('ALTER TABLE season_controller DROP FOREIGN KEY FK_7CCCAB3D3EB8070A');
        $this->addSql('DROP TABLE season_controller');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE season_controller (id INT AUTO_INCREMENT NOT NULL, program_id INT NOT NULL, number INT NOT NULL, year INT NOT NULL, description LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_7CCCAB3D3EB8070A (program_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE season_controller ADD CONSTRAINT FK_7CCCAB3D3EB8070A FOREIGN KEY (program_id) REFERENCES program (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE season DROP FOREIGN KEY FK_F0E45BA93EB8070A');
        $this->addSql('DROP TABLE season');
    }
}
