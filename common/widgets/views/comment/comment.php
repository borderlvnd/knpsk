<?php

use yii\helpers\Html;
use common\essences\Comment;
use frontend\assets\BackendAsset;

/* @var $comm common\essences\Comment */
/* @var $nestedLevel integer */

$backend = BackendAsset::register($this);
$nestedLevel .= 'px;';
echo "<div style='width: 100%;position:relative;padding: 5px 5px 5px $nestedLevel    '>"; ?>

<?php
echo "<div style='width: 100%; padding: 5px 5px 5px 15px;'>";
echo '<img src="' . $backend->baseUrl . '/web/images/users/' . $comm->createdBy->avatar . '" class="avatar-img">"';
echo "<u>" .Html::a ($comm->createdBy->username,'\./user/'.$comm->createdBy->id) . "</u> on ";
echo "<u><i>" . date('l, F d Y, \a\t H:i:s', $comm->created_at) . "<br></i></u>";
?>
    <li class="horizon-list-li"><?php \yii\bootstrap\Modal::begin([
'toggleButton' => ['label' => ' Edit comment ', 'class' => 'btn btn-link'],
    ]);
echo $this->render('\update', ['model' => $comm, 'filmId' => $comm->film_id, 'personId' => $comm->person_id]);
 \yii\bootstrap\Modal::end();?><</li>

<li class="horizon-list-li"><?php \yii\bootstrap\Modal::begin([
 'toggleButton' => ['label' => ' Reply ', 'class' => 'btn btn-link'],
]);
 echo $this->render('\createReply', ['model' => new Comment(), 'filmId' => $comm->film_id, 'personId' => $comm->person_id,'rootId'=>$comm->id]);
 \yii\bootstrap\Modal::end();
echo "<div style=\"font-size:18px;\">" . $comm->content . "</div>";
echo "</div>";
echo "</div>";
?>