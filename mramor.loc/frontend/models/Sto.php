<?php

namespace frontend\models;

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


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'text' => 'Text',
            'h1' => 'H1',
            'description' => 'Description',
            'title' => 'Title',
            'translit' => 'Translit',
            'seo_text' => 'Seo Text',
        ];
    }
}
