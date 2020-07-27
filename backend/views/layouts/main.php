<?php
use yii\helpers\Html;
use yii\base\Widget;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $content string 字符串 */
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>
    <header>elinksmart</header>
    <?= $content ?>
    <footer>&copy; 2020 by My ElinkSmart</footer>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>