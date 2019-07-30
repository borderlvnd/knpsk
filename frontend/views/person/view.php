<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\assets\BackendAsset;
use frontend\assets\KinopoiskAsset;

/* @var $this yii\web\View */
/* @var $model common\essences\Person */

//$this->title = $model->FullName;
$this->params['breadcrumbs'][] = ['label' => 'People', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$backend = BackendAsset::register($this);
\frontend\assets\KinopoiskAsset::register($this);
\yii\web\YiiAsset::register($this);
?>
<div class="person-view">

    <h1 style="text-align: center"><?= $model->FullName ?></h1>
    <p class="role"><?= $role; ?>
    </p>
    <div class="info-person"><b>Country:</b> <?= \common\widgets\CountryWidget::widget([
            'countries' => array($model->country),
            'path' => $backend->baseUrl . '/web/images/flags/',
        ]); ?>
        <br>
        <b>Born: </b> <?= \common\widgets\AgeWidget::widget([
            'date' => $model->birthDate,
        ]) ?><br>
        <b>Films: </b> <?= \common\widgets\ArrayLinks::widget([
            'arr' => $model->films0,
            'className' => 'Film',
            'attribute' => 'FilmName',
        ]) ?><br>
        <b>Amount of films: </b> <?= count($model->films0); ?><br>
        <p class="award"><b>Awards: </b> <?= \common\widgets\AwardWidget::widget(
            [
                'arr' => $model->awards,
                'path' => $backend->baseUrl . '\web\images\awards/',
            ]
        ); ?></p>


    </div>
    <div><img class="img-person" src="<?= $backend->baseUrl . "\web\images\persons/" . $model->photo ?>">
    </div>
    <div class="history-person"><?=$model->history?></div>
</div>

