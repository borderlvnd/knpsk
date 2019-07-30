<?php

use yii\helpers\Html;
use frontend\assets\BackendAsset;

/* @var $this yii\web\View */
/* @var $model common\essences\Genre */

$this->title = $model->GenreName;
$this->params['breadcrumbs'][] = ['label' => 'Genres', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$backend = BackendAsset::register($this);
\yii\web\YiiAsset::register($this);
?>
<div class="genre-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php foreach($model->films as $arr) {
        echo "<img class=\"img-preview\" src=\"" . $backend->baseUrl . '\web\images\films/'.$arr->image."\">    " ;
    }?>

</div>
