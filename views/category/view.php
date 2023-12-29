<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\ContactForm $model */


use yii\bootstrap5\Html;

$this->title = Yii::t('app', $cat->lang->title);
// закомментируйте строку ниже и увидите как плохо отображает крошки без нее
$this->params['breadcrumbs'][] = ['label' => 'Категории', 'url' => ['/category']];
$this->params['breadcrumbs'][] = $this->title;
$lang = Yii::$app->language;    //текущий язык

?>
<div class="page-single-category">
    <div class="row">
        <div class="col-lg-12">
            <h1>
                <img src="/images/<?= $cat->lang->image ?>" class=" shadow img-fluid" style="max-width: 64px">
                <?= Html::encode($cat->lang->title) ?>
            </h1>
        </div>
        <div class="col-lg-6 text-end"></div>
    </div><!--row end-->
    <div class="col-lg-12">
        <?= $cat->lang->description ?>
    </div>
    <div class="col-lg-12">
        <div class="row">
            <? foreach ($goods as $item) { ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="card mb-3" style="width: 100%">
                            <div class="text-center pt-2">
                                <img class="card-img-top" src="<?= $item->lang->image ?>" alt="<?= $item->lang->title ?>" style="max-width: 80%">
                            </div>
                            <div class="card-body">
                                <p class="card-title" style="font-size: .8rem;"><?= $item->lang->title ?></p>
                                <h5 class="card-text text-center"><?= number_format($item->cost, 2, ',', ' ') ?> uah</h5>
                                <p class="text-end"><a href="<?= '/' . $lang . '/category/' . $cat->url . '/' . $item->url ?>" class="btn btn-primary">Go </a></p>
                            </div>
                        </div>
                    </div>
            <? } ?>
        </div>
    </div>
</div>

