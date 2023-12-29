<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "goods".
 *
 * @property int $id
 * @property string $url
 * @property int $cid
 * @property int $cost
 * @property int $created_at
 * @property int $updated_at
 */
class Goods extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'goods';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['url', 'cid', 'cost', 'created_at', 'updated_at'], 'required'],
            [['cid', 'cost', 'created_at', 'updated_at'], 'integer'],
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
            'cid' => 'Cid',
            'cost' => 'Cost',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    public function getLang()
    {
        return $this->hasOne(GoodsLang::class, ['gid' => 'id'])->andWhere(['lang' => Yii::$app->language]);
    }
}
