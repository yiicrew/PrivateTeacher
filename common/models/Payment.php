<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

use \common\models\base\Payment as BasePayment;

/**
 * This is the model class for table "payment".
 */
class Payment extends BasePayment
{
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
            ],
            ['class' => BlameableBehavior::className(),],
        ];
    }

    public function getAllStudentsAsMappedArray($condition = null, $userId = null){
        $userId = isset($userId) ? $userId : Yii::$app->user->id;

        $models = Student::find()
                    ->where(['user_id'=>$userId]);

        if (isset($condition)) {
            $models->andWhere($condition);
        }

        return ArrayHelper::map($models->all(), 'id', 'fullname');
    }

    public function getActiveStudentsAsMappedArray(){
        return $this->getAllStudentsAsMappedArray(['is_active'=>true]);
    }
}
