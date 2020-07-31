<?php

use yii\helpers\Html;
use yii\helpers\Url;

use yii\widgets\Menu;
use backend\modules\rbac\widgets\Menus;
use backend\modules\rbac\components\MenuHelper;
/* @var $this \yii\web\View */
/* @var $content string */

$controller = $this->context;
$menus = $controller->module->menus;
$route = $controller->route;



?>

<div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
        <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
        <?php
            echo $menu = Menus::widget([
                'options' => ['class' => 'layui-nav layui-nav-tree' ,'lay-filter'=>'slideNavMenu'],
                'items' => MenuHelper::getAssignedMenu(Yii::$app->user->id),
                'activeCssClass' => 'layui-this',
                'submenuTemplate' =>  "\n<ul class='layui-nav-child'>\n{items}\n</ul>\n",
                'linkTemplate' => '<a href="{url}">{label}</a>',
                'labelTemplate' => '{label}',
                'itemOptions'=>['class'=>'layui-nav-item'],

            ]);
        ?>


<!--        <ul class="layui-nav layui-nav-tree" lay-filter="slideNavMenu">-->

<!--            <li class="layui-nav-item layui-nav-itemed">-->
<!--                <a href="#">权限管理</a>-->
<!--                <ul class="layui-nav-child">-->
<!--                    <li><a href="/rbac/user/index">用户列表</a></li>-->
<!--                    <li><a href="/rbac/assignment/index">分配角色</a></li>-->
<!--                    <li><a href="/rbac/role/index">角色列表</a></li>-->
<!--                    <li><a href="/rbac/permission/index">权限列表</a></li>-->
<!--                    <li><a href="/rbac/route/index">路由列表</a></li>-->
<!--                    <li class="layui-this"><a href="/rbac/rule/index">规则列表</a></li>-->
<!--                    <li><a href="/rbac/menu/index">菜单列表</a></li>-->
<!--                </ul>-->
<!--            </li>-->

<!--        </ul>-->

    </div>
</div>
