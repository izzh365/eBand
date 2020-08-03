<?php
/**
 * Created by PhpStorm
 * User: izzh
 * Date: 2020/7/31
 * Time: 16:09
 */
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="layui-header">
    <div class="layui-logo">elinksmart-手环</div>
    <!-- 头部区域（可配合layui已有的水平导航） -->
<!--    <ul class="layui-nav layui-layout-left">-->
<!--        <li class="layui-nav-item">-->
<!--            <a href="javascript:;">系统设置</a>-->
<!--            <dl class="layui-nav-child">-->
<!--                <dd><a href="">管理员列表</a></dd>-->
<!--                <dd><a href="">分配</a></dd>-->
<!--                <dd><a href="">角色列表</a></dd>-->
<!--                <dd><a href="">权限列表</a></dd>-->
<!--                <dd><a href="">路由列表</a></dd>-->
<!--                <dd><a href="">规则列表</a></dd>-->
<!--            </dl>-->
<!--        </li>-->
<!--    </ul>-->
    <ul class="layui-nav layui-layout-right">
        <li class="layui-nav-item">
            <a href="javascript:;">
                <img src="http://t.cn/RCzsdCq" class="layui-nav-img">
                    <?php
                        if(!Yii::$app->user->isGuest){
                            echo  Yii::$app->user->identity->username;
                        }else{
                            echo '未登录';
                        }
                    ?>

            </a>
<!--            <dl class="layui-nav-child">-->
<!--                <dd><a href="">基本资料</a></dd>-->
<!--                <dd><a href="">安全设置</a></dd>-->
<!--            </dl>-->
        </li>
        <li class="layui-nav-item"><a href="<?=Url::to(['/rbac/user/logout'])?>">退出</a></li>
    </ul>
</div>
