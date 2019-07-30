<?php

use yii\helpers\Html;
use yii\helpers\Url;
use frontend\assets\BackendAsset;
use frontend\assets\KinopoiskAsset;
use yii\widgets\LinkPager;


/* @var $this yii\web\View */
/* @var $searchModel common\essences\FilmSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Films';
$this->params['breadcrumbs'][] = $this->title;
$backend = BackendAsset::register($this);
KinopoiskAsset::register($this);
?>

<div class="film-index">
    <?php foreach($films as $film):?>
        <div class="post">
            <h1 class="index-title"><?=$film->FilmName?></h1>
            <div class="tags"><?= \common\widgets\ArrayLinks::widget([
                    'arr'=>$film->genres,
                    'className'=>'Genre',
                    'attribute' =>'GenreName',]);?>

            </div><br>

            <img class="img-preview" src="<?=$backend->baseUrl.'/web/images/films/'.$film->image; ?>">
            <div class="main-text"><?php
                if(strlen($film->description)>=49){
                    $film->description=mb_substr($film->description,0,46);
                    $pos = strripos($film->description,' ');
                    $film->description = mb_substr($film->description,0,$pos);
                }
                echo $film->description.'...'?>
            </div><br>
            <div class="post-full-view">
                <?php echo Html::a('View full information', Url::to('/film/'.$film->id));
                ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>
