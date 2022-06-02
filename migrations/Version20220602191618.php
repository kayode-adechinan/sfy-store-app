<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220602191618 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_D82832D74584665A');
        $this->addSql('CREATE TEMPORARY TABLE __temp__input AS SELECT id, product_id, qty FROM input');
        $this->addSql('DROP TABLE input');
        $this->addSql('CREATE TABLE input (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, product_id INTEGER NOT NULL, qty INTEGER NOT NULL, CONSTRAINT FK_D82832D74584665A FOREIGN KEY (product_id) REFERENCES product (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO input (id, product_id, qty) SELECT id, product_id, qty FROM __temp__input');
        $this->addSql('DROP TABLE __temp__input');
        $this->addSql('CREATE INDEX IDX_D82832D74584665A ON input (product_id)');
        $this->addSql('DROP INDEX IDX_CCDE149E4584665A');
        $this->addSql('CREATE TEMPORARY TABLE __temp__output AS SELECT id, product_id, qty FROM output');
        $this->addSql('DROP TABLE output');
        $this->addSql('CREATE TABLE output (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, product_id INTEGER NOT NULL, qty INTEGER NOT NULL, CONSTRAINT FK_CCDE149E4584665A FOREIGN KEY (product_id) REFERENCES product (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO output (id, product_id, qty) SELECT id, product_id, qty FROM __temp__output');
        $this->addSql('DROP TABLE __temp__output');
        $this->addSql('CREATE INDEX IDX_CCDE149E4584665A ON output (product_id)');
        $this->addSql('DROP INDEX IDX_D34A04ADA76ED395');
        $this->addSql('DROP INDEX IDX_D34A04AD12469DE2');
        $this->addSql('CREATE TEMPORARY TABLE __temp__product AS SELECT id, category_id, user_id, title FROM product');
        $this->addSql('DROP TABLE product');
        $this->addSql('CREATE TABLE product (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, category_id INTEGER DEFAULT NULL, user_id INTEGER DEFAULT NULL, title VARCHAR(255) NOT NULL, price INTEGER DEFAULT NULL, CONSTRAINT FK_D34A04AD12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_D34A04ADA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO product (id, category_id, user_id, title) SELECT id, category_id, user_id, title FROM __temp__product');
        $this->addSql('DROP TABLE __temp__product');
        $this->addSql('CREATE INDEX IDX_D34A04ADA76ED395 ON product (user_id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD12469DE2 ON product (category_id)');
        $this->addSql('DROP INDEX IDX_2DE8C6A3D60322AC');
        $this->addSql('DROP INDEX IDX_2DE8C6A3A76ED395');
        $this->addSql('CREATE TEMPORARY TABLE __temp__user_role AS SELECT user_id, role_id FROM user_role');
        $this->addSql('DROP TABLE user_role');
        $this->addSql('CREATE TABLE user_role (user_id INTEGER NOT NULL, role_id INTEGER NOT NULL, PRIMARY KEY(user_id, role_id), CONSTRAINT FK_2DE8C6A3A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_2DE8C6A3D60322AC FOREIGN KEY (role_id) REFERENCES role (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO user_role (user_id, role_id) SELECT user_id, role_id FROM __temp__user_role');
        $this->addSql('DROP TABLE __temp__user_role');
        $this->addSql('CREATE INDEX IDX_2DE8C6A3D60322AC ON user_role (role_id)');
        $this->addSql('CREATE INDEX IDX_2DE8C6A3A76ED395 ON user_role (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_D82832D74584665A');
        $this->addSql('CREATE TEMPORARY TABLE __temp__input AS SELECT id, product_id, qty FROM input');
        $this->addSql('DROP TABLE input');
        $this->addSql('CREATE TABLE input (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, product_id INTEGER NOT NULL, qty INTEGER NOT NULL)');
        $this->addSql('INSERT INTO input (id, product_id, qty) SELECT id, product_id, qty FROM __temp__input');
        $this->addSql('DROP TABLE __temp__input');
        $this->addSql('CREATE INDEX IDX_D82832D74584665A ON input (product_id)');
        $this->addSql('DROP INDEX IDX_CCDE149E4584665A');
        $this->addSql('CREATE TEMPORARY TABLE __temp__output AS SELECT id, product_id, qty FROM output');
        $this->addSql('DROP TABLE output');
        $this->addSql('CREATE TABLE output (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, product_id INTEGER NOT NULL, qty INTEGER NOT NULL)');
        $this->addSql('INSERT INTO output (id, product_id, qty) SELECT id, product_id, qty FROM __temp__output');
        $this->addSql('DROP TABLE __temp__output');
        $this->addSql('CREATE INDEX IDX_CCDE149E4584665A ON output (product_id)');
        $this->addSql('DROP INDEX IDX_D34A04AD12469DE2');
        $this->addSql('DROP INDEX IDX_D34A04ADA76ED395');
        $this->addSql('CREATE TEMPORARY TABLE __temp__product AS SELECT id, category_id, user_id, title FROM product');
        $this->addSql('DROP TABLE product');
        $this->addSql('CREATE TABLE product (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, category_id INTEGER DEFAULT NULL, user_id INTEGER DEFAULT NULL, title VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO product (id, category_id, user_id, title) SELECT id, category_id, user_id, title FROM __temp__product');
        $this->addSql('DROP TABLE __temp__product');
        $this->addSql('CREATE INDEX IDX_D34A04AD12469DE2 ON product (category_id)');
        $this->addSql('CREATE INDEX IDX_D34A04ADA76ED395 ON product (user_id)');
        $this->addSql('DROP INDEX IDX_2DE8C6A3A76ED395');
        $this->addSql('DROP INDEX IDX_2DE8C6A3D60322AC');
        $this->addSql('CREATE TEMPORARY TABLE __temp__user_role AS SELECT user_id, role_id FROM user_role');
        $this->addSql('DROP TABLE user_role');
        $this->addSql('CREATE TABLE user_role (user_id INTEGER NOT NULL, role_id INTEGER NOT NULL, PRIMARY KEY(user_id, role_id))');
        $this->addSql('INSERT INTO user_role (user_id, role_id) SELECT user_id, role_id FROM __temp__user_role');
        $this->addSql('DROP TABLE __temp__user_role');
        $this->addSql('CREATE INDEX IDX_2DE8C6A3A76ED395 ON user_role (user_id)');
        $this->addSql('CREATE INDEX IDX_2DE8C6A3D60322AC ON user_role (role_id)');
    }
}
