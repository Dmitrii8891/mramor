<?php

namespace common\models;

use Yii;
use backend\models\ChengedServices;

/**
 * This is the model class for table "{{%sto_order}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $phone_num
 * @property string $services
 * @property string $date
 */
class StoOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sto_order}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'phone_num', 'services'], 'required'],
            [['date'], 'safe'],
            [['name', 'phone_num', 'services'], 'string', 'max' => 255]
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
            'phone_num' => 'Номер телефона',
            'services' => 'Услуги',
            'date' => 'Дата',
        ];
    }

    function getServices(){
        $services = explode(",", $this->services);
        return ChengedServices::find()->where(['id'=>$services])->all();
    }
}
