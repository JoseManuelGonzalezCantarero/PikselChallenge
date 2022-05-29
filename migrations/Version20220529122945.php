<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220529122945 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create royalties table';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE royalties (id INT AUTO_INCREMENT NOT NULL, rightsowner_id VARCHAR(50) NOT NULL, rightsowner VARCHAR(30) NOT NULL, royalty DOUBLE PRECISION NOT NULL, viewings INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE royalties');
    }
}
