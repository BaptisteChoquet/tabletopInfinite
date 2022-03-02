<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220301144149 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE template ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE template ADD CONSTRAINT FK_97601F83A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_97601F83A76ED395 ON template (user_id)');
        $this->addSql('ALTER TABLE widget ADD auteur VARCHAR(20) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE template DROP FOREIGN KEY FK_97601F83A76ED395');
        $this->addSql('DROP INDEX IDX_97601F83A76ED395 ON template');
        $this->addSql('ALTER TABLE template DROP user_id');
        $this->addSql('ALTER TABLE widget DROP auteur');
    }
}
