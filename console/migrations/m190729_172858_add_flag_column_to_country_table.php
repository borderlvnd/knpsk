<?php

use yii\db\Migration;

/**
 * Handles adding flag to table `{{%country}}`.
 */
class m190729_172858_add_flag_column_to_country_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('country','flag', $this->string(10));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('country','flag');
    }
}
