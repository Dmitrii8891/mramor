<?php
namespace frontend\models;

use yii\base\Model;
use Yii;

class SendForm extends Model
{

    public $cars;
    public $work_type;
    public $phone_num;

    public function rules()
    {
        return [
            [['cars', 'work_type', 'phone_num'], 'required'],
            [['cars', 'work_type','phone_num'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'phone_num' => 'Телефон',
            'cars' => 'Марка',
            'work_type' => 'Категория работ',
        ];
    }
}