<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'resources/plugin/layui-v2.5.6/css/layui.css'
    ];
    public $js = [
        [
            'resources/plugin/layui-v2.5.6/layui.all.js',
            'position' => \yii\web\View::POS_END
        ],
    ];

    public $cssOptions = [];

    public $jsOptions = [];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
