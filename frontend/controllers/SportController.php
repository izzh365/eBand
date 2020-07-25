<?php

namespace frontend\controllers;

use Yii;
use frontend\controllers\BaseController;
use frontend\models\Sport;

class SportController extends BaseController
{
    public function actionaddSleepBatch()
    {
        $data = Yii::$app->request->post();

        $this->filterData($data,array('uuid','mac','records'));
        
        $data['rand'] = $data['uuid'].$data['mac'];
        $model = new Sport();
        $bool = $model->addSleepBatch($data);
        $this->giveBack($model->error_code);
    }

    public function actionaddSleepInfo()
    {
        $data = Yii::$app->request->post();
        

        $this->filterData($data,array('uuid','mac','startTime','endTime','totalTime','deepTime','shallowTime','soberTime','record'));

        $data['upd_date'] = date('Y-m-d',strtotime($data['startTime']));
        $data['rand'] = $data['uuid'].$data['mac'];
        $model = new Sport();
        $bool = $model->addSleepInfo($data);
        $this->giveBack($model->error_code);
    }

    public function actionaddSportData()
    {
        $data = Yii::$app->request->post();

        $this->filterData($data,array('uuid','mac','startTime','endTime','calorie','timeConsuming','strength','calorie','fasterRate','dataDetail','locationDetail'));

        
        $data['rand'] = $data['uuid'].$data['mac'];
        $model = new Sport();
        $bool = $model->addSportData($data);
        $this->giveBack($model->error_code);
    }

    public function actionaddSportBatch()
    {
        $data = Yii::$app->request->post();

        $this->filterData($data,array('uuid','mac','records'));
        
        $data['rand'] = $data['uuid'].$data['mac'];
        $model = new Sport();
        $bool = $model->addSportBatch($data);
        $this->giveBack($model->error_code);
    }

    public function actionaddWalk()
    {
        $data = Yii::$app->request->post();
        $data['upd_time'] = date('Y-m-d H:i:s');

        $this->filterData($data,array('uuid','mac','walkCounts','goalWalk','calorie','timeConsuming','startTime','detailJson','distance','upd_time'));

        
        $data['rand'] = $data['uuid'].$data['mac'];
        $model = new Sport();
        $bool = $model->addWalk($data);
        $this->giveBack($model->error_code);
    }

    public function actionaddWalkBatch()
    {
        $data = Yii::$app->request->post();

        $this->filterData($data,array('uuid','mac','records'));
        
        $data['rand'] = $data['uuid'].$data['mac'];
        $model = new Sport();
        $bool = $model->addWalkBatch($data);
        $this->giveBack($model->error_code);
    }

    public function actionsleepHistory()
    {
        $data = Yii::$app->request->post();
        $data['upd_time'] = date('Y-m-d H:i:s');

        $this->filterData($data,array('uuid','mac','types','date'));
        
        $model = new Sport();
        $bool = $model->sleepHistory($data);
        $this->giveBack($model->error_code,$bool);
    }

    public function actionsportHistory()
    {
        $data = Yii::$app->request->post();
        $data['upd_time'] = date('Y-m-d H:i:s');

        $this->filterData($data,array('uuid','mac','types','date'));
        
        $model = new Sport();
        $bool = $model->sportHistory($data);
        $this->giveBack($model->error_code,$bool);
    }

    public function actionwalkHistory()
    {
        $data = Yii::$app->request->post();
        $data['upd_time'] = date('Y-m-d H:i:s');

        $this->filterData($data,array('uuid','mac','types','date'));
        
        $model = new Sport();
        $bool = $model->walkHistory($data);
        $this->giveBack($model->error_code,$bool);
    }

}
