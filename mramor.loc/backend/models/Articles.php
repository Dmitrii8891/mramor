<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%articles}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $work_type
 * @property string $translit
 * @property string $title
 * @property string $body
 * @property string $picture
 * @property string $meta_title
 * @property string $description
 * @property string $h1
 * @property string $seo_text
 */
class Articles extends \yii\db\ActiveRecord
{

    public $file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%articles}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name','body'], 'required'],
            [['work_type'], 'integer'],
            [['file'], 'file'],
            [['body', 'seo_text'], 'string'],
            [['name', 'h1', 'picture'], 'string', 'max' => 255],
            [['translit', 'title', 'meta_title', 'description'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'work_type' => 'Вид работ',
            'translit' => 'Translit',
            'title' => 'Title',
            'body' => 'Body',
            'meta_title' => 'Meta Title',
            'description' => 'Description',
            'h1' => 'H1',
            'seo_text' => 'Seo Text',
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
