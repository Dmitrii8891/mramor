<?php

namespace common\models;

use backend\models\Country;
use backend\models\TypeOfStone;
use Yii;

/**
 * This is the model class for table "{{%stone}}".
 *
 * @property integer $id
 * @property string $image
 * @property string $name
 * @property integer $filter_one
 * @property integer $filter_two+
 * @property integer $filter_three
 * @property string $description
 * @property string $translit
 * @property string $gallery
 */
class Stone extends \yii\db\ActiveRecord
{
    public $file;
    public $file_three;
    public $test = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%stone}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'translit', 'filter_three'], 'required'],
            [['filter_one', 'filter_two', 'filter_three'], 'integer'],
            [['file','file_three'], 'file'],
            [['description', 'gallery'], 'string'],
            [['image', 'name', 'translit'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Картинка',
            'name' => 'Название',
            'filter_one' => 'Фильтр 1',
            'filter_two' => 'Фильтр 2',
            'filter_three' => 'Фильтр 3',
            'description' => 'Описание',
            'translit' => 'Translit',
        ];
    }
    public function behaviors()
    {
        return [
            'slug' => [
                'class' => 'common\behaviors\Slug',
                'in_attribute' => 'name',
                'out_attribute' => 'translit',
                'translit' => true
            ]
        ];
    }

    public function getGallery(){
        if($this->gallery){
            $array = explode(",", $this->gallery);
            array_pop($array);
            return $array;
        } else {
            return array();
        }

    }

    function minImg($dir, $width, $height=null){
        if($width=='original'){
            $preg = '/\/(.[^\/]*)$/';
            preg_match('/\.(.[^.]*)$/', $dir, $type);
            $row = preg_replace( $preg, '/original.'.$type[1],  $dir);
        } else {
            $preg = '/\/(.[^\/]*)$/';
            preg_match('/\.(.[^.]*)$/', $dir, $type);
            $row =  preg_replace( $preg, '/'.$width.'X'.$height.'.'.$type[1],  $dir);
        }
        return $row;
//        if(file_exists($_SERVER['DOCUMENT_ROOT'].$row)){
//            return $row;
//        } else {
//            return "/storage/no-image.png";
//        }

    }

    public function getCountry(){
        return $this->hasOne(Country::className(), ['id' => 'filter_three']);
    }

    public function getType(){
        return $this->hasOne(TypeOfStone::className(), ['id' => 'filter_one']);
    }
}
