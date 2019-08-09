<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use frontend\assets\KinopoiskAsset;
use frontend\assets\BackendAsset;

/* @var $this yii\web\View */
/* @var $model common\essences\Film */
/* @var $rating */
/* @var $films */
/* @var $comments integer */


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
    <?php
    //    $rating = 20 * (array_sum(array_map(
    //            function ($val) {
    //                return $val['rating'];
    //            }, $model->userRatings)) / count(array_map(
    //            function ($val) {
    //                return $val['rating'];
    //            }, $model->userRatings)));?>
    <table class="info">
        <tr>
            <td class="img-full"><?= Html::img($backend->baseUrl . '/web/images/films/' . $model->image,
                    ['class' => 'img-full']); ?>

            </td>
            <td class="main-text">

                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        [
                            'label' => 'Producer',
                            'value' => \common\widgets\ArrayLinks::widget([
                                'arr' => array($producer),
                                'className' => 'Person',
                                'type' => 'producer',
                                'attribute' => 'FullName',

                            ]),
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
                            'value' => Html::img($backend->baseUrl . '/web/images/mpaa/' . $model->rating->image,
                                    ['class' => 'img-mpaa']) . $model->rating->rating,
                            'format' => 'raw',
                        ],
                        [
                            'label' => 'User rating',
                            'value' => \yii\bootstrap\Progress::widget([
                                'percent' => 20 * $rating,
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
                                'arr' => $actors,
                                'className' => 'Person',
                                'type' => 'actor',
                                'attribute' => 'FullName',
                            ]),
                            'format' => 'raw',
                        ]

                    ]
                ]); ?>
                <br></td>
        </tr></table>
    <div>    <?= Html::a('Add to favorites', '/film/favorites/' . $model->id, ['class' => 'btn btn-default']) ?>
        <?= Html::a('Preview (YouTube)', $model->Preview, ['class' => 'btn-common']); ?>
    </div><br><br>
    <div class="descripton-text"><?= $model->description ?></div>

    <hr>
    <br><br>
    SIMILAR FILMS: <br>
    <?= \common\widgets\SimilarFilms::widget([
        'films' => $films,
        'path' => $backend->baseUrl . '/web/images/films/',
    ]);?>
    <hr><br><br><?= \common\widgets\CommentWidget::widget([
        'film_id' => $model->id,
        'type' => 'film_id',
        'comment' => $comments,
    ]); ?>

</div>
