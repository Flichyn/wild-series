<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210112194906 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE actor CHANGE updated_at updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE actor CHANGE actor_picture picture VARCHAR(255) DEFAULT NULL');
//        $this->addSql('ALTER TABLE program CHANGE updated_at updated_at DATETIME NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE actor CHANGE updated_at updated_at DATETIME DEFAULT NULL, CHANGE picture actor_picture VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE program CHANGE updated_at updated_at DATETIME DEFAULT NULL');
    }
}
