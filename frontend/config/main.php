<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'on beforeRequest' => ['common\essences\User','lastActivity'],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '<alias:\w+>' => 'site/<alias>',
                'film/index'=>'film/index',
                'film/<id:[\d]+>'=>'film/view',
                'film/favorites/<id:[\d]+>'=>'film/favorites',
                'person/producer/<id:[\d]+>' =>'person/producer',
                'person/actor/<id:[\d]+>' =>'person/actor',
                'genre/<id:[\d]+>' => 'genre/view',
                'user/<id:[\d]+>' => 'user/view',
                'comment/update/<id:[\d]+>' => 'comment/update',
                'comment/reply/<id:[\d]+>' => 'comment/reply',
            ],
        ],

    ],
    'params' => $params,
];
