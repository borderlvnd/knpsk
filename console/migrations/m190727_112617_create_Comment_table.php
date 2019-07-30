<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Comment}}`.
 */
class m190727_112617_create_Comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Comment}}', [
            'id' => $this->primaryKey(),
            'content' => $this->string(400),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'created_by' => $this->integer(11),
            'updated_by'=>$this->integer(11),
            'film_id' => $this->integer(11),
            'parent_id' => $this->integer(11),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%Comment}}');
    }
}
