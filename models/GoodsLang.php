<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "goods_lang".
 *
 * @property int $id
 * @property int $gid
 * @property string $lang
 * @property string $title
 * @property string $image
 * @property string|null $description
 * @property int $state
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class GoodsLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'goods_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gid', 'lang', 'title', 'image'], 'required'],
            [['gid', 'state', 'created_at', 'updated_at'], 'integer'],
            [['description'], 'string'],
            [['lang'], 'string', 'max' => 3],
            [['title', 'image'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'gid' => 'Gid',
            'lang' => 'Lang',
            'title' => 'Title',
            'image' => 'Image',
            'description' => 'Description',
            'state' => 'State',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
