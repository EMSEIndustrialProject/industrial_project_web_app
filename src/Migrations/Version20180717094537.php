<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180717094537 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, colocation_id INT NOT NULL, content LONGTEXT NOT NULL, deleted TINYINT(1) NOT NULL, creation DATE NOT NULL, updated DATE NOT NULL, INDEX IDX_B6BD307FA76ED395 (user_id), INDEX IDX_B6BD307F8B419309 (colocation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE colocation (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(20) NOT NULL, location LONGTEXT DEFAULT NULL, description LONGTEXT DEFAULT NULL, deleted TINYINT(1) NOT NULL, creation DATE NOT NULL, updated DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE weighted_user (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, expenses_id INT NOT NULL, nb_part DOUBLE PRECISION NOT NULL, deleted TINYINT(1) NOT NULL, creation DATE NOT NULL, updated DATE NOT NULL, INDEX IDX_F37E5365A76ED395 (user_id), INDEX IDX_F37E53652055804A (expenses_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shopping_item (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, colocation_id INT NOT NULL, name VARCHAR(20) NOT NULL, bought TINYINT(1) NOT NULL, deleted TINYINT(1) NOT NULL, creation DATE NOT NULL, updated DATE NOT NULL, INDEX IDX_6612795FA76ED395 (user_id), INDEX IDX_6612795F8B419309 (colocation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE expenses (id INT AUTO_INCREMENT NOT NULL, inside TINYINT(1) NOT NULL, price DOUBLE PRECISION NOT NULL, deleted TINYINT(1) NOT NULL, creation DATE NOT NULL, updated DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE expenses_colocation (expenses_id INT NOT NULL, colocation_id INT NOT NULL, INDEX IDX_662005482055804A (expenses_id), INDEX IDX_662005488B419309 (colocation_id), PRIMARY KEY(expenses_id, colocation_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, colocation_id INT DEFAULT NULL, pseudo VARCHAR(20) NOT NULL, password VARCHAR(255) DEFAULT NULL, number VARCHAR(12) DEFAULT NULL, deleted TINYINT(1) NOT NULL, creation DATE NOT NULL, updated DATE NOT NULL, INDEX IDX_8D93D6498B419309 (colocation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F8B419309 FOREIGN KEY (colocation_id) REFERENCES colocation (id)');
        $this->addSql('ALTER TABLE weighted_user ADD CONSTRAINT FK_F37E5365A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE weighted_user ADD CONSTRAINT FK_F37E53652055804A FOREIGN KEY (expenses_id) REFERENCES expenses (id)');
        $this->addSql('ALTER TABLE shopping_item ADD CONSTRAINT FK_6612795FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE shopping_item ADD CONSTRAINT FK_6612795F8B419309 FOREIGN KEY (colocation_id) REFERENCES colocation (id)');
        $this->addSql('ALTER TABLE expenses_colocation ADD CONSTRAINT FK_662005482055804A FOREIGN KEY (expenses_id) REFERENCES expenses (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE expenses_colocation ADD CONSTRAINT FK_662005488B419309 FOREIGN KEY (colocation_id) REFERENCES colocation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6498B419309 FOREIGN KEY (colocation_id) REFERENCES colocation (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F8B419309');
        $this->addSql('ALTER TABLE shopping_item DROP FOREIGN KEY FK_6612795F8B419309');
        $this->addSql('ALTER TABLE expenses_colocation DROP FOREIGN KEY FK_662005488B419309');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6498B419309');
        $this->addSql('ALTER TABLE weighted_user DROP FOREIGN KEY FK_F37E53652055804A');
        $this->addSql('ALTER TABLE expenses_colocation DROP FOREIGN KEY FK_662005482055804A');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FA76ED395');
        $this->addSql('ALTER TABLE weighted_user DROP FOREIGN KEY FK_F37E5365A76ED395');
        $this->addSql('ALTER TABLE shopping_item DROP FOREIGN KEY FK_6612795FA76ED395');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE colocation');
        $this->addSql('DROP TABLE weighted_user');
        $this->addSql('DROP TABLE shopping_item');
        $this->addSql('DROP TABLE expenses');
        $this->addSql('DROP TABLE expenses_colocation');
        $this->addSql('DROP TABLE user');
    }
}
