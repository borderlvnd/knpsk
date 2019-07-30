<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Award}}`.
 */
class m190727_113004_create_Award_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Award}}', [
            'id' => $this->primaryKey(),
            'AwardName' => $this->string(50),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%Award}}');
    }
}
