<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250325125730 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE disques ADD valeur_sub_stat1 INT NOT NULL, ADD valeur_sub_stat2 INT NOT NULL, ADD valeur_sub_stat3 INT NOT NULL, ADD valeur_sub_stat4 INT NOT NULL, DROP proc_sub_stat1, DROP proc_sub_stat2, DROP proc_sub_stat3, DROP proc_sub_stat4');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE disques ADD proc_sub_stat1 INT NOT NULL, ADD proc_sub_stat2 INT NOT NULL, ADD proc_sub_stat3 INT NOT NULL, ADD proc_sub_stat4 INT NOT NULL, DROP valeur_sub_stat1, DROP valeur_sub_stat2, DROP valeur_sub_stat3, DROP valeur_sub_stat4');
    }
}
