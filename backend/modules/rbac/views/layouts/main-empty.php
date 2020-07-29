<?php
use yii\helpers\Html;
use yii\base\Widget;
use yii\helpers\Url;
use backend\assets\AppAsset;

AppAsset::register($this);

/* @var $this yii\web\View */
/* @var $content string 字符串 */
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="layui-layout-body">
    <?php $this->beginBody() ?>

        <div class="layui-layout layui-layout-admin-empty" style="position: absolute;left: 0;right: 0;top: 0;bottom: 0;z-index: auto;overflow: hidden;overflow-y: auto;box-sizing: border-box">
            <!-- 内容主体区域 -->
            <div class="layui-body">
                <?= $content?>
            </div>
        </div>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>

