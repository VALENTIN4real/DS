<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201006090013 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, code_client INT NOT NULL, nom_client VARCHAR(30) NOT NULL, prenom_client VARCHAR(30) NOT NULL, rue_client VARCHAR(100) NOT NULL, code_postal_client VARCHAR(5) NOT NULL, ville_client VARCHAR(30) NOT NULL, tel_client VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE echantillon (id INT AUTO_INCREMENT NOT NULL, code_echantillon INT NOT NULL, date_entree DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE echantillon_client (echantillon_id INT NOT NULL, client_id INT NOT NULL, INDEX IDX_9875CC41286F5A9 (echantillon_id), INDEX IDX_9875CC419EB6921 (client_id), PRIMARY KEY(echantillon_id, client_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE realiser (id INT AUTO_INCREMENT NOT NULL, code_echantillon_id INT DEFAULT NULL, ref_type_analyse_id INT DEFAULT NULL, INDEX IDX_7BAB8D0759BF3253 (code_echantillon_id), INDEX IDX_7BAB8D07930F5B3A (ref_type_analyse_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_analyse (id INT AUTO_INCREMENT NOT NULL, ref_type_analyse INT NOT NULL, designation_type_analyse VARCHAR(100) NOT NULL, prix_type_analyse VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE echantillon_client ADD CONSTRAINT FK_9875CC41286F5A9 FOREIGN KEY (echantillon_id) REFERENCES echantillon (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE echantillon_client ADD CONSTRAINT FK_9875CC419EB6921 FOREIGN KEY (client_id) REFERENCES client (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE realiser ADD CONSTRAINT FK_7BAB8D0759BF3253 FOREIGN KEY (code_echantillon_id) REFERENCES echantillon (id)');
        $this->addSql('ALTER TABLE realiser ADD CONSTRAINT FK_7BAB8D07930F5B3A FOREIGN KEY (ref_type_analyse_id) REFERENCES type_analyse (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE echantillon_client DROP FOREIGN KEY FK_9875CC419EB6921');
        $this->addSql('ALTER TABLE echantillon_client DROP FOREIGN KEY FK_9875CC41286F5A9');
        $this->addSql('ALTER TABLE realiser DROP FOREIGN KEY FK_7BAB8D0759BF3253');
        $this->addSql('ALTER TABLE realiser DROP FOREIGN KEY FK_7BAB8D07930F5B3A');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE echantillon');
        $this->addSql('DROP TABLE echantillon_client');
        $this->addSql('DROP TABLE realiser');
        $this->addSql('DROP TABLE type_analyse');
    }
}
