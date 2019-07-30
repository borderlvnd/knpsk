<?php

namespace common\widgets;

use yii\base\Widget;
use yii\widgets;

class AwardWidget extends Widget
{
    public $arr = [];
    public $path;

    public function run()
    {
        $images = [];
        //var_dump($this->arr); die();
        foreach($this->arr as $item)
        {
            $images[] = "<img src=\"".$this->path.$item->image.'" class="img-mpaa">';
        }
        return implode(' ',$images);

    }
}
