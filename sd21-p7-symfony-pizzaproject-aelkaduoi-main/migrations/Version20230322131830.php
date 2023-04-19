<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230322131830 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bestelling (id INT AUTO_INCREMENT NOT NULL, product_id INT NOT NULL, voornaam VARCHAR(255) NOT NULL, achternaam VARCHAR(255) NOT NULL, adres VARCHAR(255) NOT NULL, postcode VARCHAR(255) NOT NULL, woonplaats VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, INDEX IDX_3114F84584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bestelling ADD CONSTRAINT FK_3114F84584665A FOREIGN KEY (product_id) REFERENCES product (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bestelling DROP FOREIGN KEY FK_3114F84584665A');
        $this->addSql('DROP TABLE bestelling');
    }
}
