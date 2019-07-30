<?php

use yii\db\Migration;

/**
 * Handles adding history to table `{{%person}}`.
 */
class m190730_001557_add_history_column_to_person_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('person','history',$this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('person','history');
    }
}
