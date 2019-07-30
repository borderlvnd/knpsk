<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%film}}`.
 */
class m190727_103335_create_film_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('{{%film}}', [
            'id' => $this->primaryKey(),
            'FilmName' => $this->string(200),
            'description' => $this->string(),
            'duration' => $this->string(10),
            'image' => $this->string(200),
            'ReleaseYear' => $this->integer(4),
            'Preview' => $this->string(200),
            'rating_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('{{%film}}');
    }
}
