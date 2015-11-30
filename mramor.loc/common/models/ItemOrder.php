<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%item_order}}".
 *
 * @property integer $id
 * @property integer $order_id
 * @property integer $item_id
 * @property integer $num
 * @property integer $price
 * @property string  $item_name
 */
class ItemOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%item_order}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'item_id', 'num', 'price', 'item_name'], 'required'],
            [['order_id', 'item_id', 'num', 'price'], 'integer'],
            [['item_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'item_id' => 'Item ID',
            'num' => 'Num',
            'price' => 'Price',
            'item_name' => 'Item Name',
        ];
    }
}
