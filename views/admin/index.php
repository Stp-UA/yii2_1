<?php

/** @var yii\web\View $this */

use yii\bootstrap5\Html;

$this->title = $isAdmin ? Yii::t('app', 'Адмін') : Yii::t('app', 'Користувач');
$this->params['breadcrumbs'][] = $this->title;
$lang = Yii::$app->language;

?>
<div class="page-articles">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-lg-12">
            <? if ($isAdmin): ?>
                    h2>Admin information</h2>
                    <p><?= $dataAdm ?></p>
                    <br>
                    <a href="<?= '/' . $lang . '/articles/edit/' ?>">Редактирование статей</a>
            <? endif; ?>
            <? if (!$isAdmin): ?>
                    <h2>User information</h2>
                    <p><?= $dataUser ?></p>
            <? endif; ?>
        </div>
    </div><!--row end-->
</div>