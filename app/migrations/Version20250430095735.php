<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250430095735 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE galaxy ALTER modele DROP NOT NULL');
        $this->addSql('ALTER TABLE galaxy ADD CONSTRAINT FK_F6BB137610028558 FOREIGN KEY (modele) REFERENCES modeles (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_F6BB137610028558 ON galaxy (modele)');
        $this->addSql('ALTER TABLE modeles_files ADD CONSTRAINT FK_9BD3EEA708408C FOREIGN KEY (modeles_id) REFERENCES modeles (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE modeles_files ADD CONSTRAINT FK_9BD3EEAE6CD4E8C FOREIGN KEY (directus_files_id) REFERENCES directus_files (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_9BD3EEA708408C ON modeles_files (modeles_id)');
        $this->addSql('CREATE INDEX IDX_9BD3EEAE6CD4E8C ON modeles_files (directus_files_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE galaxy DROP CONSTRAINT FK_F6BB137610028558');
        $this->addSql('DROP INDEX IDX_F6BB137610028558');
        $this->addSql('ALTER TABLE galaxy ALTER modele SET NOT NULL');
        $this->addSql('ALTER TABLE modeles_files DROP CONSTRAINT FK_9BD3EEA708408C');
        $this->addSql('ALTER TABLE modeles_files DROP CONSTRAINT FK_9BD3EEAE6CD4E8C');
        $this->addSql('DROP INDEX IDX_9BD3EEA708408C');
        $this->addSql('DROP INDEX IDX_9BD3EEAE6CD4E8C');
    }
}
