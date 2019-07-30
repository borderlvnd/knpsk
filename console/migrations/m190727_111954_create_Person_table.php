<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Person}}`.
 */
class m190727_111954_create_Person_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('{{%Person}}', [
            'id' => $this->primaryKey(),
            'FullName' => $this->string(),
            'function' => $this->integer(11),
            'country_id' => $this->integer(11),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('{{%Person}}');
    }
}
