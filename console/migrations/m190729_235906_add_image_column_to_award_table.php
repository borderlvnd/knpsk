<?php

use yii\db\Migration;

/**
 * Handles adding image to table `{{%award}}`.
 */
class m190729_235906_add_image_column_to_award_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('award','image',$this->string(100));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('award','image');
    }
}
