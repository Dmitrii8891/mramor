<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%gallery}}".
 *
 * @property integer $id
 * @property string $translit
 * @property string $title
 * @property string $body
 * @property string $image
 * @property string $meta_title
 * @property string $meta_keywords
 * @property string $meta_description
 */
class Gallery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%gallery}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['translit', 'title', 'body', 'image', 'meta_title', 'meta_keywords', 'meta_description'], 'required'],
            [['body'], 'string'],
            [['translit'], 'string', 'max' => 100],
            [['title', 'meta_title', 'meta_keywords', 'meta_description'], 'string', 'max' => 250],
            [['image'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'translit' => 'Translit',
            'title' => 'Title',
            'body' => 'Body',
            'image' => 'Image',
            'meta_title' => 'Meta Title',
            'meta_keywords' => 'Meta Keywords',
            'meta_description' => 'Meta Description',
        ];
    }
}
