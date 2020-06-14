<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200613061552 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE aventurier (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, race VARCHAR(255) NOT NULL, align INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE aventurier_quest (aventurier_id INT NOT NULL, quest_id INT NOT NULL, INDEX IDX_920B9222EDDC7141 (aventurier_id), INDEX IDX_920B9222209E9EF4 (quest_id), PRIMARY KEY(aventurier_id, quest_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classe (id INT AUTO_INCREMENT NOT NULL, voie_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_8F87BF96EAAC89CF (voie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quest (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, nb_heroes INT NOT NULL, started_at DATE NOT NULL, difficulty INT NOT NULL, align INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quest_voie (quest_id INT NOT NULL, voie_id INT NOT NULL, INDEX IDX_AB76458A209E9EF4 (quest_id), INDEX IDX_AB76458AEAAC89CF (voie_id), PRIMARY KEY(quest_id, voie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE taverne (id INT AUTO_INCREMENT NOT NULL, aventuriers_id INT DEFAULT NULL, classes_id INT DEFAULT NULL, lvl INT NOT NULL, INDEX IDX_AD5A8A27E6471052 (aventuriers_id), INDEX IDX_AD5A8A279E225B24 (classes_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE voie (id INT AUTO_INCREMENT NOT NULL, master VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE aventurier_quest ADD CONSTRAINT FK_920B9222EDDC7141 FOREIGN KEY (aventurier_id) REFERENCES aventurier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE aventurier_quest ADD CONSTRAINT FK_920B9222209E9EF4 FOREIGN KEY (quest_id) REFERENCES quest (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE classe ADD CONSTRAINT FK_8F87BF96EAAC89CF FOREIGN KEY (voie_id) REFERENCES voie (id)');
        $this->addSql('ALTER TABLE quest_voie ADD CONSTRAINT FK_AB76458A209E9EF4 FOREIGN KEY (quest_id) REFERENCES quest (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE quest_voie ADD CONSTRAINT FK_AB76458AEAAC89CF FOREIGN KEY (voie_id) REFERENCES voie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE taverne ADD CONSTRAINT FK_AD5A8A27E6471052 FOREIGN KEY (aventuriers_id) REFERENCES aventurier (id)');
        $this->addSql('ALTER TABLE taverne ADD CONSTRAINT FK_AD5A8A279E225B24 FOREIGN KEY (classes_id) REFERENCES classe (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE aventurier_quest DROP FOREIGN KEY FK_920B9222EDDC7141');
        $this->addSql('ALTER TABLE taverne DROP FOREIGN KEY FK_AD5A8A27E6471052');
        $this->addSql('ALTER TABLE taverne DROP FOREIGN KEY FK_AD5A8A279E225B24');
        $this->addSql('ALTER TABLE aventurier_quest DROP FOREIGN KEY FK_920B9222209E9EF4');
        $this->addSql('ALTER TABLE quest_voie DROP FOREIGN KEY FK_AB76458A209E9EF4');
        $this->addSql('ALTER TABLE classe DROP FOREIGN KEY FK_8F87BF96EAAC89CF');
        $this->addSql('ALTER TABLE quest_voie DROP FOREIGN KEY FK_AB76458AEAAC89CF');
        $this->addSql('DROP TABLE aventurier');
        $this->addSql('DROP TABLE aventurier_quest');
        $this->addSql('DROP TABLE classe');
        $this->addSql('DROP TABLE quest');
        $this->addSql('DROP TABLE quest_voie');
        $this->addSql('DROP TABLE taverne');
        $this->addSql('DROP TABLE voie');
    }
}
