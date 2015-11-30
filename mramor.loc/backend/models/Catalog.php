<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%catalog}}".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property integer $sort
 * @property string $translit
 * @property string $label
 * @property string $body
 * @property string $about
 * @property string $image
 * @property string $meta_title
 * @property string $meta_keywords
 * @property string $meta_description
 */
class Catalog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%catalog}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'sort', 'translit', 'label', 'body', 'about', 'image', 'meta_title', 'meta_keywords', 'meta_description'], 'required'],
            [['parent_id', 'sort'], 'integer'],
            [['body', 'about'], 'string'],
            [['translit', 'label', 'meta_title', 'meta_keywords', 'meta_description'], 'string', 'max' => 250],
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
            'parent_id' => 'Parent ID',
            'sort' => 'Sort',
            'translit' => 'Translit',
            'label' => 'Label',
            'body' => 'Body',
            'about' => 'About',
            'image' => 'Image',
            'meta_title' => 'Meta Title',
            'meta_keywords' => 'Meta Keywords',
            'meta_description' => 'Meta Description',
        ];
    }
}
