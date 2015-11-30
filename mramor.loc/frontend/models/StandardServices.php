<?php

namespace frontend\models;

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

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'price' => 'Price',
            'work_type' => 'Work Type',
        ];
    }
}
