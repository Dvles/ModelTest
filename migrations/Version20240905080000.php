<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240905080000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE object_review ADD object_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE object_review ADD CONSTRAINT FK_37C321C6FB67CAB5 FOREIGN KEY (object_id_id) REFERENCES object_tool (id)');
        $this->addSql('CREATE INDEX IDX_37C321C6FB67CAB5 ON object_review (object_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE object_review DROP FOREIGN KEY FK_37C321C6FB67CAB5');
        $this->addSql('DROP INDEX IDX_37C321C6FB67CAB5 ON object_review');
        $this->addSql('ALTER TABLE object_review DROP object_id_id');
    }
}
