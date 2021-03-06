<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\rbac\models\Menu;
use yii\helpers\Json;
use backend\modules\rbac\AutocompleteAsset;

/* @var $this yii\web\View */
/* @var $model mdm\admin\models\Menu */
/* @var $form yii\widgets\ActiveForm */


//AutocompleteAsset::register($this);
//$opts = Json::htmlEncode([
//        'menus' => Menu::getMenuSource(),
//        'routes' => Menu::getSavedRoutes(),
//    ]);
//$this->registerJs("var _opts = $opts;");
//$this->registerJs($this->render('_script.js'));
?>

<div class="menu-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= Html::activeHiddenInput($model, 'parent', ['id' => 'parent_id']); ?>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => 128]) ?>
            <?=$form->field($model,'parent')->dropDownList($menus) ?>
            <?=$form->field($model,'route')->dropDownList($routes)->label('路由（空路由，菜单将不显示）') ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'order')->input('number') ?>

            <?= $form->field($model, 'data')->textarea(['rows' => 4]) ?>
        </div>
    </div>

    <div class="form-group">
        <?=
        Html::submitButton($model->isNewRecord ? Yii::t('rbac-admin', 'Create') : Yii::t('rbac-admin', 'Update'), ['class' => $model->isNewRecord
                    ? 'btn btn-success' : 'btn btn-primary'])
        ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
