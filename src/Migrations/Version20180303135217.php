<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180303135217 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE users (id INT UNSIGNED AUTO_INCREMENT NOT NULL, email VARCHAR(100) NOT NULL, password VARCHAR(100) NOT NULL, role VARCHAR(100) NOT NULL, reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP, last_visit TIMESTAMP DEFAULT \'0000-00-00 00:00:00\', UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), INDEX email_password (email, password), INDEX role_reg_date (role, reg_date), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users_about (id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, user INT UNSIGNED NOT NULL, item ENUM(\'country\',\'firstname\',\'state\'), value VARCHAR(250) NOT NULL, up_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, INDEX user (user), INDEX user_item_value (user, item, value), INDEX item (item), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE users_about ADD CONSTRAINT `users_about_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE users_about');
    }
}
