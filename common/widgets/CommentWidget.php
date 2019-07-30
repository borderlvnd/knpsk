<?php

namespace common\widgets;

use common\essences\Comment;
use yii\base\Widget;
use common\repositories\CommentRepository;
use Yii;

class CommentWidget extends Widget
{

public $parent_id = 0;
public $type_id;
public $content;
public $nestedLevel = 0;

    public function run()
    {
//        $content = "";
//        $comments =
//        $user_id = Yii::$app->user->id;
//        $Comment = new Comment();
//        $comment->
    }
}