<?php

use yii\db\Migration;

/**
 * Handles dropping producer_id from table `{{%films}}`.
 */
class m190808_092141_drop_producer_id_column_from_films_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('film','producer_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('film','producer_id',$this->integer());
    }
}
