<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%partners}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $url
 * @property string $image
 */
class Partners extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%partners}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'url', 'image'], 'required'],
            [['title', 'url'], 'string', 'max' => 250],
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
            'title' => 'Title',
            'url' => 'Url',
            'image' => 'Image',
        ];
    }
}
