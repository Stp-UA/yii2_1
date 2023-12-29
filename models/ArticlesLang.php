<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "articles_lang".
 *
 * @property int $id
 * @property int $art_id
 * @property string $lang
 * @property string $title
 * @property string $text
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Articles $art
 */
class ArticlesLang extends \yii\db\ActiveRecord
{
	public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'value' => time(),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'articles_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['art_id', 'lang', 'title', 'text'], 'required'],
            [['created_at', 'updated_at'], 'default', 'value' => function () {
                return time();
            }],
            [['art_id', 'created_at', 'updated_at'], 'integer'],
            [['lang'], 'string', 'max' => 3],
            [['title'], 'string', 'max' => 300],
            [['text'], 'string'],
            [['art_id'], 'exist', 'skipOnError' => true, 'targetClass' => Articles::class, 'targetAttribute' => ['art_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'art_id' => 'Article ID',
            'lang' => 'Lang',
            'title' => 'Title',
            'text' => 'Text',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Art]].
     *
     * @return \yii\db\ActiveQuery
     */
}
