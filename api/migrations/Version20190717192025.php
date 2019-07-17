<?php

namespace GoApero\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20190717192025 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE places DROP FOREIGN KEY FK_FEAF6C551BAD3D98');
        $this->addSql('DROP INDEX IDX_FEAF6C551BAD3D98 ON places');
        $this->addSql('ALTER TABLE places CHANGE cetegory_id category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE places ADD CONSTRAINT FK_FEAF6C5512469DE2 FOREIGN KEY (category_id) REFERENCES categories (id)');
        $this->addSql('CREATE INDEX IDX_FEAF6C5512469DE2 ON places (category_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE places DROP FOREIGN KEY FK_FEAF6C5512469DE2');
        $this->addSql('DROP INDEX IDX_FEAF6C5512469DE2 ON places');
        $this->addSql('ALTER TABLE places CHANGE category_id cetegory_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE places ADD CONSTRAINT FK_FEAF6C551BAD3D98 FOREIGN KEY (cetegory_id) REFERENCES categories (id)');
        $this->addSql('CREATE INDEX IDX_FEAF6C551BAD3D98 ON places (cetegory_id)');
    }
}
