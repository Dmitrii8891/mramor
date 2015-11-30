<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%files}}".
 *
 * @property integer $id
 * @property string $table_name
 * @property integer $table_id
 * @property string $file
 */
class Files extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%files}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['table_name', 'table_id', 'file'], 'required'],
            [['table_id'], 'integer'],
            [['table_name'], 'string', 'max' => 15],
            [['file'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'table_name' => 'Table Name',
            'table_id' => 'Table ID',
            'file' => 'File',
        ];
    }
}
