<?php


namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%items_car_data}}".
 *
 * @property integer $id
 * @property integer $car_id
 * @property integer $item_id
 * @property integer $status
 * @property integer $years_from
 * @property integer $years_to
 *
 * @property Items $item
 * @property Cars $car
 */
class ItemsCarData extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%items_car_data}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['car_id', 'item_id', 'status'], 'required'],
            [['car_id', 'item_id', 'status', 'years_from', 'years_to'], 'integer']
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
            'item_id' => 'Item ID',
            'status' => 'Status',
            'years_from' => 'Years From',
            'years_to' => 'Years To',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(Items::className(), ['id' => 'item_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCar()
    {
        return $this->hasOne(Cars::className(), ['id' => 'car_id']);
    }

    static function isActive($car_id, $item_id = '')
    {

        if(empty($item_id)){
            return true;
        }
        $data = self::find()
            ->where(['car_id'=> $car_id, 'item_id'=> $item_id])
            ->one();

        if(!empty($data) && $data->status){
            return true;
        } else {
            return false;
        }
    }
}
