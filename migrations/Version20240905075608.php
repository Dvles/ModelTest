<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240905075608 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lender_review ADD user_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE lender_review ADD CONSTRAINT FK_14FFCC369D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_14FFCC369D86650F ON lender_review (user_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lender_review DROP FOREIGN KEY FK_14FFCC369D86650F');
        $this->addSql('DROP INDEX IDX_14FFCC369D86650F ON lender_review');
        $this->addSql('ALTER TABLE lender_review DROP user_id_id');
    }
}
