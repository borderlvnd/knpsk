<?php

use yii\db\Migration;

/**
 * Handles adding lastVisit to table `{{%user}}`.
 */
class m190807_092115_add_lastVisit_column_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user','last_visit',$this->timestamp());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user','last_visit');
    }
}
