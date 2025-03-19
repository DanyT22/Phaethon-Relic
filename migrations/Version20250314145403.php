<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250314145403 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bangboos ADD prerequis VARCHAR(100) NOT NULL');
        $this->addSql('ALTER TABLE elements DROP icon');
        $this->addSql('ALTER TABLE factions DROP icon');
        $this->addSql('ALTER TABLE raretes DROP icon');
        $this->addSql('ALTER TABLE `set` ADD effet2pc LONGTEXT NOT NULL, ADD effet4pc LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE specialites DROP icon');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bangboos DROP prerequis');
        $this->addSql('ALTER TABLE elements ADD icon LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE factions ADD icon LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE raretes ADD icon LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE `set` DROP effet2pc, DROP effet4pc');
        $this->addSql('ALTER TABLE specialites ADD icon LONGTEXT NOT NULL');
    }
}
