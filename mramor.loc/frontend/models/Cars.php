<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%cars}}".
 *
 * @property integer $id
 * @property string $brand
 * @property string $picture
 * @property string $sto_text
 * @property string $h1
 * @property string $translit
 * @property string $title
 * @property string $description
 * @property string $seo_text
 */
class Cars extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%cars}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['brand', 'picture', 'sto_text'], 'required'],
            [['sto_text', 'seo_text'], 'string'],
            [['file'],'file'],
            [['brand', 'picture', 'h1', 'translit', 'title', 'description'], 'string', 'max' => 255]
        ];
    }


    public function getServices()
    {
        return $this->hasMany(ChengedServices::className(), ['car_id' => 'id']);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'brand' => 'Название машины',
            'file' => 'Картинка',
            'sto_text' => 'Sto Text',
            'h1' => 'H1',
            'translit' => 'Translit',
            'title' => 'Title',
            'description' => 'Description',
            'seo_text' => 'Seo Text',
        ];
    }

    public function getActiveCarId(){
        //Yii::$app->session->destroy();
        return  Yii::$app->session->get('chosen-car') ? Yii::$app->session->get('chosen-car') : '';
    }

    public function getActiveCar(){
        $carId = $this->getActiveCarId();

        if($carId) {
            return $this->findOne($carId);
        } else {
            $this->brand =  'Модель авто';
            $this->picture =  '/storage/cars/none-car.jpg';
            return $this;
        }
    }

    public function  getItems(){

        $array = array();

        $items = ItemsCarData::find()->where(['car_id'=>$this->id])->all();

        foreach($items as $item){

            $array[] = $item['item_id'];

        }

        return Items::find()->where(['id'=>$array])->limit(3)->all();

    }
}
