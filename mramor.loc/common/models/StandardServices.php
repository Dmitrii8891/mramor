<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%standard_services}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $translit
 * @property string $image
 * @property string $description
 * @property string $gallery
 */
class StandardServices extends \yii\db\ActiveRecord
{
    public $file;
    public $file_three;
    /**
     *@inheritdoc
     */
    public static function tableName()
    {
        return '{{%standard_services}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'image', 'gallery'], 'required'],
            [['description', 'gallery'], 'string'],
            [['file','file_three'], 'file'],
            [['name', 'translit', 'image'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'translit' => 'Translit',
            'image' => 'Image',
            'description' => 'Description',
            'gallery' => 'Gallery',
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
    public function getGallery(){
        if($this->gallery){
            $array = explode(",", $this->gallery);
            array_pop($array);
            return $array;
        } else {
            return array();
        }

    }
}
