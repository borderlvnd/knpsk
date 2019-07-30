<?php

namespace common\repositories;

use common\essences\Comment;

class CommentRepository extends IRepository
{
    private $record;

    public function __construct(Comment $record)
    {
        $this->record = $record;
    }

    public function getCommentsForPerson($person_id, $parent_id)
    {
        return $this->getAllBy($this->record, ['person_id' => $person_id, 'parent_id' => $parent_id]);
    }

    public function getCommentsForFilm($film_id, $parent_id)
    {
        return $this->getAllBy($this->record, ['person_id' => $film_id, 'parent_id' => $parent_id]);
    }

    public function getById ($id)
    {
        $comment = $this->getBy($this->record, ['id' => $id]);
        return $comment;
    }

    public function save(Comment $comment)
    {
        $comment->save();
    }

}

?>