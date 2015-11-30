<?php

namespace common\models;

use backend\models\Country;
use Yii;

/**
 * This is the model class for table "{{%goods}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $translit
 * @property string $description
 * @property integer $stone
 * @property string $image
 * @property string $status
 * @property integer $category_id
 * @property integer $gallery
 * @property integer $seo_id
 */
class Goods extends \yii\db\ActiveRecord
{
    public $file;
    public $file_three;
    public $test = 1;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%goods}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'status','category_id'], 'required'],
            [['description','gallery'], 'string'],
            [['file','file_three'], 'file'],
            [['stone', 'category_id'], 'integer'],
            [['name', 'translit', 'image', 'status'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'translit' => 'Translit',
            'description' => 'Описание',
            'stone' => 'Камень',
            'image' => 'Картинка',
            'status' => 'Статус',
            'category_id'=>'Категория'
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

    public function getStones(){
        return $this->hasOne(Stone::className(), ['id' => 'stone']);
    }

    public function getSeo(){
        return $this->hasOne(SeoData::className(), ['id' => 'seo_id']);
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

}
