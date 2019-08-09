<?php

use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $model \common\essences\Comment */

$this->title = 'Update your comment' ?>

<div class="Comment create">
    <h1><?=Html::encode($this->title); ?>
<?= $this->render('_form',[
    'model' =>$model,
    'filmId'=>$filmId,
    'personId'=>$personId,
    'action' => '\./comment/update/'.$model->id,
]); ?>


