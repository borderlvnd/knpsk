<?php

namespace common\services;

use common\repositories\CommentRepository;
use common\essences\Comment;

class CommentService
{
    private $comm;

    public function __construct(CommentRepository $comm)
    {
        $this->comm = $comm;
    }


    public function del(Comment $comm)
    {
        //
    }


}
?>