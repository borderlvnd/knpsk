<?php

namespace common\services;

use common\repositories\CommentRepository;
use common\essences\Comment;

class CommentService
{
    public $comm;

    public function __construct(CommentRepository $comm)
    {
        $this->comm = $comm;
    }

    private function addCommentTo($column, $item)
    {
        $comm = new Comment();
        $comm->{$column} = $item;
        return $comm;
    }

    public function addCommentToFilm($film_id)
    {
        return $this->addCommentTo('film_id', $film_id);
    }

    public function addCommentToPerson($person_id)
    {
        return $this->addCommentTo('person_id', $person_id);
    }


    public function del(Comment $comm)
    {
        //
    }


}

?>