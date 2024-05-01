<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240416122751 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cheque DROP FOREIGN KEY cheque_ibfk_1');
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY fk_id_user');
        $this->addSql('ALTER TABLE credit DROP FOREIGN KEY test');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_Reclamation_Transaction');
        $this->addSql('DROP TABLE cheque');
        $this->addSql('DROP TABLE compte');
        $this->addSql('DROP TABLE credit');
        $this->addSql('DROP TABLE demandecheque');
        $this->addSql('DROP TABLE demandedecarte');
        $this->addSql('DROP TABLE demandedecredit');
        $this->addSql('DROP TABLE rechargetel');
        $this->addSql('DROP TABLE reclamation');
        $this->addSql('DROP TABLE transaction');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP INDEX fk_user_id ON cartebancaire');
        $this->addSql('DROP INDEX fk_decarte_user ON cartebancaire');
        $this->addSql('ALTER TABLE marche DROP FOREIGN KEY fk_stock_marche');
        $this->addSql('ALTER TABLE marche CHANGE stock_id stock_id INT DEFAULT NULL');
        $this->addSql('DROP INDEX fk_stock_marche ON marche');
        $this->addSql('CREATE INDEX IDX_BAA18ACCDCD6110 ON marche (stock_id)');
        $this->addSql('ALTER TABLE marche ADD CONSTRAINT fk_stock_marche FOREIGN KEY (stock_id) REFERENCES stock (id)');
        $this->addSql('ALTER TABLE stock DROP FOREIGN KEY fk_ent_stock');
        $this->addSql('ALTER TABLE stock CHANGE entreprise_id entreprise_id INT DEFAULT NULL');
        $this->addSql('DROP INDEX fk_ent_stock ON stock');
        $this->addSql('CREATE INDEX IDX_4B365660A4AEAFEA ON stock (entreprise_id)');
        $this->addSql('ALTER TABLE stock ADD CONSTRAINT fk_ent_stock FOREIGN KEY (entreprise_id) REFERENCES entreprise (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cheque (numero_de_cheque INT AUTO_INCREMENT NOT NULL, numerocompte VARCHAR(20) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, montant DOUBLE PRECISION DEFAULT NULL, beneficiaire VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, date_emission VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, emetteur VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, statut VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, INDEX numéro_compte (numerocompte), PRIMARY KEY(numero_de_cheque)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE compte (id_compte INT AUTO_INCREMENT NOT NULL, id_user INT NOT NULL, solde INT DEFAULT 0 NOT NULL, date_de_creation DATE NOT NULL, type_compte VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, etat VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT \'activé\' NOT NULL COLLATE `utf8mb4_general_ci`, INDEX fk_id_user (id_user), PRIMARY KEY(id_compte)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE credit (id_demande INT NOT NULL, status VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, montant INT DEFAULT NULL, date DATE DEFAULT NULL, historique TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, INDEX test (id_demande), PRIMARY KEY(id_demande)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE demandecheque (numerocompte VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, montant_demandé DOUBLE PRECISION DEFAULT NULL, raison VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, date_demande VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, cin VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, num_telephone VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, type_cheque VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, statut_demande VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(numerocompte)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE demandedecarte (idcartdemande INT AUTO_INCREMENT NOT NULL, typecarte VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, reseaucarte VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, modapaiement VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, docjustificatifs VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, dateDemande VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, comdebanque VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, dateemission VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, cordodemandeur VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, statutdemande VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, iduser INT NOT NULL, INDEX fk_demandedecarte_user (iduser), PRIMARY KEY(idcartdemande)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE demandedecredit (cin INT NOT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, prenom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, phone INT DEFAULT NULL, typedecredit VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, etatcivil VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, bulletin TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, sommedecredit INT DEFAULT NULL, echeance INT DEFAULT NULL, PRIMARY KEY(cin)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE rechargetel (id_Rech INT AUTO_INCREMENT NOT NULL, operateur VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, montant INT NOT NULL, numTel INT NOT NULL, dateTemps VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(id_Rech)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE reclamation (id_trans INT DEFAULT NULL, id_Reclam INT AUTO_INCREMENT NOT NULL, Date VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Description VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Status VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Category VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, History VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, INDEX FK_Reclamation_Transaction (id_trans), PRIMARY KEY(id_Reclam)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE transaction (id_Trans INT AUTO_INCREMENT NOT NULL, expediteur VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, destinataire VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, montant INT NOT NULL, type VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, dateTemps VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, localisation VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, etat VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, description VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(id_Trans)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE user (id_user INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, prenom VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, age INT NOT NULL, email VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, telephone VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, password VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, role VARCHAR(20) CHARACTER SET utf8mb4 DEFAULT \'User\' COLLATE `utf8mb4_general_ci`, signature VARCHAR(30) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(id_user)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE cheque ADD CONSTRAINT cheque_ibfk_1 FOREIGN KEY (numerocompte) REFERENCES demandecheque (numerocompte)');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT fk_id_user FOREIGN KEY (id_user) REFERENCES user (id_user)');
        $this->addSql('ALTER TABLE credit ADD CONSTRAINT test FOREIGN KEY (id_demande) REFERENCES demandedecredit (cin) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_Reclamation_Transaction FOREIGN KEY (id_trans) REFERENCES transaction (id_Trans)');
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('CREATE INDEX fk_user_id ON cartebancaire (iduser)');
        $this->addSql('CREATE INDEX fk_decarte_user ON cartebancaire (idcartdemande)');
        $this->addSql('ALTER TABLE marche DROP FOREIGN KEY FK_BAA18ACCDCD6110');
        $this->addSql('ALTER TABLE marche CHANGE stock_id stock_id INT NOT NULL');
        $this->addSql('DROP INDEX idx_baa18accdcd6110 ON marche');
        $this->addSql('CREATE INDEX fk_stock_marche ON marche (stock_id)');
        $this->addSql('ALTER TABLE marche ADD CONSTRAINT FK_BAA18ACCDCD6110 FOREIGN KEY (stock_id) REFERENCES stock (id)');
        $this->addSql('ALTER TABLE stock DROP FOREIGN KEY FK_4B365660A4AEAFEA');
        $this->addSql('ALTER TABLE stock CHANGE entreprise_id entreprise_id INT NOT NULL');
        $this->addSql('DROP INDEX idx_4b365660a4aeafea ON stock');
        $this->addSql('CREATE INDEX fk_ent_stock ON stock (entreprise_id)');
        $this->addSql('ALTER TABLE stock ADD CONSTRAINT FK_4B365660A4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id)');
    }
}
