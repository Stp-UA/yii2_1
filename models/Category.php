<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $title
 * @property string $url
 * @property string $image
 * @property string|null $description
 * @property int $created_at
 * @property int $updated_at
 */
class Category extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['url', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['url'], 'string', 'max' => 300],
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

    public function getLang()
    {
        return $this->hasOne(CategoryLang::class, ['cid' => 'id'])->andWhere(['lang' => Yii::$app->language]);
    }
}
