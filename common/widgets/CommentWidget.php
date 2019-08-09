<?php

namespace common\widgets;

use common\essences\Comment;
use yii\base\Widget;
use common\repositories\CommentRepository;
use Yii;

/* @var $model \common\essences\Comment */
class CommentWidget extends Widget
{
    public $film_id =null;
    public $person_id = null;
    public $type;
    public $comment;

    public function run()
    {
        $model = new Comment();

        echo $this->render('.\comment/create', ['model' => $model, 'filmId' => $this->film_id, 'personId' => $this->person_id]);
        echo $this->render('.\comment/view', [
            'comments' => $this->comment,
            'nestedLevel' => 1,
]);
//        $nested;
//        foreach ($this->comment as $item) {
//            if ($item->parent_id == null) {
//                $nested = 0;
//                echo $this->render('.\comment/comment', [
//                    'comm' => $item,
//                    'nested' => $nested,
//                ]);
//            } else {
//                $nested = $nested + 25;
//
//            }
//            foreach ($item->comments as $comm) {
//
//                echo $this->render('.\comment/comment', [
//                    'comm' => $comm,
//                    'nested' => $nested + 25,
//                ]);
//            }
        //}
    }


}