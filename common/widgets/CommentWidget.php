<?php

namespace common\widgets;

use common\essences\Comment;
use yii\base\Widget;
use common\repositories\CommentRepository;
use Yii;

class CommentWidget extends Widget
{


public $model;

    public function run()
    {

        foreach(Comment::findAll(['film_id'=>$this->model->id,'parent_id'=>null])as $item)
        {
            echo $this->render('.\comment/comment',['comm'=>$item]);
            echo $this->render('.\comment/view',['model'=>$item]);
        }
    }
}