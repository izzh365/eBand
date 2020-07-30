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
        <div class="layui-header">
            <div class="layui-logo">elinksmart-手环</div>
            <!-- 头部区域（可配合layui已有的水平导航） -->
            <ul class="layui-nav layui-layout-left">
                <li class="layui-nav-item">
                    <a href="javascript:;">系统设置</a>
                    <dl class="layui-nav-child">
                        <dd><a href="">管理员列表</a></dd>
                        <dd><a href="">分配</a></dd>
                        <dd><a href="">角色列表</a></dd>
                        <dd><a href="">权限列表</a></dd>
                        <dd><a href="">路由列表</a></dd>
                        <dd><a href="">规则列表</a></dd>
                    </dl>
                </li>
            </ul>
            <ul class="layui-nav layui-layout-right">
                <li class="layui-nav-item">
                    <a href="javascript:;">
                        <img src="http://t.cn/RCzsdCq" class="layui-nav-img">
<!--                        --><?//=Yii::$app->user->identity->username?>zzz
                    </a>
                    <dl class="layui-nav-child">
                        <dd><a href="">基本资料</a></dd>
                        <dd><a href="">安全设置</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item"><a href="<?=Url::to(['/rbac/user/logout'])?>">退出</a></li>
            </ul>
        </div>

        <div class="layui-side layui-bg-black">
            <div class="layui-side-scroll">
                <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
                <ul class="layui-nav layui-nav-tree"  lay-filter="test">
                    <li class="layui-nav-item layui-nav-itemed">
                        <a class="" href="javascript:;">权限管理</a>
                        <dl class="layui-nav-child">
                            <dd><a href="">管理员列表</a></dd>
                            <dd><a href="">分配</a></dd>
                            <dd><a href="">角色列表</a></dd>
                            <dd><a href="">权限列表</a></dd>
                            <dd><a href="">路由列表</a></dd>
                            <dd><a href="">规则列表</a></dd>
                        </dl>
                    </li>
                    <li class="layui-nav-item">
                        <a href="javascript:;">菜单二</a>
                        <dl class="layui-nav-child">
                            <dd><a href="javascript:;">列表一</a></dd>
                            <dd><a href="javascript:;">列表二</a></dd>
                            <dd><a href="">超链接</a></dd>
                        </dl>
                    </li>
                    <li class="layui-nav-item"><a href="">菜单三</a></li>
                    <li class="layui-nav-item"><a href="">菜单四</a></li>
                </ul>
            </div>
        </div>

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