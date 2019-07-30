<?php

use yii\db\Migration;

/**
 * Class m190729_125603_add_person_id_to_comment_table
 */
class m190729_125603_add_person_id_to_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('comment','person_id',$this->integer());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('comment','person_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190729_125603_add_person_id_to_comment_table cannot be reverted.\n";

        return false;
    }
    */
}
