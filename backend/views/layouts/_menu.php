<?php

use yii\helpers\Html;
use yii\helpers\Url;

use yii\widgets\Menu;
use backend\modules\rbac\widgets\Menus;
use backend\modules\rbac\components\MenuHelper;

/* @var $this \yii\web\View */
/* @var $content string */

//$controller = $this->context;
//$menus = $controller->module->menus;
//$route = $controller->route;


?>

<div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
        <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
        <?php

        //echo "<pre>";
        //var_dump(MenuHelper::getAssignedMenu(Yii::$app->user->id));exit;

        echo $menu = Menus::widget([
            'options' => ['class' => 'layui-nav layui-nav-tree', 'lay-filter' => 'slideNavMenu', "lay-shrink" => "all"],
            'items' => MenuHelper::getAssignedMenu(Yii::$app->user->id),
            'activeCssClass' => 'layui-this',
            'activateParents' => true,
            'activeParentCssClass' => 'layui-nav-itemed',
            'submenuTemplate' => "\n<ul class='layui-nav-child'>\n{items}\n</ul>\n",
            'linkTemplate' => '<a href="{url}">{label}</a>',
            'labelTemplate' => '{label}',
            'itemOptions' => ['class' => 'layui-nav-item'],
        ]);

        ?>

<!--        <ul class="layui-nav layui-nav-tree" lay-filter="test">-->
<!--            <li class="layui-nav-item layui-nav-itemed">-->
<!--                <a href="javascript:;">默认展开</a>-->
<!--                <dl class="layui-nav-child">-->
<!--                    <dd><a href="javascript:;">选项1</a></dd>-->
<!--                    <dd><a href="javascript:;">选项2</a></dd>-->
<!--                    <dd><a href="">跳转</a></dd>-->
<!--                </dl>-->
<!--            </li>-->
<!--            <li class="layui-nav-item">-->
<!--                <a href="javascript:;">解决方案</a>-->
<!--                <dl class="layui-nav-child">-->
<!--                    <dd><a href="">移动模块</a></dd>-->
<!--                    <dd><a href="">后台模版</a></dd>-->
<!--                    <dd><a href="">电商平台</a></dd>-->
<!--                </dl>-->
<!--            </li>-->
<!--            <li class="layui-nav-item"><a href="">产品</a></li>-->
<!--            <li class="layui-nav-item"><a href="">大数据</a></li>-->
<!--        </ul>-->

    </div>
</div>
