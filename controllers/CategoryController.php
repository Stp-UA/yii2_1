<?php

namespace app\controllers;

use yii\web\Controller;
use yii\db\Expression;
use app\models\Category;
use app\models\Goods;

class CategoryController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index', [
            'cats' => Category::find()->all()
        ]);
    }

    public function actionView($url)
    {
        $cat = Category::findOne(['url' => $url]);
        $goods = Goods::find()->where(['cid' => $cat->id])->all();
        return $this->render('view', [
            'cat' => $cat,
            'goods' => $goods
        ]);
    }
    public function actionGoods($catUrl, $url)
    {
        $cat = Category::findOne(['url' => $catUrl]);
        $goods = Goods::find()->where(['url' => $url])->one();
        $relativeGoods = Goods::find()->where(['cid' => $cat->id])->orderBy(new Expression('rand()'))->limit(4)->all();

        return $this->render('goods', [
            'cat' => $cat,
            'goods' => $goods,
            'relativeGoods' => $relativeGoods
        ]);
    }
}