<?php

/** @var yii\web\View $this */

require_once(Yii::getAlias('@common') . '\func\myFunctions.php');

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
                            <?= date('Y/m/d H:i', $item->updated_at) ?><br>
                            <h4><a href="<?= '/' . $lang . '/articles/view/' . $item->url ?>"><?= $item->lang->title ?></a></h4>
                            <p><?= truncate($item->lang->text, 300) ?></p>
                        </li>
                <? } ?>
            </ul>
        </div>
    </div><!--row end-->
    <div>
</div>
</div>
