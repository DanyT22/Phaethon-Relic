<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250212141935 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bangboos (id INT AUTO_INCREMENT NOT NULL, rarete_id INT NOT NULL, nom_bangboo VARCHAR(100) NOT NULL, INDEX IDX_3A0C1EF29E795D2F (rarete_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bangboos_obtenu (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, bangboo_id INT NOT NULL, INDEX IDX_B3AA9FC7A76ED395 (user_id), INDEX IDX_B3AA9FC752EB5C84 (bangboo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE builds (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, personnage_id INT NOT NULL, disque1_id INT NOT NULL, disque2_id INT NOT NULL, disque3_id INT NOT NULL, disque4_id INT NOT NULL, disque5_id INT NOT NULL, disque6_id INT NOT NULL, INDEX IDX_AB264A5A76ED395 (user_id), INDEX IDX_AB264A55E315342 (personnage_id), INDEX IDX_AB264A5782C51C6 (disque1_id), INDEX IDX_AB264A56A99FE28 (disque2_id), INDEX IDX_AB264A5D225994D (disque3_id), INDEX IDX_AB264A54FF2A1F4 (disque4_id), INDEX IDX_AB264A5F74EC691 (disque5_id), INDEX IDX_AB264A5E5FB697F (disque6_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE disques (id INT AUTO_INCREMENT NOT NULL, ensemble_id INT NOT NULL, emplacement INT NOT NULL, main_stat VARCHAR(255) NOT NULL, sub_stat1 VARCHAR(255) NOT NULL, proc_sub_stat1 INT NOT NULL, sub_stat2 VARCHAR(255) NOT NULL, proc_sub_stat2 INT NOT NULL, sub_stat3 VARCHAR(255) NOT NULL, proc_sub_stat3 INT NOT NULL, sub_stat4 VARCHAR(255) NOT NULL, proc_sub_stat4 INT NOT NULL, INDEX IDX_2323A123B268ECB1 (ensemble_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE disques_obtenu (id INT AUTO_INCREMENT NOT NULL, disque_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_3B02965691161FE8 (disque_id), INDEX IDX_3B029656A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE elements (id INT AUTO_INCREMENT NOT NULL, element VARCHAR(20) NOT NULL, icon LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE factions (id INT AUTO_INCREMENT NOT NULL, faction VARCHAR(50) NOT NULL, icon LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE moteurs (id INT AUTO_INCREMENT NOT NULL, rarete_id INT NOT NULL, specialite_id INT NOT NULL, nom_moteur VARCHAR(100) NOT NULL, INDEX IDX_83A9FA39E795D2F (rarete_id), INDEX IDX_83A9FA32195E0F0 (specialite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE moteurs_obtenu (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, moteur_id INT NOT NULL, INDEX IDX_97A7C7B5A76ED395 (user_id), INDEX IDX_97A7C7B56BF4B111 (moteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnages (id INT AUTO_INCREMENT NOT NULL, rarete_id INT NOT NULL, element_id INT NOT NULL, specialite_id INT NOT NULL, faction_id INT NOT NULL, nom_personnage VARCHAR(255) NOT NULL, INDEX IDX_286738A69E795D2F (rarete_id), INDEX IDX_286738A61F1F2A24 (element_id), INDEX IDX_286738A62195E0F0 (specialite_id), INDEX IDX_286738A64448F8DA (faction_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnages_obtenu (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, personnage_id INT NOT NULL, INDEX IDX_A1376D00A76ED395 (user_id), INDEX IDX_A1376D005E315342 (personnage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE raretes (id INT AUTO_INCREMENT NOT NULL, rarete VARCHAR(5) NOT NULL, icon LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `set` (id INT AUTO_INCREMENT NOT NULL, nom_set VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE specialites (id INT AUTO_INCREMENT NOT NULL, specialite VARCHAR(50) NOT NULL, icon LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE team_member (id INT AUTO_INCREMENT NOT NULL, team_id INT NOT NULL, build_id INT NOT NULL, position INT NOT NULL, INDEX IDX_6FFBDA1296CD8AE (team_id), INDEX IDX_6FFBDA117C13F8B (build_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE teams (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, bangboo_id INT NOT NULL, INDEX IDX_96C22258A76ED395 (user_id), INDEX IDX_96C2225852EB5C84 (bangboo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, pseudos VARCHAR(50) NOT NULL, email VARCHAR(100) NOT NULL, password LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bangboos ADD CONSTRAINT FK_3A0C1EF29E795D2F FOREIGN KEY (rarete_id) REFERENCES raretes (id)');
        $this->addSql('ALTER TABLE bangboos_obtenu ADD CONSTRAINT FK_B3AA9FC7A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE bangboos_obtenu ADD CONSTRAINT FK_B3AA9FC752EB5C84 FOREIGN KEY (bangboo_id) REFERENCES bangboos (id)');
        $this->addSql('ALTER TABLE builds ADD CONSTRAINT FK_AB264A5A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE builds ADD CONSTRAINT FK_AB264A55E315342 FOREIGN KEY (personnage_id) REFERENCES personnages (id)');
        $this->addSql('ALTER TABLE builds ADD CONSTRAINT FK_AB264A5782C51C6 FOREIGN KEY (disque1_id) REFERENCES disques (id)');
        $this->addSql('ALTER TABLE builds ADD CONSTRAINT FK_AB264A56A99FE28 FOREIGN KEY (disque2_id) REFERENCES disques (id)');
        $this->addSql('ALTER TABLE builds ADD CONSTRAINT FK_AB264A5D225994D FOREIGN KEY (disque3_id) REFERENCES disques (id)');
        $this->addSql('ALTER TABLE builds ADD CONSTRAINT FK_AB264A54FF2A1F4 FOREIGN KEY (disque4_id) REFERENCES disques (id)');
        $this->addSql('ALTER TABLE builds ADD CONSTRAINT FK_AB264A5F74EC691 FOREIGN KEY (disque5_id) REFERENCES disques (id)');
        $this->addSql('ALTER TABLE builds ADD CONSTRAINT FK_AB264A5E5FB697F FOREIGN KEY (disque6_id) REFERENCES disques (id)');
        $this->addSql('ALTER TABLE disques ADD CONSTRAINT FK_2323A123B268ECB1 FOREIGN KEY (ensemble_id) REFERENCES `set` (id)');
        $this->addSql('ALTER TABLE disques_obtenu ADD CONSTRAINT FK_3B02965691161FE8 FOREIGN KEY (disque_id) REFERENCES disques (id)');
        $this->addSql('ALTER TABLE disques_obtenu ADD CONSTRAINT FK_3B029656A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE moteurs ADD CONSTRAINT FK_83A9FA39E795D2F FOREIGN KEY (rarete_id) REFERENCES raretes (id)');
        $this->addSql('ALTER TABLE moteurs ADD CONSTRAINT FK_83A9FA32195E0F0 FOREIGN KEY (specialite_id) REFERENCES specialites (id)');
        $this->addSql('ALTER TABLE moteurs_obtenu ADD CONSTRAINT FK_97A7C7B5A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE moteurs_obtenu ADD CONSTRAINT FK_97A7C7B56BF4B111 FOREIGN KEY (moteur_id) REFERENCES moteurs (id)');
        $this->addSql('ALTER TABLE personnages ADD CONSTRAINT FK_286738A69E795D2F FOREIGN KEY (rarete_id) REFERENCES raretes (id)');
        $this->addSql('ALTER TABLE personnages ADD CONSTRAINT FK_286738A61F1F2A24 FOREIGN KEY (element_id) REFERENCES elements (id)');
        $this->addSql('ALTER TABLE personnages ADD CONSTRAINT FK_286738A62195E0F0 FOREIGN KEY (specialite_id) REFERENCES specialites (id)');
        $this->addSql('ALTER TABLE personnages ADD CONSTRAINT FK_286738A64448F8DA FOREIGN KEY (faction_id) REFERENCES factions (id)');
        $this->addSql('ALTER TABLE personnages_obtenu ADD CONSTRAINT FK_A1376D00A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE personnages_obtenu ADD CONSTRAINT FK_A1376D005E315342 FOREIGN KEY (personnage_id) REFERENCES personnages (id)');
        $this->addSql('ALTER TABLE team_member ADD CONSTRAINT FK_6FFBDA1296CD8AE FOREIGN KEY (team_id) REFERENCES teams (id)');
        $this->addSql('ALTER TABLE team_member ADD CONSTRAINT FK_6FFBDA117C13F8B FOREIGN KEY (build_id) REFERENCES builds (id)');
        $this->addSql('ALTER TABLE teams ADD CONSTRAINT FK_96C22258A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE teams ADD CONSTRAINT FK_96C2225852EB5C84 FOREIGN KEY (bangboo_id) REFERENCES bangboos (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bangboos DROP FOREIGN KEY FK_3A0C1EF29E795D2F');
        $this->addSql('ALTER TABLE bangboos_obtenu DROP FOREIGN KEY FK_B3AA9FC7A76ED395');
        $this->addSql('ALTER TABLE bangboos_obtenu DROP FOREIGN KEY FK_B3AA9FC752EB5C84');
        $this->addSql('ALTER TABLE builds DROP FOREIGN KEY FK_AB264A5A76ED395');
        $this->addSql('ALTER TABLE builds DROP FOREIGN KEY FK_AB264A55E315342');
        $this->addSql('ALTER TABLE builds DROP FOREIGN KEY FK_AB264A5782C51C6');
        $this->addSql('ALTER TABLE builds DROP FOREIGN KEY FK_AB264A56A99FE28');
        $this->addSql('ALTER TABLE builds DROP FOREIGN KEY FK_AB264A5D225994D');
        $this->addSql('ALTER TABLE builds DROP FOREIGN KEY FK_AB264A54FF2A1F4');
        $this->addSql('ALTER TABLE builds DROP FOREIGN KEY FK_AB264A5F74EC691');
        $this->addSql('ALTER TABLE builds DROP FOREIGN KEY FK_AB264A5E5FB697F');
        $this->addSql('ALTER TABLE disques DROP FOREIGN KEY FK_2323A123B268ECB1');
        $this->addSql('ALTER TABLE disques_obtenu DROP FOREIGN KEY FK_3B02965691161FE8');
        $this->addSql('ALTER TABLE disques_obtenu DROP FOREIGN KEY FK_3B029656A76ED395');
        $this->addSql('ALTER TABLE moteurs DROP FOREIGN KEY FK_83A9FA39E795D2F');
        $this->addSql('ALTER TABLE moteurs DROP FOREIGN KEY FK_83A9FA32195E0F0');
        $this->addSql('ALTER TABLE moteurs_obtenu DROP FOREIGN KEY FK_97A7C7B5A76ED395');
        $this->addSql('ALTER TABLE moteurs_obtenu DROP FOREIGN KEY FK_97A7C7B56BF4B111');
        $this->addSql('ALTER TABLE personnages DROP FOREIGN KEY FK_286738A69E795D2F');
        $this->addSql('ALTER TABLE personnages DROP FOREIGN KEY FK_286738A61F1F2A24');
        $this->addSql('ALTER TABLE personnages DROP FOREIGN KEY FK_286738A62195E0F0');
        $this->addSql('ALTER TABLE personnages DROP FOREIGN KEY FK_286738A64448F8DA');
        $this->addSql('ALTER TABLE personnages_obtenu DROP FOREIGN KEY FK_A1376D00A76ED395');
        $this->addSql('ALTER TABLE personnages_obtenu DROP FOREIGN KEY FK_A1376D005E315342');
        $this->addSql('ALTER TABLE team_member DROP FOREIGN KEY FK_6FFBDA1296CD8AE');
        $this->addSql('ALTER TABLE team_member DROP FOREIGN KEY FK_6FFBDA117C13F8B');
        $this->addSql('ALTER TABLE teams DROP FOREIGN KEY FK_96C22258A76ED395');
        $this->addSql('ALTER TABLE teams DROP FOREIGN KEY FK_96C2225852EB5C84');
        $this->addSql('DROP TABLE bangboos');
        $this->addSql('DROP TABLE bangboos_obtenu');
        $this->addSql('DROP TABLE builds');
        $this->addSql('DROP TABLE disques');
        $this->addSql('DROP TABLE disques_obtenu');
        $this->addSql('DROP TABLE elements');
        $this->addSql('DROP TABLE factions');
        $this->addSql('DROP TABLE moteurs');
        $this->addSql('DROP TABLE moteurs_obtenu');
        $this->addSql('DROP TABLE personnages');
        $this->addSql('DROP TABLE personnages_obtenu');
        $this->addSql('DROP TABLE raretes');
        $this->addSql('DROP TABLE `set`');
        $this->addSql('DROP TABLE specialites');
        $this->addSql('DROP TABLE team_member');
        $this->addSql('DROP TABLE teams');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
