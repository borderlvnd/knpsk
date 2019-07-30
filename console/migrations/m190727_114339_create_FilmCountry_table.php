<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%FilmCountry}}`.
 */
class m190727_114339_create_FilmCountry_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%FilmCountry}}', [
            'Film_id' => $this->integer(),
            'Country_id' => $this->integer(),
        ]);
        $this->addPrimaryKey('film_country_pk','FilmCountry',['Film_id','Country_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%FilmCountry}}');
    }
}
