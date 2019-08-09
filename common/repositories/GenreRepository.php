<?php

namespace common\repositories;

use common\essences\Genre;

class GenreRepository extends IRepository
{
    public $record;

    public function __construct(Genre $genreRepository)
    {
        $this->record = $genreRepository;
    }

    public function getGenreById($id)
    {
        return $this->getBy($this->record,['id'=>$id]);
    }
}