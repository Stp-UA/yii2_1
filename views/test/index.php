<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'My test page';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="test-page">
    <h1><?= Html::encode($this->title) ?></h1>

    <p><?= $text ?></p>
</div>
