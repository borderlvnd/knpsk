<?php

use yii\db\Migration;

/**
 * Class m190729_125833_add_foreign_key_to_comment_table
 */
class m190729_125833_add_foreign_key_to_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
$this->addForeignKey('comment-person0fk','comment','person_id',
    'person','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190729_125833_add_foreign_key_to_comment_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190729_125833_add_foreign_key_to_comment_table cannot be reverted.\n";

        return false;
    }
    */
}
