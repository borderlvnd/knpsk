<?php

namespace common\repositories;

use common\essences\Film;
use common\essences\FilmGenre;
use phpDocumentor\Reflection\Types\Integer;
use yii\helpers\ArrayHelper;

class FilmGenreRepository extends IRepository
{
    private $record;

    public function __construct(FilmGenre $filmGenre)
    {
        $this->record = $filmGenre;
    }

    public function getGenresIdsByFilmId($id)
    {
        return $this->getAllBy($this->record, ['film_id' => $id]);
    }

    public function getFilmIdsByGenreId(array $genres, $film_id)
    {
        $film_id = (integer)$film_id;
        $filmsLikeThisIds = ArrayHelper::getColumn($this->getAllBy($this->record,
            ['genre_id' => ["IN" => implode(',', $genres)]]), 'film_id');
        if (($search = array_search($film_id, $filmsLikeThisIds)) !== false) {
            unset($filmsLikeThisIds[$search]);
        }
        return $filmsLikeThisIds;
    }

}
