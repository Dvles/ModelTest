<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240905080752 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE borrow_object ADD object_id_id INT NOT NULL, ADD user_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE borrow_object ADD CONSTRAINT FK_86522194FB67CAB5 FOREIGN KEY (object_id_id) REFERENCES object_tool (id)');
        $this->addSql('ALTER TABLE borrow_object ADD CONSTRAINT FK_865221949D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_86522194FB67CAB5 ON borrow_object (object_id_id)');
        $this->addSql('CREATE INDEX IDX_865221949D86650F ON borrow_object (user_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE borrow_object DROP FOREIGN KEY FK_86522194FB67CAB5');
        $this->addSql('ALTER TABLE borrow_object DROP FOREIGN KEY FK_865221949D86650F');
        $this->addSql('DROP INDEX IDX_86522194FB67CAB5 ON borrow_object');
        $this->addSql('DROP INDEX IDX_865221949D86650F ON borrow_object');
        $this->addSql('ALTER TABLE borrow_object DROP object_id_id, DROP user_id_id');
    }
}
