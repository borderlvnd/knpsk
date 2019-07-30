<?php

use yii\db\Migration;

/**
 * Handles adding photo to table `{{%Person}}`.
 */
class m190729_215557_add_photo_column_to_Person_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('person','photo',$this->string(100));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('person','photo');
    }
}
