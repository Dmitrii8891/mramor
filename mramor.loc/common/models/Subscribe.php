<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%subscribe}}".
 *
 * @property integer $id
 * @property string $phone_num
 * @property string $email
 */
class Subscribe extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%subscribe}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['phone_num', 'email'], 'required'],
            [['phone_num', 'email'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'phone_num' => 'Телефон',
            'email' => 'Email',
        ];
    }
}
