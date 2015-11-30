<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%chenged_services}}".
 *
 * @property integer $id
 * @property integer $car_id
 * @property integer $price
 * @property integer $status
 * @property string $name
 * @property integer $service_id
 * @property integer $work_type
 */
class ChengedServices extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%chenged_services}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['car_id', 'price', 'status', 'name', 'service_id', 'work_type'], 'required'],
            [['car_id', 'price', 'status', 'service_id', 'work_type'], 'integer'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'car_id' => 'Car ID',
            'price' => 'Price',
            'status' => 'Status',
            'name' => 'Name',
            'service_id' => 'Service ID',
            'work_type' => 'Work Type',
        ];
    }
}
