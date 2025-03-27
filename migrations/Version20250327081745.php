<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250327081745 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE builds ADD moteur_id INT NOT NULL');
        $this->addSql('ALTER TABLE builds ADD CONSTRAINT FK_AB264A56BF4B111 FOREIGN KEY (moteur_id) REFERENCES moteurs (id)');
        $this->addSql('CREATE INDEX IDX_AB264A56BF4B111 ON builds (moteur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE builds DROP FOREIGN KEY FK_AB264A56BF4B111');
        $this->addSql('DROP INDEX IDX_AB264A56BF4B111 ON builds');
        $this->addSql('ALTER TABLE builds DROP moteur_id');
    }
}
