<?php

use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $model \common\essences\Comment */

$this->title = 'all comments:';

?>

<div class="Comment create">
    <h1><?=Html::encode($this->title) ?></h1>

<?= $this->render('_form',[
    'model' =>$model,
    'filmId' => $filmId,
    'personId' => $personId,
    'action' => '\./comment/create',

]); ?>
</div>
