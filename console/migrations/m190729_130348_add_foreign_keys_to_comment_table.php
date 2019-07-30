<?php

use yii\db\Migration;

/**
 * Class m190729_130348_add_foreign_keys_to_comment_table
 */
class m190729_130348_add_foreign_keys_to_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('comment-user-fk','comment','created_by',
            'user','id');
        $this->addForeignKey('user-comment-fk','comment','updated_by',
            'user','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190729_130348_add_foreign_keys_to_comment_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190729_130348_add_foreign_keys_to_comment_table cannot be reverted.\n";

        return false;
    }
    */
}
