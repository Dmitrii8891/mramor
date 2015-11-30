<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%category}}".
 *
 * @property integer $id
 * @property integer $parent_category
 * @property string $name
 * @property string $translit
 * @property string $image
 * @property string $cover
 * @property string $description
 * @property string $gallery
 */
class Category extends \yii\db\ActiveRecord
{
    public $file;
    public $file_two;
    public $file_three;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_category'], 'integer'],
            [['name', 'translit'], 'required'],
            [['file', 'file_two', 'file_three'], 'file'],
            [['description','gallery'], 'string'],
            [['name', 'translit', 'image', 'cover'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_category' => 'Parent Category',
            'name' => 'Name',
            'translit' => 'Translit',
            'image' => 'Вид',
            'cover' => 'Вид',
            'file' => '',
            'file_two' => '',
            'file_three' => '',
            'description' => 'Описание',
            'gallery' => 'Вид',

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

}
