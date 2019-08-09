<?php
namespace common\services;

use common\essences\Person;
use common\repositories\FilmRepository;
use common\repositories\PersonRepository;

class PersonService
{
    public $personRepository;

    public function __construct(PersonRepository $personRepository)
    {
        $this->personRepository = $personRepository;
    }

}