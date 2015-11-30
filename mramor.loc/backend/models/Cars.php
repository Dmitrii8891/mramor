<?php

namespace backend\models;

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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemCar()
    {
        return $this->hasMany(ItemsCarData::className(), ['car_id' => 'id']);
    }


    /**
     * \yii\db\ActiveQuery
     */
    public function getChangedServices(){
        return $this->hasMany(ChengedServices::className(), ['car_id' => 'id']);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'brand' => 'Назване машины',
            'file' => 'Рисунок',
            'sto_text' => 'Текст для сто',
            'h1' => 'H1',
            'translit' => 'Translit',
            'title' => 'Title',
            'description' => 'Description',
            'seo_text' => 'Seo Text',
        ];
    }
}
