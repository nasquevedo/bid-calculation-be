<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250410213231 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            INSERT INTO rules (name, vehicle_type_id, attributes, created_at, deleted) VALUES
            ('Basic', 1, '{"percentage": 10, "min": 10, "max": 50}', CURRENT_TIMESTAMP, false),
            ('Basic', 2, '{"percentage": 10, "min": 25, "max": 200}', CURRENT_TIMESTAMP, false),
            ('Special', 1, '{"percentage": 2}', CURRENT_TIMESTAMP, false),
            ('Special', 2, '{"percentage": 4}', CURRENT_TIMESTAMP, false),
            ('Association', null, '[{"value": 5, "min": 1, "max": 500 },{"value": 10, "min": 500, "max": 1000 }, {"value": 15, "min": 1000, "max": 3000 }, {"value": 20, "min": 3000 }]', CURRENT_TIMESTAMP, false),
            ('Storage', null, '{"value": 100}', CURRENT_TIMESTAMP, false)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            TRUNCATE rules
        SQL);
    }
}
