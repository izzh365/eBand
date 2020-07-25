<?php
namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * User model
 *
 */
class Base extends Model
{

    public $error_code=0;
    public $tablePrefix;

    /**
    *批量处理为可插入数组
    **/
    public function changeToInsert($data,$columns){
        $keys = array_keys($data);
        $records = json_decode($data['records'],true);
        if(is_null($records)||empty($records)){
            $this->error_code = 7;
            return false;
        }
        $out = [];
        foreach ($records as $k => $v) {
            $temp = [];
            foreach ($columns as $kin => $vin) {

                if($vin == 'rand'){
                    $temp[$vin] = $data['uuid'].$data['mac'];
                }elseif (in_array($vin,$keys)) {
                    $temp[$vin] = $data[$vin];
                }else{
                    $temp[$vin] = $v[$vin];
                }
                
            }
            $out[] = $temp;
        }
        return $out;
    }

    public function changeToWhereParams($data){
    	$out = [];
    	$time = ' datetime between "' . $data['date'].' 00:00:00"'.' and "'.$data['date'].' 23:59:59"';
        if(isset($data['userId']) && $data['userId'] != ''){
            $out['where']  = 'userId = :userId and'.$time;
            $out['params'] = [':userId'=>$data['userId']];
        }else{
            $out['where']  = 'rand=:rand and'.$time;
            $out['params'] = [':rand'=>$data['uuid'].$data['mac']];
        }
        return $out;
    }

    public function changeToRecordWhereParams($data,$startTime = 'startTime'){
    	$out = [];
    	$time = ' '.$startTime.' between "' . $data['startDate'].' 00:00:00"'.' and "'.$data['endDate'].' 23:59:59"';
        if(isset($data['userId']) && $data['userId'] != ''){
            $out['where']  = 'userId = :userId and'.$time;
            $out['params'] = [':userId'=>$data['userId']];
        }else{
            $out['where']  = 'rand=:rand and'.$time;
            $out['params'] = [':rand'=>$data['uuid'].$data['mac']];
        }
        return $out;
    }
    
    public function changeToHistoryWhereParams($data,$endTime = 'endTime'){

    	if($data['types']==1){
			$dates=date('Y-m-d' ,strtotime($data['date']));
			$start_time=$dates." 00:00:00";
			$end_time=$dates." 23:59:59";
            $time = ' '.$endTime.' between "' . $start_time.'" and "'.$end_time.'"';            

        }else if($data['types']==2){

            $end_time=date("Y-m-d 23:59:59",strtotime("{$data['date']} Sunday"));
            $start_time=date("Y-m-d 00:00:00",strtotime("$end_time - 6 days"));
       		$time = ' '.$endTime.' between "' . $start_time.'" and "'.$end_time.'"';
            
        }else if($data['types']==3){

           	$timestamp=strtotime($data['date']);     
			$start_time=date('Y-m-01 00:00:00',strtotime(date('Y',$timestamp).'-'.(date('m',$timestamp)-(4-4)).'-01'));
			$end_time=date('Y-m-d 23:59:59',strtotime("$start_time +1 month -1 day"));
            $time = ' '.$endTime.' between "' . $start_time.'" and "'.$end_time.'"';
			
        }

        if(isset($data['userId']) && $data['userId'] != ''){
            $out['where']  = 'userId = :userId and'.$time;
            $out['params'] = [':userId'=>$data['userId']];
        }else{
            $out['where']  = 'rand=:rand and'.$time;
            $out['params'] = [':rand'=>$data['uuid'].$data['mac']];
        }
        return $out;
    }
   
    

}
