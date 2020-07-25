<?php

namespace frontend\controllers;
use yii\base\InlineAction;

class BaseController extends \yii\base\Controller
{


	private $error_message = array(
		0=>'操作成功',
		1=>'用户名不能为空',
		2=>'验证码不能为空',
		3=>'数据库操作失败',
        4=>'用户名已经存在不可使用',
        5=>'用户名密码不正确',
        6=>'必须参数为空',
        7=>'批量添加json字符串有问题',
        8=>'邮箱格式不正确',

	);

    /**
     * Author:Steven
     * Desc:重写路由，处理访问控制器支持驼峰命名法
     * @param string $id
     * @return null|object|InlineAction
     */
    public function createAction($id)
    {
        if ($id === '') {
            $id = $this->defaultAction;
        }

        $actionMap = $this->actions();
        if (isset($actionMap[$id])) {
            return \Yii::createObject($actionMap[$id], [$id, $this]);
        } elseif (preg_match('/^[a-z0-9\\-_]+$/', $id) && strpos($id, '--') === false && trim($id, '-') === $id) {
            $methodName = 'action' . str_replace(' ', '', ucwords(implode(' ', explode('-', $id))));
            if (method_exists($this, $methodName)) {
                $method = new \ReflectionMethod($this, $methodName);
                if ($method->isPublic() && $method->getName() === $methodName) {
                    return new InlineAction($id, $this, $methodName);
                }
            }
        } else {
            $methodName = 'action' . $id;
            if (method_exists($this, $methodName)) {
                $method = new \ReflectionMethod($this, $methodName);
                if ($method->isPublic() && $method->getName() === $methodName) {
                    return new InlineAction($id, $this, $methodName);
                }
            }
        }

        return null;
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * 
     */
    public function giveBack($code,$data=[])
    {
        $out['error_code'] = $code;
        $out['message'] = $this->getErrorMessage($code);
        $out['data'] = $data;
        echo json_encode($out);
        exit();
    }

    private function getErrorMessage($code){
    	if (isset($this->error_message[$code])) {
    		return $this->error_message[$code];
    	}else{
    		return 'default message';
    	}
    }

    public function filterData($data,$filter){
        $out['error_code'] = 6;
        
        $out['data'] = $data;
        foreach ($filter as $k => $v) {
            if(empty($data[$v])){
                $out['message'] = $v.'参数为空';
                echo json_encode($out);
                exit();
            }
        }
        
    }

}
