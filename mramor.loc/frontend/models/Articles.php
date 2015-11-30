<?php

namespace frontend\models;

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
 * @property string $meta_title
 * @property string $description
 * @property string $h1
 * @property string $seo_text
 */
class Articles extends \yii\db\ActiveRecord
{
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
            [['name', 'body'], 'required'],
            [['work_type'], 'integer'],
            [['body', 'seo_text'], 'string'],
            [['name', 'h1'], 'string', 'max' => 255],
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
            'work_type' => 'Категория работ',
            'translit' => 'Транслит',
            'title' => 'Заголовок',
            'body' => 'Body',
            'meta_title' => 'Meta Title',
            'description' => 'Description',
            'h1' => 'H1',
            'seo_text' => 'Seo Text',
        ];
    }


    public function shortenString( $str, $length = 200 )
    {
        if( strlen($str) > $length )
        {
            $str = wordwrap( $str, $length, '||BR||', false );
            $str = mb_substr( $str, 0, mb_strpos( $str, '||BR||', 0, 'UTF-8' ), 'UTF-8' );
            $str .= '...';
        }

        return $str;
    }
}
