<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_rating}}`.
 */
class m190728_130326_create_user_rating_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_rating}}', [
            'id' => $this->primaryKey(),
            'rating' => $this->integer(2),
            'user_id'=> $this->integer(),
        ]);
        $this->addForeignKey('user-rating-fk','user_rating','user_id','user','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('user-rating-fk','user_rating');
        $this->dropTable('{{%user_rating}}');
    }
}
