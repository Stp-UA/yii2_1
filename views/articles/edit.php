<?php

use yii\bootstrap5\Html;

/** @var yii\web\View $this */
/** @var app\models\articles $article */

$this->title = Yii::t('app', 'Редагування статті');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Статті'), 'url' => ['/articles']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="page-articles">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-lg-12">
            <?= $this->render('_form', [
                'buttonName' => Yii::t('app', 'Зберегти'),
                'article' => $article
            ]) ?>
        </div>
    </div><!--row end-->
</div>
