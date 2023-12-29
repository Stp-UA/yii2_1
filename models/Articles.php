<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;


/**
 * This is the model class for table "articles".
 *
 * @property int $id
 * @property string $url
 * @property int $created_at
 * @property int $updated_at
 *
 * @property ArticlesLang[] $articlesLangs
 */
class Articles extends ActiveRecord
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
        return 'articles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['url', 'required'],
            [['created_at', 'updated_at'], 'default', 'value' => function () {
                return time();
            }],
            [['created_at', 'updated_at'], 'integer'],
            ['url', 'string', 'max' => 100],
            ['url', 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'Url',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Lang]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(ArticlesLang::class, ['art_id' => 'id'])->andWhere(['lang' => Yii::$app->language]);
    }
}
