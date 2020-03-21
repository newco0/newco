<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200321094953 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE discussion (id INT AUTO_INCREMENT NOT NULL, id_exp_id INT NOT NULL, dest_id INT NOT NULL, date_register DATE NOT NULL, date_update DATE NOT NULL, date_delete DATE NOT NULL, INDEX IDX_C0B9F90FF4519D17 (id_exp_id), INDEX IDX_C0B9F90F79839897 (dest_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE discussion_history (id INT AUTO_INCREMENT NOT NULL, discussion_id INT NOT NULL, user_id INT NOT NULL, text VARCHAR(255) NOT NULL, message VARCHAR(255) NOT NULL, is_active TINYINT(1) NOT NULL, is_seen TINYINT(1) NOT NULL, date_register DATE NOT NULL, date_update DATE NOT NULL, date_delete DATE NOT NULL, INDEX IDX_AFE456F61ADED311 (discussion_id), INDEX IDX_AFE456F6A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE discussion ADD CONSTRAINT FK_C0B9F90FF4519D17 FOREIGN KEY (id_exp_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE discussion ADD CONSTRAINT FK_C0B9F90F79839897 FOREIGN KEY (dest_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE discussion_history ADD CONSTRAINT FK_AFE456F61ADED311 FOREIGN KEY (discussion_id) REFERENCES discussion (id)');
        $this->addSql('ALTER TABLE discussion_history ADD CONSTRAINT FK_AFE456F6A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE discussion_history DROP FOREIGN KEY FK_AFE456F61ADED311');
        $this->addSql('DROP TABLE discussion');
        $this->addSql('DROP TABLE discussion_history');
    }
}
