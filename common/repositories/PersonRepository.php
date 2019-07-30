<?php

namespace common\repositories;

use common\essences\Person;

class  PersonRepository extends IRepository
{
    protected $record;

    public function __construct(Person $record)
    {
        $this->record = $record;
    }

    public function getActorById($id)
    {
        $actor = $this->getBy($this->record,['function'=>Person::ROLE_ACTOR,'id'=>$id]);

        return $actor;
    }

    public function getProducerById($id)
    {
        $producer  = $this->getBy($this->record,['function'=>Person::ROLE_PRODUCER,'id'=>$id]);
        return $producer;
    }
}

?>