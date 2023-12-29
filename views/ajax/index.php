<?php

/** @var yii\web\View $this */

use yii\bootstrap5\Html;

$this->title = 'Example Ajax';
$this->registerJsFile("@web/javascripts/ajax.js");
?>

<div class="">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-lg-12">
            <button class="send-ajax">Push</button>
        </div>
    </div><!--row end-->
</div>
