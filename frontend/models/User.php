<?php
namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * User model
 *
 */
class User extends Model
{

    public $error_code=0;
    public $tablePrefix;

    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    public function register($data){
        if ($data['password'] != '') {    
            $data['password'] = md5($data['password']);
        }
        $data['fromType'] = $data['type'];
        unset($data['type']);
        unset($data['code']);
        $data['reg_date'] = date('Y-m-d H:i:s');
        $data['upd_time'] = date('Y-m-d H:i:s');
        $bool =  Yii::$app->db->createCommand()->insert(Yii::$app->db->tablePrefix.'user', $data)->execute();
        if (!$bool) {
            $this->error_code = 3;
        }
        return true;
    }

    public function checkName($data){
        $params = [':username'=>$data['username']];
        $user = Yii::$app->db->createCommand('SELECT * FROM '.Yii::$app->db->tablePrefix.'user WHERE username=:username')
                ->bindValues($params)
                ->queryOne();
        if($user){
            $this->error_code = 4;
        }
        return true;
    }

    public function login($data){
        $params = [':username'=>$data['username']];
        $user = Yii::$app->db->createCommand('SELECT * FROM '.Yii::$app->db->tablePrefix.'user WHERE username=:username')
                ->bindValues($params)
                ->queryOne();
        if ($user['password'] != md5($data['password'])) {
            $this->error_code = 5;
        }else{
            $data = ['upd_time'=>date('Y-m-d H:i:s')];
            $where = ['userId'=>$user['userId']];
            $bool = Yii::$app->db->createCommand()->update(Yii::$app->db->tablePrefix.'user', $data,$where)->execute();
        }
    }

    public function modifyUser($data){
        $where = ['userId'=>$data['userId']];
        unset($data['userId']);
        $bool =  Yii::$app->db->createCommand()->update(Yii::$app->db->tablePrefix.'user', $data,$where)->execute();
        if (!$bool) {
            $this->error_code = 3;
        }
        return true;
    }
    

}
