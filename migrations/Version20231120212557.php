<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231120212557 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE avis (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, commentaire VARCHAR(255) NOT NULL, note DOUBLE PRECISION NOT NULL, email VARCHAR(255) NOT NULL, is_published TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE carburants (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cars (id INT AUTO_INCREMENT NOT NULL, carburant_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, year DOUBLE PRECISION NOT NULL, kilometrage DOUBLE PRECISION NOT NULL, description LONGTEXT NOT NULL, illustration VARCHAR(255) NOT NULL, galery1 VARCHAR(255) DEFAULT NULL, galery2 VARCHAR(255) DEFAULT NULL, galery3 VARCHAR(255) DEFAULT NULL, galery4 VARCHAR(255) DEFAULT NULL, galery5 VARCHAR(255) DEFAULT NULL, galery6 VARCHAR(255) DEFAULT NULL, INDEX IDX_95C71D1432DAAD24 (carburant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cars_options (cars_id INT NOT NULL, options_id INT NOT NULL, INDEX IDX_4F8E5F498702F506 (cars_id), INDEX IDX_4F8E5F493ADB05F1 (options_id), PRIMARY KEY(cars_id, options_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, message VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employee (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_5D9F75A1E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE opening (id INT AUTO_INCREMENT NOT NULL, day VARCHAR(255) NOT NULL, open_morning DOUBLE PRECISION DEFAULT NULL, closed_morning DOUBLE PRECISION DEFAULT NULL, open_evening DOUBLE PRECISION DEFAULT NULL, closed_evening DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE options (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE services (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, illustration VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cars ADD CONSTRAINT FK_95C71D1432DAAD24 FOREIGN KEY (carburant_id) REFERENCES carburants (id)');
        $this->addSql('ALTER TABLE cars_options ADD CONSTRAINT FK_4F8E5F498702F506 FOREIGN KEY (cars_id) REFERENCES cars (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cars_options ADD CONSTRAINT FK_4F8E5F493ADB05F1 FOREIGN KEY (options_id) REFERENCES options (id) ON DELETE CASCADE');

        $hashedPassword = password_hash('1234', PASSWORD_BCRYPT);

        // Insert a new Employee record with the hashed password
        $this->addSql("INSERT INTO employee (email, roles, password, nom, prenom) VALUES ('seb@seb.fr', '[\"ROLE_ADMIN\"]', '$hashedPassword', 'Admin', 'User')");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cars DROP FOREIGN KEY FK_95C71D1432DAAD24');
        $this->addSql('ALTER TABLE cars_options DROP FOREIGN KEY FK_4F8E5F498702F506');
        $this->addSql('ALTER TABLE cars_options DROP FOREIGN KEY FK_4F8E5F493ADB05F1');
        $this->addSql('DROP TABLE avis');
        $this->addSql('DROP TABLE carburants');
        $this->addSql('DROP TABLE cars');
        $this->addSql('DROP TABLE cars_options');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE employee');
        $this->addSql('DROP TABLE opening');
        $this->addSql('DROP TABLE options');
        $this->addSql('DROP TABLE services');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
