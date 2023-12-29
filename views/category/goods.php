<?php

/** @var yii\web\View $this */

require_once(Yii::getAlias('@common') . '\func\myFunctions.php');

use yii\bootstrap5\Html;

$this->title = truncate($goods->lang->title, 30);

// закомментируйте строку ниже и увидите как плохо отображает крошки без нее
$this->params['breadcrumbs'][] = ['label' => 'Категории', 'url' => ['/category']];
$this->params['breadcrumbs'][] = ['label' => $cat->lang->title, 'url' => ['/category/' . $cat->url]];
$this->params['breadcrumbs'][] = $this->title;

$lang = Yii::$app->language;
?>
<div class="page-single-category">

    <div class="row">
        <div class="col-lg-12">
            <h1 style="font-size: 1.4rem;" class="mb-3">
                <?= Html::encode($goods->lang->title) ?>
            </h1>
            <div><img src="<?= $goods->lang->image ?>"></div>
            <div>
                <h3><?= number_format($goods->cost, 2, ',', ' ') ?> uah</h3>
            </div>
            <div>
                <h4>Похожие товары</h4>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="row">
                <? foreach ($relativeGoods as $item) { ?>
                        <div class="col-lg-3 col-md-6">
                            <div class="card mb-3" style="width: 100%">
                                <div class="text-center pt-2">
                                    <img class="card-img-top" src="<?= $item->lang->image ?>" alt="<?= $item->lang->title ?>" style="max-width: 80%">
                                </div>
                                <div class="card-body">
                                    <p class="card-title" style="font-size: .8rem;"><?= $item->lang->title ?></p>
                                    <h5 class="card-text text-center"><?= number_format($item->cost, 2, ',', ' ') ?> uah</h5>
                                    <button class="btn btn-success add-goods-to-card" data-articul="<?= $goods->id ?>">add to cart</button>
                                    <p class="text-end"><a href="<?= '/' . $lang . '/category/' . $cat->url . '/' . $item->url ?>" class="btn btn-primary">Go </a></p>
                                </div>
                            </div>
                        </div>
                <? } ?>
            </div>
        </div>
    </div><!--row end-->
</div>
