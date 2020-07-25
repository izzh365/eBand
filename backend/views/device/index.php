<?php
use yii\grid\GridView;
use yii\helpers\Html;
$this->title = "设备管理";
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 style="font-weight: bold;"><?=Html::encode($this->title) ?></h4>
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="dataTable_wrapper">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'pager' => [
                            'firstPageLabel' => '第一页',
                            'lastPageLabel' => '最后一页',
                        ],
                        'columns' =>[
                            ['class' => 'yii\grid\SerialColumn'],
                            [
                                'attribute' => 'mac',
                                'format'=>'raw',
                                'value'=> 'mac',
                                'filter'=>Html::activeTextInput($searchModel, 'mac',['class'=>'form-control','placeholder'=>'请输入设备mac过滤']),
                            ],
                            [
                                'attribute'=>'upd_time',
                                'value'=>'upd_time',
                                'filter'=>Html::activeTextInput($searchModel, 'upd_time', ['class'=>'form-control','placeholder'=>'请输入日期过滤'])
                            ],
                            [
                             'class' => 'yii\grid\ActionColumn',
                             'header' => '操作', 
                             'template' => '{view} {cloud}',
                             'buttons' => [
                                     'view' => function($url, $model, $key){
                                              return Html::a('<i class="glyphicon glyphicon-eye-open"></i>',
                                                     ['view', 'id' => $key],
                                                     ['title' => '查看',
                                                      'class' => '',
                                                     ]);
                                     },
                                    
                                ],
                             ],
                            ],
                            'emptyText'=>"当前没有记录",
                            'emptyTextOptions'=>['style'=>'color:red;font-weight:bold'],
                            'showOnEmpty'=>false
                      ]);
                    ?>
                  </div>
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
	</div>
	<!-- /.col-lg-12 -->
</div>