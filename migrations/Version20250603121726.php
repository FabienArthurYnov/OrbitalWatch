<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250603121726 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE agency (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, slug VARCHAR(100) NOT NULL, country VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE favorite (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, mission_id INT NOT NULL, created_at DATE NOT NULL, INDEX IDX_68C58ED9A76ED395 (user_id), INDEX IDX_68C58ED9BE6CAE90 (mission_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE mission (id INT AUTO_INCREMENT NOT NULL, agency_id INT DEFAULT NULL, name VARCHAR(100) NOT NULL, is_crewed TINYINT(1) NOT NULL, launch_date DATE DEFAULT NULL, last_updated DATE NOT NULL, INDEX IDX_9067F23CCDEADB2A (agency_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE favorite ADD CONSTRAINT FK_68C58ED9A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE favorite ADD CONSTRAINT FK_68C58ED9BE6CAE90 FOREIGN KEY (mission_id) REFERENCES mission (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE mission ADD CONSTRAINT FK_9067F23CCDEADB2A FOREIGN KEY (agency_id) REFERENCES agency (id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE favorite DROP FOREIGN KEY FK_68C58ED9A76ED395
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE favorite DROP FOREIGN KEY FK_68C58ED9BE6CAE90
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE mission DROP FOREIGN KEY FK_9067F23CCDEADB2A
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE agency
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE favorite
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE mission
        SQL);
    }
}
