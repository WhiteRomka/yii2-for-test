<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'language'=>'ru',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'modules' => [
        'rom' => [
            'class' => 'app\modules\rom\Module',
        ],
        'basket' => [
            'class' => 'app\modules\basket\Module',
        ],
        'super-pay' => [
            'class' => 'app\modules\superPay\Module',
        ],
    ],
    'components' => [
        'request' => [
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
            'baseUrl'=>'',
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '-8ubxLSKz_SCuPeXEAFo8cc6hTJv4DCR',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'cache' => 'cache' //Включаем кеширование
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            //'enableSession' => false

            /*'on afterLogin' => function($event) {
                debug($event->identity['access_token']);
                die;
            }*/
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
            #'enableStrictParsing' => true, // в доке нужно для АПИ, но робит и без него
            'showScriptName' => false,
            'rules' => [
                'invoices/index' => 'super-pay/invoices/index',
                'films'=>'site/films',
                'rom' => 'rom/default/index',
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/v1/user',
                    'pluralize' => false,

                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/v1/post',
                    'pluralize' => false,

                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/v1/country',
                    'pluralize' => false
                ],
                //'http://yii2-for-test/wow' => 'site/contact'
                //'rom/<action:\w+>' => 'rom/default/index',
                /*[
                    'pattern' => 'http://yii2-for-test/<page:\d+>',
                    'route' => 'site/contact',
                    'defaults' => ['page' => 1]
                ]*/
            ],
        ],
        /* @var $myLog \app\components\MyLog */
        'mylog' => [
            'class' => \app\components\MyLog::class,
            'file' => 'logloglogloglog.txt'
        ],
    ],
    'params' => $params,
    'on afterAction' => function ($event) {
        /** @var \app\components\MyLog $a */
       $a = Yii::$app->mylog;
       $a->write();
    },

];

$config['bootstrap'][] = 'rom';
$config['modules']['rom'] = [
    'class' => \app\modules\rom\Module::class,
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
