<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250410132000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add a foreign key for vehicle types';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE rules ADD COLUMN vehicle_type_id INT;
            ALTER TABLE rules ADD constraint FK_Rules_Vehicle_Types FOREIGN KEY (vehicle_type_id) REFERENCES vehicle_types(id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE rules DROP vehicle_type_id;
        SQL);
    }  
}
