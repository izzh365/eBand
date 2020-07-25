<?php

namespace backend\controllers;
use Yii;
class CommonController extends \yii\web\Controller
{
    public function checkLogin(){
    	// 检查用户名是否登录
    	// $username = Yii::$app->user->identity->username;
    	// if (!$username) {//用户没有登录的时候进行跳转到登录界面
    	// 	$this->redirect(['/site/login']);  
    	// 	// return $this->goHome(); 
    	// }
    }
}
