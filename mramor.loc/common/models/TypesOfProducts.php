<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%types_of_products}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $h1
 * @property string $translit
 * @property string $title
 * @property string $description
 * @property string $text
 * @property string $gallery
 */
class TypesOfProducts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%types_of_products}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'h1', 'translit', 'title', 'description', 'text', 'gallery'], 'required'],
            [['text', 'gallery'], 'string'],
            [['name', 'h1', 'translit', 'title', 'description'], 'string', 'max' => 255]
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
            'h1' => 'H1',
            'translit' => 'Translit',
            'title' => 'Title',
            'description' => 'Description',
            'text' => 'Text',
            'gallery' => 'Gallery',
        ];
    }
}
