<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231120192515 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cars ADD galery1 VARCHAR(255) DEFAULT NULL, ADD galery2 VARCHAR(255) DEFAULT NULL, ADD galery3 VARCHAR(255) DEFAULT NULL, ADD galery4 VARCHAR(255) DEFAULT NULL, ADD galery5 VARCHAR(255) DEFAULT NULL, ADD galery6 VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cars DROP galery1, DROP galery2, DROP galery3, DROP galery4, DROP galery5, DROP galery6');
    }
}
