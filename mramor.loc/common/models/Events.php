<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%events}}".
 *
 * @property integer $id
 * @property string $cover
 * @property string $name
 * @property string $translit
 * @property string $description
 */
class Events extends \yii\db\ActiveRecord
{
    public $file;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%events}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cover', 'name', 'translit', 'description'], 'required'],
            [['description'], 'string'],
            [['file'], 'file'],
            [['cover', 'name', 'translit'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cover' => 'Картинка',
            'name' => 'Название',
            'translit' => 'Translit',
            'description' => 'Описание',
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

}
