<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%FilmGenre}}`.
 */
class m190727_113445_create_FilmGenre_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('{{%FilmGenre}}', [
            'film_id' => $this->integer(),
            'genre_id' => $this->integer(),
        ]);
        $this->addPrimaryKey('film_genre_pl','FilmGenre',['film_id','genre_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('{{%FilmGenre}}');
    }
}
