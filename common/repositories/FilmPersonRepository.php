<?php

namespace common\repositories;

use common\essences\FilmPerson;
use yii\helpers\ArrayHelper;

class FilmPersonRepository extends IRepository
{

    private $record;

    public function __construct(FilmPerson $filmPerson)
    {
        $this->record = $filmPerson;
    }

    public function getPersonsIds($id)
    {
        return ArrayHelper::getColumn($this->getAllBy($this->record, ['film_id' => $id]), 'Person_id');
    }


}