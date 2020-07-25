<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use frontend\models\Base;

/**
 * User model
 *
 */
class Sport extends Base
{

    
    

    public function addWalk($data){

        $bool =  Yii::$app->db->createCommand()->insert(Yii::$app->db->tablePrefix.'walk', $data)->execute();
        if (!$bool) {
            $this->error_code = 3;
        }
        return true;
    }

    public function walkHistory($data){
        $result = $this->changeToHistoryWhereParams($data,'startTime');
        $where = $result['where'];
        $params = $result['params'];
        $list = Yii::$app->db->createCommand('SELECT * FROM '.Yii::$app->db->tablePrefix.'walk WHERE '.$where.' order by id desc')
                ->bindValues($params)
                ->queryAll();

        return $list;
    }

    public function addSleepInfo($data){

        $bool =  Yii::$app->db->createCommand()->insert(Yii::$app->db->tablePrefix.'sleep', $data)->execute();
        if (!$bool) {
            $this->error_code = 3;
        }
        return true;
    }

    public function sleepHistory($data){
        $result = $this->changeToHistoryWhereParams($data);
        $where = $result['where'];
        $params = $result['params'];
        $list = Yii::$app->db->createCommand('SELECT * FROM '.Yii::$app->db->tablePrefix.'sleep WHERE '.$where.' order by id desc')
                ->bindValues($params)
                ->queryAll();
        return $list;
    }

    public function addSportData($data){

        $bool =  Yii::$app->db->createCommand()->insert(Yii::$app->db->tablePrefix.'sport', $data)->execute();
        if (!$bool) {
            $this->error_code = 3;
        }
        return true;
    }

    public function sportHistory($data){
        $result = $this->changeToHistoryWhereParams($data);
        $where = $result['where'];
        $params = $result['params'];
        $list = Yii::$app->db->createCommand('SELECT * FROM '.Yii::$app->db->tablePrefix.'sport WHERE '.$where.' order by id desc')
                ->bindValues($params)
                ->queryAll();
        return $list;
    }

    public function addSportBatch($data){
        //数据库插入的字段
        $columns = ['userId','uuid','mac','startTime','endTime','timeConsuming','strength','calorie','fasterRate','dataDetail','rand','locationDetail'];
        // 插入的数组
        $data = $this->changeToInsert($data,$columns);
        
        $bool =  Yii::$app->db->createCommand()->batchInsert(Yii::$app->db->tablePrefix.'sport',$columns, $data)->execute();
        if (!$bool) {
            $this->error_code = 3;
        }
        return true;
    }

    public function addSleepBatch($data){
        //数据库插入的字段
        $columns = ['userId','uuid','mac','startTime','endTime','totalTime','deepTime','shallowTime','soberTime','record','upd_date','rand'];
        // 插入的数组
        $data = $this->changeToInsert($data,$columns);
        
        $bool =  Yii::$app->db->createCommand()->batchInsert(Yii::$app->db->tablePrefix.'sleep',$columns, $data)->execute();
        if (!$bool) {
            $this->error_code = 3;
        }
        return true;
    }

    public function addWalkBatch($data){
        //数据库插入的字段
        $columns = ['userId','uuid','mac','walkCounts','goalWalk','calorie','timeConsuming','startTime','upd_time','distance','rand'];
        // 插入的数组
        $data = $this->changeToInsert($data,$columns);
        
        $bool =  Yii::$app->db->createCommand()->batchInsert(Yii::$app->db->tablePrefix.'walk',$columns, $data)->execute();
        if (!$bool) {
            $this->error_code = 3;
        }
        return true;
    }
    


    
    

}
