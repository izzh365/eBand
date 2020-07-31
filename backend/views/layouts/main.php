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
    <div class="layui-layout layui-layout-admin">
        <!--这是头部-->
        <?=$this->render('_header')?>
        <!--这是头部-->

        <!--这是左侧菜单-->
        <?=$this->render('_menu')?>
        <!--这是左侧菜单 end-->

        <div class="layui-body">
            <!-- 内容主体区域 -->
            <div style="padding: 15px;">
                <?=$content?>
            </div>
        </div>

        <div class="layui-footer">
            <!-- 底部固定区域 -->
            © elinksmart
        </div>
    </div>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>