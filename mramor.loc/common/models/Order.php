<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%order}}".
 *
 * @property integer $id
 * @property string $email
 * @property string $phone_num
 * @property string $date
 * @property string $comment
 * @property string $user_name
 * @property string $total_price
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%order}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'phone_num', 'comment', 'user_name', 'total_price'], 'required'],
            [['date'], 'safe'],
            [['comment'], 'string'],
            [['email', 'phone_num', 'user_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'phone_num' => 'Phone Num',
            'date' => 'Date',
            'comment' => 'Comment',
            'user_name' => 'User Name',
        ];
    }
}
