<?php

namespace common\services;

use common\repositories\FilmPersonRepository;

class FilmPersonService
{
    public $filmPersonRepository;

    public function __construct(FilmPersonRepository $filmPersonRepository)
    {
        $this->filmPersonRepository = $filmPersonRepository;

    }

}