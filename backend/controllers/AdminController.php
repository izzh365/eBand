<?php

namespace backend\controllers;
use Yii;
use backend\models\User;
use backend\controllers\CommonController;
class AdminController extends CommonController
{
    
    public function actionIndex()
    {
        $searchModel = new User();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);
        // var_dump($dataProvider);die();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

}
