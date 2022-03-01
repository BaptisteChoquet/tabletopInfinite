<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220301093543 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE favory (id INT AUTO_INCREMENT NOT NULL, users_id INT NOT NULL, widget_id INT NOT NULL, INDEX IDX_F232B2A867B3B43D (users_id), INDEX IDX_F232B2A8FBE885E2 (widget_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE favory ADD CONSTRAINT FK_F232B2A867B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE favory ADD CONSTRAINT FK_F232B2A8FBE885E2 FOREIGN KEY (widget_id) REFERENCES widget (id)');
        $this->addSql('ALTER TABLE widget CHANGE contenu contenu LONGTEXT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE favory');
        $this->addSql('ALTER TABLE widget CHANGE contenu contenu LONGTEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_bin`');
    }
}
