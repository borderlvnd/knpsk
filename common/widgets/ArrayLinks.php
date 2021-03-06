<?php
namespace common\widgets;

use common\essences\Person;
use yii\base\Widget;
use yii\helpers\Url;
use yii\helpers\Html;

class ArrayLinks extends Widget
{
    public $arr;
    public $className = null;
    public $type = null;
    public $attribute = null;

    public function run()
    {
        $this->className = strtolower($this->className);
        $links = array();
        if (isset($this->arr[0])) {
            foreach ($this->arr as $item) {
                if (isset($this->type)) {
                    $links[] = Html::a($item[$this->attribute],
                        Url::to('/' . $this->className . '/' . $this->type . '/' . $item->id));

                } else {
                    $links[] = Html::a($item[$this->attribute], Url::to('/' . $this->className . '/' . $item->id));
                }
            }
            return implode(', ', $links);
        }
    }
}

?>
