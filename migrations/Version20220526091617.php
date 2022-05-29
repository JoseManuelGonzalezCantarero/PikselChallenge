<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220526091617 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create episodes table';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE episodes (id VARCHAR(50) NOT NULL, rightsowner_id VARCHAR(50) NOT NULL, name VARCHAR(100) NOT NULL, INDEX IDX_7DD55EDDC8934801 (rightsowner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE episodes ADD CONSTRAINT FK_7DD55EDDC8934801 FOREIGN KEY (rightsowner_id) REFERENCES studios (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE episodes DROP FOREIGN KEY FK_7DD55EDDC8934801');
        $this->addSql('DROP TABLE episodes');
    }
}
