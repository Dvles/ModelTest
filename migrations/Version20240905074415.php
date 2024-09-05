<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240905074415 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE object_tool ADD user_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE object_tool ADD CONSTRAINT FK_BDE602C29D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_BDE602C29D86650F ON object_tool (user_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE object_tool DROP FOREIGN KEY FK_BDE602C29D86650F');
        $this->addSql('DROP INDEX IDX_BDE602C29D86650F ON object_tool');
        $this->addSql('ALTER TABLE object_tool DROP user_id_id');
    }
}
