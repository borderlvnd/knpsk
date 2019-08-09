<?php

namespace common\services;

use common\repositories\FilmGenreRepository;
use yii\helpers\ArrayHelper;

class FilmGenreService
{
    public $filmGenreRepository;

    public function __construct(FilmGenreRepository $filmGenreRepository)
    {
        $this->filmGenreRepository = $filmGenreRepository;
    }

    public function findFilmsLikeThis($id)
    {
        $genres_arr = ArrayHelper::getColumn($this->filmGenreRepository->getGenresIdsByFilmId($id),'genre_id');
        $simFilms = $this->filmGenreRepository->getFilmIdsByGenreId($genres_arr,$id);
        return $simFilms;
    }


}