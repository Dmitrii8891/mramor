<?php
namespace frontend\models;

use yii\base\Model;
use Yii;

class OrderForm extends Model
{

    public $total_price;
    public $one_item;
    public $phone_num;
    public $email;
    public $comment;
    public $user_name;


    public function rules()
    {
        return [
            [['total_price', 'one_item', 'phone_num', 'email', 'user_name'], 'required'],
            [['email', 'user_name','phone_num'], 'string', 'max' => 255],
            [['total_price', 'one_item', ], 'integer'],
            ['email', 'email']
        ];
    }

    public function attributeLabels()
    {
        return [
            'phone_num' => 'Телефон',
            'user_name' => 'Имя',
            'comment' => 'Комментарии',

        ];
    }
}