<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%news}}".
 *
 * @property integer $id
 * @property string $translit
 * @property string $title
 * @property string $about
 * @property string $body
 * @property string $image
 * @property string $image_ico
 * @property string $meta_title
 * @property string $meta_keywords
 * @property string $meta_description
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%news}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['translit', 'title', 'about', 'body', 'image', 'image_ico', 'meta_title', 'meta_keywords', 'meta_description'], 'required'],
            [['about', 'body'], 'string'],
            [['translit', 'title', 'meta_title', 'meta_keywords', 'meta_description'], 'string', 'max' => 250],
            [['image', 'image_ico'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cars' => 'ID',
            'work_type' => 'Translit',
        ];
    }
}
