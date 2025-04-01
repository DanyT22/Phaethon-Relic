<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250331073808 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE builds RENAME INDEX fk_ab264a56bf4b111 TO IDX_AB264A56BF4B111');
        $this->addSql('ALTER TABLE disques CHANGE valeur_sub_stat1 valeur_sub_stat1 DOUBLE PRECISION NOT NULL, CHANGE valeur_sub_stat2 valeur_sub_stat2 DOUBLE PRECISION NOT NULL, CHANGE valeur_sub_stat3 valeur_sub_stat3 DOUBLE PRECISION NOT NULL, CHANGE valeur_sub_stat4 valeur_sub_stat4 DOUBLE PRECISION NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE builds RENAME INDEX idx_ab264a56bf4b111 TO FK_AB264A56BF4B111');
        $this->addSql('ALTER TABLE disques CHANGE valeur_sub_stat1 valeur_sub_stat1 INT NOT NULL, CHANGE valeur_sub_stat2 valeur_sub_stat2 INT NOT NULL, CHANGE valeur_sub_stat3 valeur_sub_stat3 INT NOT NULL, CHANGE valeur_sub_stat4 valeur_sub_stat4 INT NOT NULL');
    }
}
