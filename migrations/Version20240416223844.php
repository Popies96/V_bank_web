<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240416223844 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cheque (numero_de_cheque INT NOT NULL, montant DOUBLE PRECISION NOT NULL, beneficiaire VARCHAR(255) NOT NULL, date_emission DATE NOT NULL, emetteur VARCHAR(255) NOT NULL, statut VARCHAR(255) NOT NULL, numerocompte VARCHAR(20) DEFAULT NULL, INDEX IDX_A0BBFDE9EA9195C1 (numerocompte), PRIMARY KEY(numero_de_cheque)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE demandecheque (numerocompte VARCHAR(20) NOT NULL, montant_demande DOUBLE PRECISION NOT NULL, raison VARCHAR(255) NOT NULL, date_demande DATE NOT NULL, cin VARCHAR(255) NOT NULL, num_telephone VARCHAR(255) NOT NULL, type_cheque VARCHAR(255) NOT NULL, statut_demande VARCHAR(255) NOT NULL, PRIMARY KEY(numerocompte)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE cheque ADD CONSTRAINT FK_A0BBFDE9EA9195C1 FOREIGN KEY (numerocompte) REFERENCES demandecheque (numerocompte)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cheque DROP FOREIGN KEY FK_A0BBFDE9EA9195C1');
        $this->addSql('DROP TABLE cheque');
        $this->addSql('DROP TABLE demandecheque');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
