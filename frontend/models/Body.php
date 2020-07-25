<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use frontend\models\Base;

/**
 * User model
 *
 */
class Body extends Base
{

    
    

    public function addXinlv($data){

        $bool =  Yii::$app->db->createCommand()->insert(Yii::$app->db->tablePrefix.'xinlv', $data)->execute();
        if (!$bool) {
            $this->error_code = 3;
        }
        return true;
    }

    public function xinlvList($data){
        $result = $this->changeToWhereParams($data);
        $where = $result['where'];
        $params = $result['params'];
        $list = Yii::$app->db->createCommand('SELECT * FROM '.Yii::$app->db->tablePrefix.'xinlv WHERE '.$where.' order by id desc')
                ->bindValues($params)
                ->queryAll();
        return $list;
    }

    public function addXueya($data){
        
        $bool =  Yii::$app->db->createCommand()->insert(Yii::$app->db->tablePrefix.'xueya', $data)->execute();
        if (!$bool) {
            $this->error_code = 3;
        }
        return true;
    }

    public function xueyaList($data){
        $result = $this->changeToWhereParams($data);
        $where = $result['where'];
        $params = $result['params'];
        $list = Yii::$app->db->createCommand('SELECT * FROM '.Yii::$app->db->tablePrefix.'xueya WHERE '.$where.' order by id desc')
                ->bindValues($params)
                ->queryAll();
        return $list;
    }

    public function addXueyang($data){
        
        $bool =  Yii::$app->db->createCommand()->insert(Yii::$app->db->tablePrefix.'xueyang', $data)->execute();
        if (!$bool) {
            $this->error_code = 3;
        }
        return true;
    }

    public function xueyangList($data){
        $result = $this->changeToWhereParams($data);
        $where = $result['where'];
        $params = $result['params'];
        $list = Yii::$app->db->createCommand('SELECT * FROM '.Yii::$app->db->tablePrefix.'xueyang WHERE '.$where.' order by id desc')
                ->bindValues($params)
                ->queryAll();
        return $list;
    }

    public function addCheck($data){
        
        $bool =  Yii::$app->db->createCommand()->insert(Yii::$app->db->tablePrefix.'check', $data)->execute();
        if (!$bool) {
            $this->error_code = 3;
        }
        return true;
    }
    public function checkList($data){
        $result = $this->changeToWhereParams($data);
        $where = $result['where'];
        $params = $result['params'];
        $list = Yii::$app->db->createCommand('SELECT * FROM '.Yii::$app->db->tablePrefix.'check WHERE '.$where.' order by id desc')
                ->bindValues($params)
                ->queryAll();
        return $list;
    }

    

    public function addHRBatch($data){
        //数据库插入的字段
        $columns = ['userId','uuid','mac','datetime','number','rand'];
        // 插入的数组
        $data = $this->changeToInsert($data,$columns);

        $bool =  Yii::$app->db->createCommand()->batchInsert(Yii::$app->db->tablePrefix.'xinlv',$columns, $data)->execute();
        if (!$bool) {
            $this->error_code = 3;
        }
        return true;
    }

    public function addBOBatch($data){
        //数据库插入的字段
        $columns = ['userId','uuid','mac','datetime','number','rand'];
        // 插入的数组
        $data = $this->changeToInsert($data,$columns);
        
        $bool =  Yii::$app->db->createCommand()->batchInsert(Yii::$app->db->tablePrefix.'xueyang',$columns, $data)->execute();
        if (!$bool) {
            $this->error_code = 3;
        }
        return true;
    }

    public function addBPBatch($data){
        //数据库插入的字段
        $columns = ['userId','uuid','mac','datetime','xueya_gao','xueya_di','rand'];
        // 插入的数组
        $data = $this->changeToInsert($data,$columns);
        
        $bool =  Yii::$app->db->createCommand()->batchInsert(Yii::$app->db->tablePrefix.'xueya',$columns, $data)->execute();
        if (!$bool) {
            $this->error_code = 3;
        }
        return true;
    }


    public function addDevice($data){
        $params[':mac'] = $data['mac'];
        $list = Yii::$app->db->createCommand('SELECT * FROM '.Yii::$app->db->tablePrefix.'device WHERE mac=:mac')
                ->bindValues($params)
                ->queryAll();
        if (!empty($list)) {
            return true;
        }
        $insert['mac'] = $data['mac'];
        $insert['upd_time'] = date('Y-m-d H:i:s');
        $bool =  Yii::$app->db->createCommand()->insert(Yii::$app->db->tablePrefix.'device', $insert)->execute();
        if (!$bool) {
            $this->error_code = 3;
        }
        return true;
    }
    

}
