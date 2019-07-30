<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%FilmPerson}}`.
 */
class m190727_114030_create_FilmPerson_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%FilmPerson}}', [
            'Film_id' => $this->integer(),
            'Person_id' => $this->integer(),
        ]);
        $this->addPrimaryKey('film_person_pk','FilmPerson',['Film_id','Person_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%FilmPerson}}');
    }
}
