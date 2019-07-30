<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use frontend\assets\KinopoiskAsset;
use frontend\assets\BackendAsset;

/* @var $this yii\web\View */
/* @var $model common\essences\Film */

$this->title = $model->FilmName;
$this->params['breadcrumbs'][] = ['label' => 'Films', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$backend = BackendAsset::register($this);
$kinopoisk = KinopoiskAsset::register($this);
\yii\web\YiiAsset::register($this);
?>
<div class="film-view" xmlns:Html="http://www.w3.org/1999/html">
    <h1 style="text-align: center;"><?= Html::encode($this->title) ?></h1>
    <br>

    <table class="info">
        <tr>
            <td><?= Html::img($backend->baseUrl . '/web/images/films/' . $model->image, ['class' => 'img-full']); ?>

            </td>
            <td class="main-text">

                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        [
                            'label' => 'Producer',
                            'value' => Html::a($model->producer->FullName,
                                Url::to(['/person/producer/' . $model->producer->id])),
                            'format' => 'raw',
                        ],
                        [
                            'label' => 'Countries',
                            'value' => \common\widgets\CountryWidget::widget([
                                'countries' => $model->countries,
                                'path' => $backend->baseUrl . '/web/images/flags/',
                            ]),
                            'format' => 'raw',
                        ],

                        'releaseYear',
                        'duration',
                        [
                            'label' => 'MPAA Rating',
                            'value' => Html::img($backend->baseUrl . '/web/images/mpaa/' . $model->rating->image) . $model->rating->rating,
                            'format' => 'raw',
                        ],
                        [
                            'label' => 'User rating',
                            'value' => \yii\bootstrap\Progress::widget([
                                'percent' => 20 * (array_sum(array_map(
                                            function ($val) {
                                                return $val['rating'];
                                            }, $model->userRatings)) / count(array_map(
                                            function ($val) {
                                                return $val['rating'];
                                            }, $model->userRatings))),
                                'barOptions' => ['class' => 'rating'],

                            ]),
                            'format' => 'raw',
                        ],
                        [
                            'label' => "Genres",
                            'value' => \common\widgets\ArrayLinks::widget([
                                'arr' => $model->genres,
                                'className' => 'Genre',
                                'attribute' => 'GenreName',
                            ]),
                            'format' => 'raw',
                        ],
                        [
                            'label' => "Actors",
                            'value' => \common\widgets\ArrayLinks::widget([
                                'arr' => $model->people,
                                'className' => 'Person',
                                'type' => 'actor',
                                'attribute' => 'FullName',
                            ]),
                            'format' => 'raw',
                        ]

                    ]
                ]); ?>
                <br>
                <?= $model->description ?>

            </td>
        </tr>
    </table>
    <?= Html::a('Preview (YouTube)', $model->Preview, ['class' => 'btn-common']); ?>


</div>

</div>
