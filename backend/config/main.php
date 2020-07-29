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
    'language'=>'zh-cn',
    'bootstrap' => ['log'],
    'modules' => [
        'admin' => [
            'class' => 'mdm\admin\Module',
            'layout' => 'left-menu',//yii2-admin的导航菜单
        ],
        'rbac' => [
            'class' => 'backend\modules\rbac\Module',
            'layout' => 'left-menu',//yii2-admin的导航菜单
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'backend\modules\rbac\models\Admin',
            'enableAutoLogin' => false,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
            //'identityClass' => 'mdm\admin\models\User',
            'loginUrl' => ['rbac/user/login'],

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
            'enableStrictParsing'=>false,
            'rules' => [
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            ],
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=127.0.0.1;dbname=smartking',
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
            'tablePrefix' => 'tp_',   //加入前缀名称
        ],
        'authManager' => [
            'class' => 'yii\rbac\PhpManager', // or use 'yii\rbac\DbManager'
        ]

    ],
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            '*'
        ]
    ],
    'params' => $params,
];
