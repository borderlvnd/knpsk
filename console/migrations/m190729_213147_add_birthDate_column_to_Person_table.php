<?php

use yii\db\Migration;

/**
 * Handles adding birthDate to table `{{%Person}}`.
 */
class m190729_213147_add_birthDate_column_to_Person_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('person','birthDate',$this->date());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('person','birthDate');
    }
}
