<?php

namespace common\widgets;

use yii\base\Widget;

class CountryWidget extends Widget
{
    public $countries = [];
    public $path;

    public function run()
    {
        $str_country=[];
        foreach($this->countries as $item)
        {
            $str_country[]= "<img src=\"".$this->path.$item->flag.'.png">  '.$item->CountryName;
        }
        return implode(', ',$str_country);
    }
}

