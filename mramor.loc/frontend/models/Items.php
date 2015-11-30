<?php

namespace frontend\models;

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
            'name' => 'Name',
            'price' => 'Price',
            'file' => 'Picture',
            'text' => 'Text',
            'year' => 'Year',
            'state' => 'State',
            'work_type' => 'Work Type',
            'h1' => 'H1',
            'title' => 'Title',
            'description' => 'Description',
            'translit' => 'Translit',
            'seo_text' => 'Seo Text',
        ];
    }

    static function getRandomItems()
    {
        return self::find()->limit(4)->all();
    }


    static function getYears()
    {
        $items = self::find()->all();

        $years = array();

        foreach($items as $item){
            $years[$item['year']] = $item['year'];
        }

        return array_unique($years);

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
