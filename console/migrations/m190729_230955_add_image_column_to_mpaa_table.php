<?php

use yii\db\Migration;

/**
 * Handles adding image to table `{{%mpaa}}`.
 */
class m190729_230955_add_image_column_to_mpaa_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('mpaa','image',$this->string(100));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('mpaa','image');
    }
}
