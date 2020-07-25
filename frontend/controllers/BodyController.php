<?php

namespace frontend\controllers;

use Yii;
use frontend\controllers\BaseController;
use frontend\models\Body;

class BodyController extends BaseController
{
    public function actionaddBOBatch()
    {
        $data = Yii::$app->request->post();

        $this->filterData($data,array('uuid','mac','records'));
        
        $data['rand'] = $data['uuid'].$data['mac'];
        $model = new Body();
        $bool = $model->addBOBatch($data);
        $this->giveBack($model->error_code);
    }

    public function actionaddBPBatch()
    {
        $data = Yii::$app->request->post();

        $this->filterData($data,array('uuid','mac','records'));
        
        $data['rand'] = $data['uuid'].$data['mac'];
        $model = new Body();
        $bool = $model->addBOBatch($data);
        $this->giveBack($model->error_code);
    }

    public function actionaddCheck()
    {
        $data = Yii::$app->request->post();

        $this->filterData($data,array('uuid','mac','datetime','xinlv','xueyang','xueya_gao','xueya_di'));
        
        $data['rand'] = $data['uuid'].$data['mac'];
        $model = new Body();
        $bool = $model->addCheck($data);
        $this->giveBack($model->error_code);
    }

    public function actionaddHRBatch()
    {
        $data = Yii::$app->request->post();

        $this->filterData($data,array('uuid','mac','records'));
        
        $data['rand'] = $data['uuid'].$data['mac'];
        $model = new Body();
        $bool = $model->addHRBatch($data);
        $this->giveBack($model->error_code);
    }

    public function actionaddXinlv()
    {
        $data = Yii::$app->request->post();

        $this->filterData($data,array('uuid','mac','number'));
        $this->addDevice($data);
        $data['rand'] = $data['uuid'].$data['mac'];
        $model = new Body();
        $bool = $model->addXinlv($data);
        $this->giveBack($model->error_code);
    }

    public function actionaddXueya()
    {
        $data = Yii::$app->request->post();

        $this->filterData($data,array('uuid','mac','xueya_gao','xueya_di'));
        
        $data['rand'] = $data['uuid'].$data['mac'];
        $model = new Body();
        $bool = $model->addXueya($data);
        $this->giveBack($model->error_code);
    }

    public function actionaddXueyang()
    {
        $data = Yii::$app->request->post();

        $this->filterData($data,array('uuid','mac','number'));
        
        $data['rand'] = $data['uuid'].$data['mac'];
        $model = new Body();
        $bool = $model->addXueyang($data);
        $this->giveBack($model->error_code);
    }

    public function actioncheckList()
    {
        $data = Yii::$app->request->post();
        if (!isset($data['date']) || $data['date'] == '') {
            $data['date'] = date('Y-m-d');
        }
        $this->filterData($data,array('uuid','mac'));
        $model = new Body();
        $data = $model->checkList($data);
        $this->giveBack($model->error_code,$data);
    }

    public function actionxinlvList()
    {
        $data = Yii::$app->request->post();
        $data = Yii::$app->request->post();
        if (!isset($data['date']) || $data['date'] == '') {
            $data['date'] = date('Y-m-d');
        }
        $this->filterData($data,array('uuid','mac'));
        $model = new Body();
        $data = $model->xinlvList($data);
        $this->giveBack($model->error_code,$data);
    }

    public function actionxueyaList()
    {
        $data = Yii::$app->request->post();
        $data = Yii::$app->request->post();
        if (!isset($data['date']) || $data['date'] == '') {
            $data['date'] = date('Y-m-d');
        }
        $this->filterData($data,array('uuid','mac'));
        $model = new Body();
        $data = $model->xueyaList($data);
        $this->giveBack($model->error_code,$data);
    }

    public function actionxueyangList()
    {
        $data = Yii::$app->request->post();
        $data = Yii::$app->request->post();
        if (!isset($data['date']) || $data['date'] == '') {
            $data['date'] = date('Y-m-d');
        }
        $this->filterData($data,array('uuid','mac'));
        $model = new Body();
        $data = $model->xueyangList($data);
        $this->giveBack($model->error_code,$data);
    }

    //添加设备
    public function addDevice($data){
        $model = new Body();
        $bool = $model->addDevice($data);
        $this->giveBack($model->error_code);
    }
}
