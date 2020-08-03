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
    'language'=>'zh-CN',
    'timeZone' =>'Asia/Shanghai',
    'defaultRoute' => 'site/index',
    'bootstrap' => ['log'],
    'modules' => [
        'rbac' => [
            'class' => 'backend\modules\rbac\Module',
            //'layout' => 'left-menu',//临时使用的备用菜单
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'backend\modules\rbac\models\User',
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
            'class' => 'yii\rbac\DbManager',
        ]

    ],
    'as access' => [
        'class' => 'backend\modules\rbac\components\AccessControl',
        'allowActions' => [
            'rbac/user/captcha',//登录验证码
            'debug/*',          //线上环境不得存在此规则
            'yii/*',            //线上环境不得存在此规则
            'rbac/user/login',
            'rbac/user/logout',
            'site/error',
            //'*',
        ]
    ],
    'params' => $params,
];
