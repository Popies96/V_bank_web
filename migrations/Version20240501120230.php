<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240501120230 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY fk_id_user');
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY fk_id_user');
        $this->addSql('ALTER TABLE compte CHANGE id_user id_user INT DEFAULT NULL, CHANGE solde solde INT NOT NULL');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF652606B3CA4B FOREIGN KEY (id_user) REFERENCES user (id_user)');
        $this->addSql('DROP INDEX fk_id_user ON compte');
        $this->addSql('CREATE INDEX IDX_CFF652606B3CA4B ON compte (id_user)');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT fk_id_user FOREIGN KEY (id_user) REFERENCES user (id_user) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reset_password_request ADD CONSTRAINT FK_7CE748A6B3CA4B FOREIGN KEY (id_user) REFERENCES user (id_user)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF652606B3CA4B');
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF652606B3CA4B');
        $this->addSql('ALTER TABLE compte CHANGE id_user id_user INT NOT NULL, CHANGE solde solde INT DEFAULT 0 NOT NULL');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT fk_id_user FOREIGN KEY (id_user) REFERENCES user (id_user) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('DROP INDEX idx_cff652606b3ca4b ON compte');
        $this->addSql('CREATE INDEX fk_id_user ON compte (id_user)');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF652606B3CA4B FOREIGN KEY (id_user) REFERENCES user (id_user)');
        $this->addSql('ALTER TABLE reset_password_request DROP FOREIGN KEY FK_7CE748A6B3CA4B');
    }
}
