<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200321104437 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE comments (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, publication_id INT DEFAULT NULL, text VARCHAR(255) NOT NULL, is_active TINYINT(1) NOT NULL, is_seen TINYINT(1) NOT NULL, date_register DATETIME NOT NULL, date_update DATETIME NOT NULL, date_delete DATETIME NOT NULL, INDEX IDX_5F9E962AA76ED395 (user_id), INDEX IDX_5F9E962A38B217A7 (publication_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE discussion (id INT AUTO_INCREMENT NOT NULL, exp_id INT NOT NULL, dest_id INT NOT NULL, date_register DATE NOT NULL, date_update DATE NOT NULL, date_delete DATE NOT NULL, INDEX IDX_C0B9F90FD26628FA (exp_id), INDEX IDX_C0B9F90F79839897 (dest_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE discussion_history (id INT AUTO_INCREMENT NOT NULL, discussion_id INT NOT NULL, user_id INT NOT NULL, text VARCHAR(255) NOT NULL, message VARCHAR(255) NOT NULL, is_active TINYINT(1) NOT NULL, is_seen TINYINT(1) NOT NULL, date_register DATE NOT NULL, date_update DATE NOT NULL, date_delete DATE NOT NULL, INDEX IDX_AFE456F61ADED311 (discussion_id), INDEX IDX_AFE456F6A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE interaction (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, publication_id INT NOT NULL, type SMALLINT NOT NULL, is_active TINYINT(1) NOT NULL, date_register DATETIME NOT NULL, date_update DATETIME NOT NULL, date_delete DATETIME NOT NULL, INDEX IDX_378DFDA7A76ED395 (user_id), INDEX IDX_378DFDA738B217A7 (publication_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE publication (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, is_active TINYINT(1) NOT NULL, date_register DATETIME NOT NULL, date_update DATETIME NOT NULL, date_delete DATETIME NOT NULL, INDEX IDX_AF3C6779A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962AA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A38B217A7 FOREIGN KEY (publication_id) REFERENCES publication (id)');
        $this->addSql('ALTER TABLE discussion ADD CONSTRAINT FK_C0B9F90FD26628FA FOREIGN KEY (exp_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE discussion ADD CONSTRAINT FK_C0B9F90F79839897 FOREIGN KEY (dest_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE discussion_history ADD CONSTRAINT FK_AFE456F61ADED311 FOREIGN KEY (discussion_id) REFERENCES discussion (id)');
        $this->addSql('ALTER TABLE discussion_history ADD CONSTRAINT FK_AFE456F6A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE interaction ADD CONSTRAINT FK_378DFDA7A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE interaction ADD CONSTRAINT FK_378DFDA738B217A7 FOREIGN KEY (publication_id) REFERENCES publication (id)');
        $this->addSql('ALTER TABLE publication ADD CONSTRAINT FK_AF3C6779A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('DROP INDEX IDX_4C62E63879F37AE5 ON contact');
        $this->addSql('ALTER TABLE contact CHANGE id_user_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E638A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_4C62E638A76ED395 ON contact (user_id)');
        $this->addSql('ALTER TABLE friend DROP FOREIGN KEY FK_55EEAC6179F37AE5');
        $this->addSql('DROP INDEX idx_55eeac6179f37ae5 ON friend');
        $this->addSql('CREATE INDEX IDX_55EEAC61A76ED395 ON friend (user_id)');
        $this->addSql('ALTER TABLE friend ADD CONSTRAINT FK_55EEAC6179F37AE5 FOREIGN KEY (user_id) REFERENCES users (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE discussion_history DROP FOREIGN KEY FK_AFE456F61ADED311');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962A38B217A7');
        $this->addSql('ALTER TABLE interaction DROP FOREIGN KEY FK_378DFDA738B217A7');
        $this->addSql('DROP TABLE comments');
        $this->addSql('DROP TABLE discussion');
        $this->addSql('DROP TABLE discussion_history');
        $this->addSql('DROP TABLE interaction');
        $this->addSql('DROP TABLE publication');
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E638A76ED395');
        $this->addSql('DROP INDEX IDX_4C62E638A76ED395 ON contact');
        $this->addSql('ALTER TABLE contact CHANGE user_id id_user_id INT NOT NULL');
        $this->addSql('CREATE INDEX IDX_4C62E63879F37AE5 ON contact (id_user_id)');
        $this->addSql('ALTER TABLE friend DROP FOREIGN KEY FK_55EEAC61A76ED395');
        $this->addSql('DROP INDEX idx_55eeac61a76ed395 ON friend');
        $this->addSql('CREATE INDEX IDX_55EEAC6179F37AE5 ON friend (user_id)');
        $this->addSql('ALTER TABLE friend ADD CONSTRAINT FK_55EEAC61A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
    }
}
