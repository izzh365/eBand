<?php

namespace backend\controllers;
use Yii;
use common\models\User;
class UserController extends \yii\web\Controller
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

    public function actionView()
    {
        $data = Yii::$app->request->queryParams;
       return $this->render('view', [
            'model' => $this->findModel($data['id']),
        ]);
    }

    /**
     * 
     * @param unknown $id
     */
    private function findModel($id){
        if(($model = User::findOne($id))!==null){
            return $model;
        }else{
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
