<?php

/* @var $this yii\web\View */

/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \yii\captcha\Captcha;
$this->title = '登录';
?>
    <style>
        html,
        body {
            height: 100%;
        }

        .site-login {
            margin: 200px auto;
            width: 375px;
        }

        .help-block {
            color: #FFB800;
        }

        .admin-body {
            background: #f2f2f2;
        }

        .admin-footer {
            text-align: center;
        }

        .admin-login-box {
            text-align: center;
            padding: 20px;
        }

        .admin-login-input, .admin-password-input, .admin-input-captcha {
            padding-left: 38px;
        }

        .admin-icon-username, .admin-icon-password, .admin-icon-captcha {
            position: absolute;
            width: 38px;
            line-height: 36px;
            text-align: center;
            color: #d2d2d2;
        }

        .admin-input-captcha {
            float: left;
            width: 60%;
        }

        #loginform-verifycode-image {
            float: right;
            width: 37%;
        }

        a {
            color: #337ab7;
            text-decoration: none;
        }

        .layui-body {
            background: #ffffff00;
        }


        .pagination > li {
            display: inline;
            padding: 6px 12px;
        }

        .pagination .active {
            background-color: #009688;
            border-radius: 2px;
        }

        .pagination .active a {
            cursor: text;
        }

        .pagination .active a:hover {
            color: white;
        }

        .pagination .disabled {
            color: #d2d2d2 !important;
            cursor: not-allowed !important;
        }

        .pagination > li > a {
            color: #393d49;
        }

        .pagination .active a {
            color: #ffffff;
        }

        .pagination > li > a:hover {
            color: #009688;
        }

        .pagination .prev {
            padding: -5px;
        }

        .pagination {
            text-align: right;
        }

        .layui-layout-admin-empty > .layui-body {
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            z-index: 998;
            width: auto;
            overflow: hidden;
            overflow-y: auto;
            box-sizing: border-box;
        }

        .admin-pull-right {
            float: right;
        }

        .admin-card-list {
            padding: 7.5px;
            margin: 7.5px;
        }

        .admin-big-font {
            font-size: 36px;
            color: #666;
            line-height: 36px;
            padding: 5px 0 10px;
            overflow: hidden;
            text-overflow: ellipsis;
            word-break: break-all;
            white-space: nowrap;
        }

        .admin-card-tag {
            top: 30%;
        }

        .admin-breadcrumb {
            padding: 15px;
        }

        .admin-content {
            margin: 7.5px;
        }

        .admin-layui-row {
            padding-bottom: 7.5px;
        }
    </style>
    <div class="site-login">
        <div class="admin-login-box">
            <h2>亿联穿戴设备</h2>
        </div>
        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'options' => [
                'class' => 'layui-form'
            ],
            'fieldConfig' => [
                'template' => "<div class=\"layui-form-item\">{input}</div>\n<blockquote>{error}</blockquote>",
            ],
        ]); ?>
        <label class="layui-icon layui-icon-username admin-icon-username" for="loginform-username"></label>
        <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'class' => 'layui-input admin-login-input', 'placeholder' => '用户名']) ?>
        <label class="layui-icon layui-icon-password admin-icon-password" for="loginform-password"></label>
        <?= $form->field($model, 'password')->passwordInput(['class' => 'layui-input admin-password-input', 'placeholder' => '密码']) ?>
        <label class="layui-icon layui-icon-vercode admin-icon-captcha" for="loginform-verifycode"></label>
        <?php echo $form->field($model, 'verifyCode')->widget(Captcha::className(), [
            'captchaAction' => '/rbac/user/captcha',
            'options' => [
                'class' => 'layui-input admin-input-captcha',
                'style' => '',
                'placeholder' => '输入验证码',
            ],
            'template' => '{input}&nbsp;&nbsp;{image}',
            'imageOptions' => [
                'style' => 'max-height:38px;',
                'options' => ['class' => 'admin-captcha']
            ]
        ]) ?>
        <?= $form->field($model, 'rememberMe')->checkbox([
            'lay-skin' => 'primary',
            'title' => '记住密码'
        ], false) ?>
        <?= Html::submitButton('登入', ['class' => 'layui-btn layui-btn-fluid', 'name' => 'login-button']) ?>

        <?php ActiveForm::end(); ?>
    </div>
<?php
//$this->registerJs('new Particleground.particle("#bg");')
?>