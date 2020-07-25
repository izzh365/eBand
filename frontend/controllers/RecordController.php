<?php

namespace frontend\controllers;

use Yii;
use frontend\controllers\BaseController;
use frontend\models\Record;

class RecordController extends BaseController
{
    public function actionbPRecord()
    {
        $data = Yii::$app->request->post();

        $this->filterData($data,array('uuid','mac','startDate','endDate'));
        
        $model = new Record();
        $bool = $model->bPRecord($data);
        $this->giveBack($model->error_code,$bool);
    }

    public function actionhORecord()
    {
        $data = Yii::$app->request->post();

        $this->filterData($data,array('uuid','mac','startDate','endDate'));
        
        $model = new Record();
        $bool = $model->hORecord($data);
        $this->giveBack($model->error_code,$bool);
    }

    public function actionhRRecord()
    {
        $data = Yii::$app->request->post();

        $this->filterData($data,array('uuid','mac','startDate','endDate'));
        
        $model = new Record();
        $bool = $model->hRRecord($data);
        $this->giveBack($model->error_code,$bool);
    }

    public function actionsleepRecord()
    {
        $data = Yii::$app->request->post();

        $this->filterData($data,array('uuid','mac','startDate','endDate'));
        
        $model = new Record();
        $bool = $model->sleepRecord($data);
        $this->giveBack($model->error_code,$bool);
    }

    public function actionsportRecord()
    {
        $data = Yii::$app->request->post();

        $this->filterData($data,array('uuid','mac','startDate','endDate'));
        
        $model = new Record();
        $bool = $model->sportRecord($data);
        $this->giveBack($model->error_code,$bool);
    }

    public function actionwalkRecord()
    {
        $data = Yii::$app->request->post();

        $this->filterData($data,array('uuid','mac','startDate','endDate'));
        
        $model = new Record();
        $bool = $model->walkRecord($data);
        $this->giveBack($model->error_code,$bool);
    }

}
