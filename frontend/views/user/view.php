<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\assets\KinopoiskAsset;
use frontend\assets\BackendAsset;

/* @var $this yii\web\View */
/* @var $model common\essences\User */
/* @var $last_visit string */
/* @var $created_at_time string */

$this->title = $model->username;
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
KinopoiskAsset::register($this);
$backend = BackendAsset::register($this);
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <div><img class="img-person" src="<?= $backend->baseUrl . '/web/images/users/' . $model->avatar ?>"></div>
    <div class="info-person"><?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'created_at',
                'value' => $created_at_time,
            ],
            [
                'attribute' => 'last_visit',
                'value' => $last_visit,
            ]
        ],
        ]) ?></div>

</div>
