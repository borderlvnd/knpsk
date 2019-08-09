<?php

namespace common\widgets;

use common\essences\FilmGenre;
use common\essences\Film;
use yii\base\Widget;
use yii\helpers\ArrayHelper;

/* @var Film  common\essences\Film;*/

class SimilarFilms extends Widget
{
    public $films;
    public $path;

    public function run()
    {
        $count = 0;
        $obj = array();
        foreach ($this->films as $film) {
            $count ++;
            $obj[] = '<a href='.$film->id.'><img class="similar-films" src="'.$this->path.'/'.$film->image.'"></a>';
            if($count==5) break;
        }
        return implode(',',$obj);
    }
}