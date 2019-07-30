<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%MPAA}}`.
 */
class m190727_114051_create_MPAA_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%MPAA}}', [
            'id' => $this->primaryKey(),
            'rating' => $this->string(20),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%MPAA}}');
    }
}
