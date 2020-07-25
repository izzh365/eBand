<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\base\Widget;

$this->title = '用户查看';
$this->params['breadcrumbs'][] = ['label' => '用户管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="page-container">
    <div class="row">
        <div class="col-lg-12">
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 style="font-weight: bold;"><?= Html::encode($this->title) ?></h4>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">

                        <?= DetailView::widget([
                            'model' => $model,
                            'attributes' => [
                                ['label'=>'用户名',
                                'value' => $model->username],
                                ['label'=>'用户昵称',
                                'value' => $model->nickname],
                                ['label'=>'性别',
                                'value' => $model->sex],
                                ['label'=>'出生日期',
                                'value' => $model->birthday],
                                ['label'=>'身高',
                                'value' => $model->height],
                                ['label'=>'体重',
                                'value' => $model->weight],
                                ['label'=>'年龄',
                                'value' => $model->age],
                                ['label'=>'走路步数目标',
                                'value' => $model->walkGoal],
                                ['label'=>'每步的距离',
                                'value' => $model->stepWidth]                                
                                
                            ],
                        ]) ?>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
</div>