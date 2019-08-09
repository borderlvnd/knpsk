<?php
use common\essences\Film;
use common\essences\Mpaa;

$mpaa = Mpaa::findOne(['rating'=>'G']);

return [
    [
        'title' => 'title',
        'duration' => '00:05:05',
        'rating_id' => $mpaa->id,
    ],
    [
        'title' => 'title 2',
        'duration' => '01:02:03',
        'rating_id' => $mpaa->id,
    ]
];