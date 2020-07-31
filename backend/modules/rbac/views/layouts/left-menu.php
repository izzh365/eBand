<?php

use yii\helpers\Html;

use backend\modules\rbac\components\MenuHelper;
use yii\bootstrap\Nav;
use mdm\admin\components\Helper;
use yii\widgets\Menu;
use backend\modules\rbac\widgets\Menus;

/* @var $this \yii\web\View */
/* @var $content string */

$controller = $this->context;
$menus = $controller->module->menus;
$route = $controller->route;
foreach ($menus as $i => $menu) {
    $menus[$i]['active'] = strpos($route, trim($menu['url'][0], '/')) === 0;
}
$this->params['nav-items'] = $menus;

//var_dump(Yii::$app->user->id);
////
//echo "<br/>";
//echo "<pre>";
//print_r(MenuHelper::getAssignedMenu(Yii::$app->user->id));
////echo Nav::widget([
////    'items' => MenuHelper::getAssignedMenu(Yii::$app->user->id)
////]);
//exit;


?>
<?php $this->beginContent($controller->module->mainLayout) ?>
<div class="row">
    <div class="col-sm-3">
        <span>这是rbac left-menu</span>
        <div id="manager-menu" class="list-group">
            <?php
            foreach ($menus as $menu) {
                $label = Html::tag('i', '', ['class' => 'glyphicon glyphicon-chevron-right pull-right']) .
                    Html::tag('span', Html::encode($menu['label']), []);
                $active = $menu['active'] ? ' active' : '';
                echo Html::a($label, $menu['url'], [
                    'class' => 'list-group-item' . $active,
                ]);
            }
            ?>
        </div>
    </div>
    <div class="col-sm-6">
        <?= $content ?>
    </div>
</div>
<?php
list(, $url) = Yii::$app->assetManager->publish('@backend/modules/rbac/assets');
$this->registerCssFile($url . '/list-item.css');
?>

<?php $this->endContent(); ?>
