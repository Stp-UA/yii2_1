<?php

/** @var yii\web\View $this */

use yii\bootstrap5\Html;

$this->title = Yii::t('app', 'Статті');
$this->params['breadcrumbs'][] = $this->title;
$lang = Yii::$app->language;

?>

<div class="page-articles">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-lg-12">
            <ul>
                <? foreach ($articles as $item) { ?>
                        <li class="mb-3">
                            <?= date('Y/m/d H:i', $item->created_at) ?><br>
                            <a href="<?= '/' . $lang . '/articles/view/' . $item->url ?>"><?= $item->title ?></a><br>
                            (updated: <?= date('Y/m/d H:i:s', $item->updated_at) ?>) <br>
                            <a href="<?= '/' . $lang . '/articles/edit/' . $item->url ?>"><?= Yii::t('app', 'Редагувати') ?></a>
                        </li>
                <? } ?>
            </ul>
        </div>
    </div><!--row end-->
    <div>
        <h4><a href="<?= '/' . $lang . '/articles/create' ?>"><?= Yii::t('app', 'Додати нову статтю') ?></a></h4>
</div>
</div>
