<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%sto}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $text
 * @property string $h1
 * @property string $description
 * @property string $title
 * @property string $translit
 * @property string $seo_text
 */
class Sto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sto}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'text'], 'required'],
            [['text', 'seo_text'], 'string'],
            [['name', 'h1', 'description', 'title', 'translit'], 'string', 'max' => 255]
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
            'text' => 'Текст',
            'h1' => 'H1',
            'description' => 'Description',
            'title' => 'Title',
            'translit' => 'Translit',
            'seo_text' => 'Seo Text',
        ];
    }
}
