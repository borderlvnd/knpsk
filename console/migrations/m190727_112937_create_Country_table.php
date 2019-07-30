<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Country}}`.
 */
class m190727_112937_create_Country_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Country}}', [
            'id' => $this->primaryKey(),
            'CountryName'=>$this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%Country}}');
    }
}
