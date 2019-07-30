<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%AwardPerson}}`.
 */
class m190727_113056_create_AwardPerson_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%AwardPerson}}', [
            'Award_id' => $this->integer(),
            'Person_id' => $this->integer(),
        ]);
        $this->addPrimaryKey('award_person_pk','AwardPerson',['Award_id','Person_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%AwardPerson}}');
    }
}
