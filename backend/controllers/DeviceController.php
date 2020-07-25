<?php

namespace backend\controllers;
use Yii;
use common\models\Device;
class DeviceController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $searchModel = new Device();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);
        // var_dump($dataProvider);die();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

}
