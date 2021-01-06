<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210105154519 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
//        $this->addSql('CREATE TABLE actor_program (actor_id INT NOT NULL, program_id INT NOT NULL, INDEX IDX_B01827EE10DAF24A (actor_id), INDEX IDX_B01827EE3EB8070A (program_id), PRIMARY KEY(actor_id, program_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
//        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, author_id INT NOT NULL, episode_id INT NOT NULL, comment LONGTEXT NOT NULL, rate INT DEFAULT NULL, INDEX IDX_9474526CF675F31B (author_id), INDEX IDX_9474526C362B62A0 (episode_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
//        $this->addSql('CREATE TABLE episode (id INT AUTO_INCREMENT NOT NULL, season_id INT NOT NULL, title VARCHAR(100) NOT NULL, number INT NOT NULL, synopsis LONGTEXT DEFAULT NULL, slug VARCHAR(255) NOT NULL, INDEX IDX_DDAA1CDA4EC001D1 (season_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
//        $this->addSql('CREATE TABLE episode_actor (episode_id INT NOT NULL, actor_id INT NOT NULL, INDEX IDX_7F7FA0AD362B62A0 (episode_id), INDEX IDX_7F7FA0AD10DAF24A (actor_id), PRIMARY KEY(episode_id, actor_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
//        $this->addSql('CREATE TABLE program (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, owner_id INT NOT NULL, title VARCHAR(100) NOT NULL, summary LONGTEXT NOT NULL, poster VARCHAR(255) DEFAULT NULL, slug VARCHAR(255) NOT NULL, INDEX IDX_92ED778412469DE2 (category_id), INDEX IDX_92ED77847E3C61F9 (owner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
//        $this->addSql('CREATE TABLE season (id INT AUTO_INCREMENT NOT NULL, program_id INT NOT NULL, number INT NOT NULL, year INT NOT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_F0E45BA93EB8070A (program_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
//        $this->addSql('CREATE TABLE user_program (user_id INT NOT NULL, program_id INT NOT NULL, INDEX IDX_CAE0698EA76ED395 (user_id), INDEX IDX_CAE0698E3EB8070A (program_id), PRIMARY KEY(user_id, program_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
//        $this->addSql('ALTER TABLE actor_program ADD CONSTRAINT FK_B01827EE10DAF24A FOREIGN KEY (actor_id) REFERENCES actor (id) ON DELETE CASCADE');
//        $this->addSql('ALTER TABLE actor_program ADD CONSTRAINT FK_B01827EE3EB8070A FOREIGN KEY (program_id) REFERENCES program (id) ON DELETE CASCADE');
//        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CF675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
//        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C362B62A0 FOREIGN KEY (episode_id) REFERENCES episode (id)');
//        $this->addSql('ALTER TABLE episode ADD CONSTRAINT FK_DDAA1CDA4EC001D1 FOREIGN KEY (season_id) REFERENCES season (id)');
//        $this->addSql('ALTER TABLE episode_actor ADD CONSTRAINT FK_7F7FA0AD362B62A0 FOREIGN KEY (episode_id) REFERENCES episode (id) ON DELETE CASCADE');
//        $this->addSql('ALTER TABLE episode_actor ADD CONSTRAINT FK_7F7FA0AD10DAF24A FOREIGN KEY (actor_id) REFERENCES actor (id) ON DELETE CASCADE');
//        $this->addSql('ALTER TABLE program ADD CONSTRAINT FK_92ED778412469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
//        $this->addSql('ALTER TABLE program ADD CONSTRAINT FK_92ED77847E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id)');
//        $this->addSql('ALTER TABLE season ADD CONSTRAINT FK_F0E45BA93EB8070A FOREIGN KEY (program_id) REFERENCES program (id)');
//        $this->addSql('ALTER TABLE user_program ADD CONSTRAINT FK_CAE0698EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
//        $this->addSql('ALTER TABLE user_program ADD CONSTRAINT FK_CAE0698E3EB8070A FOREIGN KEY (program_id) REFERENCES program (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C362B62A0');
        $this->addSql('ALTER TABLE episode_actor DROP FOREIGN KEY FK_7F7FA0AD362B62A0');
        $this->addSql('ALTER TABLE actor_program DROP FOREIGN KEY FK_B01827EE3EB8070A');
        $this->addSql('ALTER TABLE season DROP FOREIGN KEY FK_F0E45BA93EB8070A');
        $this->addSql('ALTER TABLE user_program DROP FOREIGN KEY FK_CAE0698E3EB8070A');
        $this->addSql('ALTER TABLE episode DROP FOREIGN KEY FK_DDAA1CDA4EC001D1');
        $this->addSql('DROP TABLE actor_program');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE episode');
        $this->addSql('DROP TABLE episode_actor');
        $this->addSql('DROP TABLE program');
        $this->addSql('DROP TABLE season');
        $this->addSql('DROP TABLE user_program');
    }
}
