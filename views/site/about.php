<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        This is the About page. You may modify the following file to customize its content:
    </p>
    <code><?= __FILE__ ?></code>
    <br><br>
    <? if (!$isGuest): ?>
            <h2><?= $data ?></h2>
    <? else: ?>
            <p>Хочешь доп инфу? Войди на сайт <a role="button" class="btn btn-primary" href="/login">Login</a></p>
    <? endif; ?>
</div>
