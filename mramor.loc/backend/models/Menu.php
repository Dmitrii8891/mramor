<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%menu}}".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property integer $lft
 * @property integer $rgt
 * @property integer $level
 * @property integer $sort
 * @property string $label
 * @property string $url
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%menu}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'lft', 'rgt', 'level', 'sort', 'label', 'url'], 'required'],
            [['parent_id', 'lft', 'rgt', 'level', 'sort'], 'integer'],
            [['url'], 'string'],
            [['label'], 'string', 'max' => 255]
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
            'lft' => 'Lft',
            'rgt' => 'Rgt',
            'level' => 'Level',
            'sort' => 'Sort',
            'label' => 'Label',
            'url' => 'Url',
        ];
    }
}
