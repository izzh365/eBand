<?php
/**
 * Created by PhpStorm
 * User: izzh
 * Date: 2020/7/29
 * Time: 16:19
 */


namespace backend\controllers;
use Yii;
use yii\base\Controller;

class SiteController extends Controller
{

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionIndex2()
    {
        return $this->render('index');
    }

}