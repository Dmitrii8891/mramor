<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%standard_services}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $price
 * @property integer $work_type
 */
class StandardServices extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%standard_services}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'price', 'work_type'], 'required'],
            [['price', 'work_type'], 'integer'],
            [['name'], 'string', 'max' => 255]
        ];
    }



    public function isActive($car_id)
    {
        $check = ChengedServices::find()
            ->where(['car_id'=> $car_id, 'service_id'=> $this->id])
            ->one();
        if($check instanceof ChengedServices){
            return true;
        } else {
            return false;
        }
    }

    public function getPrice($car_id)
    {

        $check = ChengedServices::find()
            ->where(['car_id'=> $car_id, 'service_id'=> $this->id])
            ->one();

        if($check instanceof ChengedServices){
            return $check->price;
        } else {
            return $this->price;
        }

    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'price' => 'Цена',
            'work_type' => 'Категория работ',
        ];
    }
}
