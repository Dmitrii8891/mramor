<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%seo_data}}".
 *
 * @property integer $id
 * @property integer $item_id
 * @property string $seo_title
 * @property string $seo_h1
 * @property string $seo_description
 * @property string $seo_translite
 * @property string $url
 * @property string $model
 */
class SeoData extends \yii\db\ActiveRecord
{   public $item_id;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%seo_data}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_id'], 'integer'],
            [['seo_description'], 'string'],
            [['seo_title', 'seo_h1', 'seo_translite','model','url'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'item_id' => 'Item ID',
            'seo_title' => 'Seo Title',
            'seo_h1' => 'Seo H1',
            'seo_description' => 'Seo Description',
            'seo_translite' => 'Seo Translite',
            'url' => 'url'
        ];
    }
}
