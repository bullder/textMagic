<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240901205240 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE result (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, test_id INTEGER DEFAULT NULL, score INTEGER NOT NULL, max_score INTEGER NOT NULL, CONSTRAINT FK_136AC1131E5D0459 FOREIGN KEY (test_id) REFERENCES test (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_136AC1131E5D0459 ON result (test_id)');
        $this->addSql('CREATE TABLE result_question (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, result_id INTEGER DEFAULT NULL, question_id INTEGER DEFAULT NULL, selected_answer_id INTEGER DEFAULT NULL, CONSTRAINT FK_11F256AD7A7B643 FOREIGN KEY (result_id) REFERENCES result (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_11F256AD1E27F6BF FOREIGN KEY (question_id) REFERENCES question (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_11F256ADF24C5BEC FOREIGN KEY (selected_answer_id) REFERENCES answer (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_11F256AD7A7B643 ON result_question (result_id)');
        $this->addSql('CREATE INDEX IDX_11F256AD1E27F6BF ON result_question (question_id)');
        $this->addSql('CREATE INDEX IDX_11F256ADF24C5BEC ON result_question (selected_answer_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE result');
        $this->addSql('DROP TABLE result_question');
    }
}
