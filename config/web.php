<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'Eshop',
    'name' => 'My Project',
    'sourceLanguage' => 'ua',
    'language' => 'ua',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'languages'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
        '@common' => dirname(__DIR__) . '\common',
        '@common\messages' => dirname(__DIR__) . '\common\messages',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'MWxnGPkpfIZCfyRP2aF1C1uwlbnLf9UJ',
            'baseUrl' => '',
            'class' => 'klisl\languages\Request'
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => \yii\symfonymailer\Mailer::class,
            'viewPath' => '@app/mail',
            'useFileTransport' => false,
            'transport' => [
                'scheme' => 'smtps',
                'host' => '',
                'username' => '',
                'password' => '',
                'port' => 465,
                'dsn' => 'native://default',
            ],
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
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'suffix' => '',
            'normalizer' => [
                'class' => 'yii\web\UrlNormalizer',
                'normalizeTrailingSlash' => true,
                'collapseSlashes' => true,
            ],
            'enableStrictParsing' => true,
            'class' => 'klisl\languages\UrlManager',
            'rules' => [
                'languages' => 'languages/default/index',
                '/' => 'site/index',
                '/<action:(contact|login|logout|about|singup|reset-password)>' => 'site/<action>',
                '<controller:\w+>' => '<controller>/index',
                'category/<url:(\w+-?)+\w+>' => 'category/view',
                'category/<catUrl:(\w+-?)+\w+>/<url:(\w+-?)+\w+>' => 'category/goods',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>/<url:[\w-]+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                'new-password/<token:(\w+-?)+\w+>' => 'site/new-password',
            ],
        ],
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource'
                ],
            ],
        ],
    ],
    'params' => $params,
    'modules' => [
        'languages' => [
            'class' => 'klisl\languages\Module',
            //Языки используемые в приложении
            'languages' => [
                'UA' => 'ua',
                'RU' => 'ru',
            ],
            'default_language' => 'ua', //основной язык (по-умолчанию)
            'show_default' => true, //true - показывать в URL основной язык, false - нет
        ],
        // 'debug' => [
        //     'class' => \yii\debug\Module::class,
        //     'panels' => [
        //         'queue' => \yii\queue\debug\Panel::class,
        //     ],
        // ],
    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
