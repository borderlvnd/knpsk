<?php

namespace common\services;

use common\repositories\FilmRepository;

class FilmService
{
    public $FilmRepository;

    public function __construct(FilmRepository $FilmRepository)
    {
        $this->FilmRepository = $FilmRepository;
    }
}

?>