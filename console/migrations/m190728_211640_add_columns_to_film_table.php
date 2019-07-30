<?php

use yii\db\Migration;

/**
 * Class m190728_211640_add_columns_to_film_table
 */
class m190728_211640_add_columns_to_film_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->addColumn('film',
            'producer_id',
            $this->integer());
        $this->addColumn('film','country_id', $this->integer());
        $this->addColumn('film','user_rating_id',$this->integer());

        $this->addForeignKey('film-country-fk','film',
            'country_id','country','id');
        $this->addForeignKey('film-user-rating-fk','film','user_rating_id',
            'user_rating','id');
        $this->addForeignKey('film-producer-fk','film',
            'producer_id','Person','id');
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190728_211640_add_columns_to_film_table cannot be reverted.\n";

        return false;
    }
    */
}
