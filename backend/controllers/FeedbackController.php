<?php

namespace backend\controllers;
use Yii;
use common\models\feedback;
class FeedbackController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $searchModel = new feedback();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);
        // var_dump($dataProvider);die();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

}
