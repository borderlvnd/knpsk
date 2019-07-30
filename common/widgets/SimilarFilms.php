<?php

namespace common\widgets;

use common\essences\FilmGenre;
use yii\base\Widget;
use yii\helpers\ArrayHelper;

class SimilarFilms extends Widget
{
    public $genres = [];
    public $film_id;

    public function run()
    {  //SELECT * FROM `filmgenre` WHERE `genre_id` IN (1,3,9) AND `film_id` <> 1
        $genres_arr = [];
        foreach ($this->genres as $item) {
            $genres_arr [] = $item->id;
        }
        $genres_str = 'genre_id IN (' . implode(',', $genres_arr) . ') AND film_id <>' . $this->film_id;
        echo '<pre>';
        $gen = FilmGenre::find()->where($genres_str)->all();
        $genre_return = [];
        foreach ($gen as $simple) {
            $genre_return [] = $simple->film_id;
        }

        return implode(',', $genre_return);

    }
}