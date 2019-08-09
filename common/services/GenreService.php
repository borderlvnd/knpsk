<?php

namespace common\services;

use common\essences\Genre;
use common\repositories\GenreRepository;

class GenreService
{
    public $genreRepository;

    public function __construct(GenreRepository $genreRepository)
    {
        $this->genreRepository = $genreRepository;
    }
}
