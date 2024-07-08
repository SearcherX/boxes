<?php

use yii\web\JsonParser;

return [
    'id' => 'basic',
    'name' => 'Система управления коробками',
    'language' => 'ru',
    'defaultRoute' => 'box/index',
    'layout' => 'main',
    'basePath' => dirname(__DIR__),
    'bootstrap' => [
        'log'
    ],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'components' => [
        'db' => require __DIR__ . '/db.php',
        'request' => [
            'cookieValidationKey' => 'sF6ugQqWMYrNL4Q',
            'parsers' => ['application/json' => JsonParser::class]
        ],
        'cache' => [
            'class' => yii\caching\FileCache::class,
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
        'urlManager' => [
            'enablePrettyUrl' => true,
            'rules' => [
                'boxes' => 'box/index',
            ]
        ],
    ],
];