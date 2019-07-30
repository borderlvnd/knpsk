<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_rating_films}}`.
 */
class m190728_130727_create_user_rating_films_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_rating_films}}', [
            'film_id' => $this->integer(),
            'user_rating_id' => $this->integer(),
        ]);
        $this->addPrimaryKey('user-rating-film','user_rating_films',['user_rating_id','film_id']);
        $this->addForeignKey('fk-user-rating-film',
            'user_rating_films',
            'film_id',
            'film',
            'id');
        $this->addForeignKey('fk-film-user-rating',
            'user_rating_films',
            'user_rating_id',
            'user_rating',
            'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-film-user-rating','user_rating_films');
        $this->dropForeignKey('user-rating-film','user_rating_films');
        $this->dropTable('{{%user_rating_films}}');
    }
}
