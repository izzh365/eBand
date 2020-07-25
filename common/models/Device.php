<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\data\ActiveDataProvider;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $verification_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class Device extends ActiveRecord
{
    


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%device}}';
    }

    

    public function search($params)
    {
        $query =  parent::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
            "sort"=>[
                'defaultOrder' => ['upd_time' => SORT_DESC],
            ]
        ]);
    
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        $query->andFilterWhere(['like', 'mac', $this->nickname]) ;
        $query->andFilterWhere(['like', 'upd_time', $this->upd_time]) ;
    
        return $dataProvider;
    }
}
