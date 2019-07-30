<?php

use yii\db\Migration;

/**
 * Handles adding releaseDate to table `{{%film}}`.
 */
class m190728_224218_add_releaseDate_column_to_film_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('film',
            'releaseYear',
            $this->integer(4));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('film','releaseYear');
    }
}
