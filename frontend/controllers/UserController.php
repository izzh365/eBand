<?php

namespace frontend\controllers;

use Yii;
use frontend\controllers\BaseController;
use frontend\models\User;

class UserController extends baseController
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionlogin()
    {
        $data = Yii::$app->request->post();
        $model = new User();
        $bool = $model->login($data);
        $this->giveBack($model->error_code);
    }

    public function actionmodifyUser()
    {
        $data = Yii::$app->request->post();
        $model = new User();
        $bool = $model->modifyUser($data);
        $this->giveBack($model->error_code);
    }

    public function actionregister()
    {
        $data = Yii::$app->request->post();
        if ($data['username'] == '' || $data['password'] == '') {
            $this->giveBack(1);
        }
        if ($data['type'] != 1 && $data['code'] == '') {
            $this->giveBack(2);
        }
        
        $model = new User();
        $bool = $model->register($data);
        $this->giveBack($model->error_code);
    }


    public function actioncheckName()
    {
        $data = Yii::$app->request->post();
        $model = new User();
        $bool = $model->checkName($data);
        $this->giveBack($model->error_code);

    }

    public function actionsendCode()
    {
        $data = Yii::$app->request->post();
        $pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/";
        if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
            $this->giveBack(8);
        }
        $mail= Yii::$app->mailer->compose();   
        $mail->setTo($data['email']);  
        $mail->setSubject("验证码");  
        $code = mt_rand(999,9999);
        $mail->setTextBody(sprintf('您的验证码是：%s',$code));   //发布纯文字文本
        // $mail->setHtmlBody("<br>问我我我我我");    //发布可以带html标签的文本
        $this->giveBack(0);
    }

}
