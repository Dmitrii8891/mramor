<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%slider}}".
 *
 * @property integer $id
 * @property integer $sort
 * @property string $title
 * @property string $body
 * @property string $url
 * @property string $image
 */
class Slider extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%slider}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sort', 'title', 'body', 'url', 'image'], 'required'],
            [['sort'], 'integer'],
            [['body'], 'string'],
            [['title'], 'string', 'max' => 250],
            [['url'], 'string', 'max' => 100],
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
            'sort' => 'Sort',
            'title' => 'Title',
            'body' => 'Body',
            'url' => 'Url',
            'image' => 'Image',
        ];
    }
}
