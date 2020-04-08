<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200408130048 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FB1F221C3');
        $this->addSql('DROP INDEX IDX_C53D045FB1F221C3 ON image');
        $this->addSql('ALTER TABLE image CHANGE publi_id publication_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F38B217A7 FOREIGN KEY (publication_id) REFERENCES publication (id)');
        $this->addSql('CREATE INDEX IDX_C53D045F38B217A7 ON image (publication_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F38B217A7');
        $this->addSql('DROP INDEX IDX_C53D045F38B217A7 ON image');
        $this->addSql('ALTER TABLE image CHANGE publication_id publi_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FB1F221C3 FOREIGN KEY (publi_id) REFERENCES publication (id)');
        $this->addSql('CREATE INDEX IDX_C53D045FB1F221C3 ON image (publi_id)');
    }
}
