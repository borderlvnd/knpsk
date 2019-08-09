<?php
namespace common\repositories;
use common\essences\Film;


class FilmRepository extends IRepository
{
    private $record;

    public function __construct(Film $film)
    {
        $this->record = $film;
    }

    public function getById($id)
    {
        return $this->getBy($this->record,['id'=> $id]);
    }

    public function getAllByIds($ids)
    {
        return $this->getAllBy($this->record,$ids);
    }

    public function getAllFilms()
    {
        return Film::find();
    }
}

