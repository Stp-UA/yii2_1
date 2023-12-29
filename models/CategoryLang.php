<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category_lang".
 *
 * @property int $id
 * @property int $cid
 * @property string $lang
 * @property string $title
 * @property string $image
 * @property string $description
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Category $c
 */
class CategoryLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cid', 'lang', 'title', 'image', 'description', 'created_at', 'updated_at'], 'required'],
            [['cid', 'created_at', 'updated_at'], 'integer'],
            [['description'], 'string'],
            [['lang'], 'string', 'max' => 3],
            [['title', 'image'], 'string', 'max' => 300],
            [['cid'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['cid' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cid' => 'Cid',
            'lang' => 'Lang',
            'title' => 'Title',
            'image' => 'Image',
            'description' => 'Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[C]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getC()
    {
        return $this->hasOne(Category::class, ['id' => 'cid']);
    }
}
