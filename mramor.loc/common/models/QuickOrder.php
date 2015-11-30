<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%quick_order}}".
 *
 * @property integer $id
 * @property string $phone_num
 * @property string $date
 * @property string $email
 * @property string $comment
 */
class QuickOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%quick_order}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['phone_num'], 'required'],
            [['comment'], 'string'],
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
            'date' => 'Дата',
            'email' => 'Email',
            'comment' => 'Коментарий',
        ];
    }
}
