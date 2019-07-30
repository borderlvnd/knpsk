<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_rating_film}}`.
 */
class m190728_234723_create_user_rating_film_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_rating_film}}', [
            'film_id' => $this->integer(),
            'user_id' => $this->integer(),
            'rating_id' => $this->integer(),
        ]);
        $this->addPrimaryKey('user-film-rating-ok',
            'user_rating_film',
            ['film_id','user_id','rating_id']);
        $this->addForeignKey('film-user-fk','user_rating_film',
            'film_id','film','id');
        $this->addForeignKey('user-user-fk','user_rating_film',
            'user_id','user','id');
        $this->addForeignKey('user-rating-fk','user_rating_film',
            'rating_id','user_rating','id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user_rating_film}}');
    }
}
