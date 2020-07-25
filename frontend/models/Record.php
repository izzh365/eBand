<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use frontend\models\Base;

/**
 * User model
 *
 */
class Record extends Base
{
    
    public function bPRecord($data){
        $result = $this->changeToRecordWhereParams($data,'dateTime');
        $where = $result['where'];
        $params = $result['params'];
        $list = Yii::$app->db->createCommand('SELECT * FROM '.Yii::$app->db->tablePrefix.'xueya WHERE '.$where.' order by id desc')
                ->bindValues($params)
                ->queryAll();

        return $list;
    }
    public function hORecord($data){
        $result = $this->changeToRecordWhereParams($data,'dateTime');
        $where = $result['where'];
        $params = $result['params'];
        $list = Yii::$app->db->createCommand('SELECT * FROM '.Yii::$app->db->tablePrefix.'xueyang WHERE '.$where.' order by id desc')
                ->bindValues($params)
                ->queryAll();

        return $list;
    }
    public function hRRecord($data){
        $result = $this->changeToRecordWhereParams($data,'dateTime');
        $where = $result['where'];
        $params = $result['params'];
        $list = Yii::$app->db->createCommand('SELECT * FROM '.Yii::$app->db->tablePrefix.'xinlv WHERE '.$where.' order by id desc')
                ->bindValues($params)
                ->queryAll();

        return $list;
    }
    public function sleepRecord($data){
        $result = $this->changeToRecordWhereParams($data);
        $where = $result['where'];
        $params = $result['params'];
        $list = Yii::$app->db->createCommand('SELECT * FROM '.Yii::$app->db->tablePrefix.'sleep WHERE '.$where.' order by id desc')
                ->bindValues($params)
                ->queryAll();

        return $list;
    }
    public function sportRecord($data){
        $result = $this->changeToRecordWhereParams($data);
        $where = $result['where'];
        $params = $result['params'];
        $list = Yii::$app->db->createCommand('SELECT * FROM '.Yii::$app->db->tablePrefix.'sport WHERE '.$where.' order by id desc')
                ->bindValues($params)
                ->queryAll();

        return $list;
    }
    public function walkRecord($data){
        $result = $this->changeToRecordWhereParams($data);
        $where = $result['where'];
        $params = $result['params'];
        $list = Yii::$app->db->createCommand('SELECT * FROM '.Yii::$app->db->tablePrefix.'walk WHERE '.$where.' order by id desc')
                ->bindValues($params)
                ->queryAll();

        return $list;
    }

    
    


    
    

}
