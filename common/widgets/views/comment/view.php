<?php

use common\essences\Comment;
/* @var $model common\essences\Comment */
?>
<ul>
    <?php
    foreach (Comment::findAll(['parent_id' => $model->id ]) as $item) {
        echo $this->render('comment' ,['comm' => $item]);
        echo $this->render('view', ['model' => $item]);
    }
    ?>
</ul>