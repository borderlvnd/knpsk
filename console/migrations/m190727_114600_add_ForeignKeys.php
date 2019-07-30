<?php

use yii\db\Migration;

/**
 * Class m190727_114600_add_ForeignKeys
 */
class m190727_114600_add_ForeignKeys extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->addForeignKey('country_film_fk','FilmCountry','Film_id','Film','id');
        $this->addForeignKey('film_country_fk','FilmCountry','Country_id','Country','id');

        $this->addForeignKey('genre_film_fk', 'filmgenre','film_id','Film','id');
        $this->addForeignKey('film_genre_fk','filmgenre','genre_id','Genre','id');

      $this->addForeignKey('person_film_fk','FilmPerson','film_id','Film','id');
        $this->addForeignKey('film_person_fk','FilmPerson','person_id','Person','id');

       $this->addForeignKey('award_person_fk','AwardPerson','award_id','Award','id');
        $this->addForeignKey('person_award_fk','AwardPerson','person_id','Person','id');

        $this->addForeignKey('film_rating_fk','Film','rating_id','MPAA','id');
       $this->addForeignKey('parent_comment_fk','Comment','parent_id','Comment','id');
       $this->addForeignKey('film_comment_fk','Comment','film_id','Film','id');
        $this->addForeignKey('person_country_fk','Person','country_id','Country','id');
  }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
       $this->dropForeignKey('film_rating_fk','MPAA');
       $this->dropForeignKey('parent_comment_fk','Comment');
      $this->dropForeignKey('film_comment_fk','Comment');
       $this->dropForeignKey('person_award_fk','AwardPerson');
       $this->dropForeignKey('award_person_fk','AwardPerson');
       $this->dropForeignKey('film_person_fk','FilmPerson');
       $this->dropForeignKey('person_film_fk','FilmPerson');
       $this->dropForeignKey('film_genre_fk','filmgenre');
       $this->dropForeignKey('genre_film_fk','filmgenre');
       $this->dropForeignKey('film_country_fk','FilmCountry');
       $this->dropForeignKey('country_film_fk','FilmCountry');
       $this->dropForeignKey('function_person_fk','Person');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190727_114600_add_ForeignKeys cannot be reverted.\n";

        return false;
    }
    */
}
