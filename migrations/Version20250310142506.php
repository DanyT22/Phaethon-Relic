<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250310142506 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bangboos_obtenu DROP FOREIGN KEY FK_B3AA9FC752EB5C84');
        $this->addSql('ALTER TABLE bangboos_obtenu DROP FOREIGN KEY FK_B3AA9FC7A76ED395');
        $this->addSql('ALTER TABLE moteurs_obtenu DROP FOREIGN KEY FK_97A7C7B5A76ED395');
        $this->addSql('ALTER TABLE moteurs_obtenu DROP FOREIGN KEY FK_97A7C7B56BF4B111');
        $this->addSql('ALTER TABLE personnages_obtenu DROP FOREIGN KEY FK_A1376D00A76ED395');
        $this->addSql('ALTER TABLE personnages_obtenu DROP FOREIGN KEY FK_A1376D005E315342');
        $this->addSql('DROP TABLE bangboos_obtenu');
        $this->addSql('DROP TABLE moteurs_obtenu');
        $this->addSql('DROP TABLE personnages_obtenu');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bangboos_obtenu (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, bangboo_id INT NOT NULL, INDEX IDX_B3AA9FC7A76ED395 (user_id), INDEX IDX_B3AA9FC752EB5C84 (bangboo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE moteurs_obtenu (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, moteur_id INT NOT NULL, INDEX IDX_97A7C7B5A76ED395 (user_id), INDEX IDX_97A7C7B56BF4B111 (moteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE personnages_obtenu (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, personnage_id INT NOT NULL, INDEX IDX_A1376D00A76ED395 (user_id), INDEX IDX_A1376D005E315342 (personnage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE bangboos_obtenu ADD CONSTRAINT FK_B3AA9FC752EB5C84 FOREIGN KEY (bangboo_id) REFERENCES bangboos (id)');
        $this->addSql('ALTER TABLE bangboos_obtenu ADD CONSTRAINT FK_B3AA9FC7A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE moteurs_obtenu ADD CONSTRAINT FK_97A7C7B5A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE moteurs_obtenu ADD CONSTRAINT FK_97A7C7B56BF4B111 FOREIGN KEY (moteur_id) REFERENCES moteurs (id)');
        $this->addSql('ALTER TABLE personnages_obtenu ADD CONSTRAINT FK_A1376D00A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE personnages_obtenu ADD CONSTRAINT FK_A1376D005E315342 FOREIGN KEY (personnage_id) REFERENCES personnages (id)');
    }
}
