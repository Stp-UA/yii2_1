<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'My page';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-page">
    <h1><?= Html::encode($this->title) ?></h1>
    <img src="https://cdn2.iconfinder.com/data/icons/cat-power/256/cat_box.png" alt="">
</div>
