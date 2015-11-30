<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%items}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $price
 * @property string $picture
 * @property string $text
 * @property integer $year
 * @property integer $state
 * @property integer $work_type
 * @property string $h1
 * @property string $title
 * @property string $description
 * @property string $translit
 * @property string $seo_text
 */
class Items extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%items}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'price', 'picture', 'text', 'year', 'state', 'work_type'], 'required'],
            [['price', 'year', 'state', 'work_type'], 'integer'],
            [['text', 'seo_text'], 'string'],
            [['file'],'file'],
            [['name', 'picture', 'h1', 'title', 'description', 'translit'], 'string', 'max' => 255]
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
            'price' => 'Цена',
            'file' => 'Рисунок',
            'text' => 'Текст',
            'year' => 'Год',
            'state' => 'Состояние',
            'work_type' => 'Категория работ',
            'h1' => 'H1',
            'title' => 'Title',
            'description' => 'Description',
            'translit' => 'Translit',
            'seo_text' => 'Seo Text',
        ];
    }
}
