<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);


return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'language' => 'ru-RU',
    'components' => [

        'request' => [
            'baseUrl' => '',
        ],

        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
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
            'baseUrl' => '/',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'page/<translit:[\w-]+>'=>'page/show',
                'goods/one-item/<translit:[\w-]+>'=>'goods/one-item',
                'goods/view/<translit:[\w-]+>'=>'goods/view',
                'stone/view/<translit:[\w-]+>'=>'stone/view',
                'events/view/<translit:[\w-]+>'=>'events/view',
                'standard-services/view/<translit:[\w-]+>'=>'standard-services/view',
                'f/<filter:([\w\=\;\/\-\_\%]+)?>'=>'stone/ajax-filter',
                'search'=>'site/search',
                'contact'=>'site/contact',
                'about'=>'site/about',
                'success'=>'site/success',
            ]
        ]
    ],
    'params' => $params,
];