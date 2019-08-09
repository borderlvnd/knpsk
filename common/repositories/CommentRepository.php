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

    public function getCommentsForPerson($person_id)
    {
        return $this->getAllBy($this->record, ['person_id' => $person_id, 'parent_id' => null]);
    }

    public function getMainCommentsForFilm($film_id)
    {
        $comm = $this->getAllBy($this->record, ['film_id' => $film_id, 'parent_id'=>null]);
        return $comm;
    }

    public function getChildComments($film_id)
    {
        return $this->getAllBy($this->record, ['film_id'=>$film_id,'parent_id' => !null]);

    }

    public function getById($id)
    {
        $comment = $this->getBy($this->record, ['id' => $id]);
        return $comment;
    }

    public
    function save(
        Comment $comment
    ) {
        $comment->save();
    }

}

?>