<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "images".
 *
 * @property int $id
 * @property string $filename
 * @property string $extension
 * @property int $created_at
 */
class Images extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'images';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['filename', 'extension'], 'required'],
            [['created_at'], 'default', 'value' => function () {
                return time();
            }],
            [['created_at'], 'integer'],
            [['filename'], 'string', 'max' => 300],
            [['extension'], 'string', 'max' => 5],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'filename' => 'Filename',
            'extension' => 'Extension',
            'created_at' => 'Created At',
        ];
    }
}
