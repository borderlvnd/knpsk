<?php

use yii\db\Migration;

/**
 * Class m190808_112909_add_user_favorites_table
 */
class m190808_112909_add_user_favorites_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user_films', [
            'user_id' => $this->integer(),
            'film_id' => $this->integer()
        ]);
        $this->addPrimaryKey('user-films-pk', 'user_films', ['user_id', 'film_id']);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user_films');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190808_112909_add_user_favorites_table cannot be reverted.\n";

        return false;
    }
    */
}
