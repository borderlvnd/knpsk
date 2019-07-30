<?php
namespace common\widgets;

use Faker\Provider\DateTime;
use yii\base\Widget;

class AgeWidget extends Widget
{
    public $date;

    function run()
    {
        $dt = new \DateTime($this->date);
        $interval = $dt->diff(new \DateTime(date("Y-m-d")));
        return $dt->format("d F Y") . ' (Age: '.$interval->format('%Y').')';
    }
}
