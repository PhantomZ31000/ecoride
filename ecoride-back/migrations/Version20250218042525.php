<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250218042525 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE configuration ADD parameter_key VARCHAR(255) NOT NULL, ADD parameter_value VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE dispose ADD name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE marque ADD name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE parametre ADD name VARCHAR(255) NOT NULL, ADD value VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE configuration DROP parameter_key, DROP parameter_value');
        $this->addSql('ALTER TABLE dispose DROP name');
        $this->addSql('ALTER TABLE marque DROP name');
        $this->addSql('ALTER TABLE parametre DROP name, DROP value');
    }
}
