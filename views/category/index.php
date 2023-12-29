<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\ContactForm $model */

use yii\bootstrap5\Html;

$this->title = Yii::t('app', 'Категорії');
$this->params['breadcrumbs'][] = $this->title;
$lang = Yii::$app->language;    //текущий язык

?>

<div class="page-category">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <? foreach ($cats as $item) { ?>
                <div class="col-lg-3">
                    <div class="card m-2 p-2">
                        <div class="text-center">
                            <img src="/images/<?= $item->lang->image ?>" class="card-img-top" alt="<?= $item->lang->title ?>" style="max-width: 128px">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?= $item->lang->title ?></h5>
                            <p class="card-text"><?= mb_strimwidth($item->lang->description, 0, 100) ?>.</p>
                            <p class="text-end">
                                <a href="<?= '/' . $lang . '/category/' . $item->url ?>" class="btn btn-primary">Перейти</a>
                            </p>
                        </div>
                    </div>
                </div>
        <? } ?>
    </div><!--row end-->
</div>
