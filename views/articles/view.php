<?php

/** @var yii\web\View $this */
/** @var app\models\articles $article */

require_once(Yii::getAlias('@common') . '\func\myFunctions.php');

use yii\bootstrap5\Html;

$title = $article->lang->title;
$this->title = truncate($title, 30);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Статті'), 'url' => ['/articles']];
$this->params['breadcrumbs'][] = $this->title;

$lang = Yii::$app->language;

?>

<div class="page-single-category">
    <div class="row">
        <div class="col-lg-12">
            <h1 style="font-size: 2rem;" class="mb-3">
                <?= Html::encode($title) ?>
            </h1>
            <? if ($img) { ?>
                    <? foreach ($img as $item) { ?>
                            <div><img src="<?= '/uploads/' . $item->filename ?>" style="max-width: 500px"></div>
                    <? } ?>
            <? } ?>
            <div>
                <p><?= $article->lang->text ?></p>
            </div>
        </div>
    </div>
</div>
