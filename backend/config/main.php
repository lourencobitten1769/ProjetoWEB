<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'api' => [
            'class' => 'app\modules\api\Module',
        ],
    ],
    'components' => [
        'request' => [
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
            'csrfParam' => '_csrf-backend',
            'enableCsrfValidation' => false,
            ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
                [
                    'class'=>'yii\rest\UrlRule',
                    'controller'=> ['api/category','api/product','api/purchase','api/user','api/cart','api/productspurchases'],
                    'pluralize'=>false,

                    'extraPatterns' => [
                        'GET total' => 'total',
                        'GET purchaseuser/{id}'=>'purchaseuser',
                        'GET produtoscategoria/{id}'=> 'produtoscategoria',
                        'GET cartuser/{id}'=> 'cartuser',
                        'GET login'=>'login',
                        'POST register'=>'register',
                        'GET lastpurchase'=>'lastpurchase',
                        'GET deletecartuser'=>'deletecartuser'
                    ],
                ]
            ],
        ],




    ],
    'params' => $params,
];
