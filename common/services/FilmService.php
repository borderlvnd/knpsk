<?php

namespace common\services;

use common\essences\Film;
use common\repositories\FilmRepository;
use common\repositories\RatingRepository;

class FilmService
{
    public $film;
    public $rating;

    public function __construct(FilmRepository $film, ratingRepository $rating)
    {
        $this->film = $film;
        $this->rating = $rating;
    }

    public function getAvg($id)
    {
        $film = $this->film->getById($id);
       // $film = Film::find()->where(['id' => $id])->one();

        if (!empty($film->userRatings)) {
            return array_sum(array_map(
                    function ($val) {
                        return $val['rating'];
                    }, $film->userRatings)) / count(array_map(
                    function ($val) {
                        return $val['rating'];
                    }, $film->userRatings
                ));
        }
    }
}