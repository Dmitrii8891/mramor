<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%details_request}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $phone_number
 * @property string $city
 * @property string $comment
 */
class DetailsRequest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%details_request}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'phone_number', 'city'], 'required'],
            [['comment'], 'string'],
            [['name', 'email', 'phone_number', 'city'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'email' => 'Email',
            'phone_number' => 'Телефонr',
            'city' => 'Город',
            'comment' => 'Коментарии',
        ];
    }
}
