
<?php
use common\essences\Comment;
/* @var $comments Comment[] */
/* @var nestedLevel integer */
foreach ($comments as $comm) {
    echo $this->render('\..\comment\comment',
        [
            'comm' => $comm,
            'nestedLevel' => ($nestedLevel * 50)
        ]);
    echo $this->render('\..\comment\view',
        [
            'comments' => $comm->comments,
            'nestedLevel' => $nestedLevel > 4 ? $nestedLevel : $nestedLevel + 1
        ]
    );
}
