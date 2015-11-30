<?php
namespace common\models;

use yii\base\Model;
use Yii;

class SiteSearchForm extends Model
{

    public $string;


    public function rules()
    {
        return [
            [['string'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'string',
        ];
    }
}