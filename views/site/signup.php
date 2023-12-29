<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

use yii\bootstrap5\ActiveForm;

$this->title = 'Регістрація';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card p-5 mb-3 mt-5">
    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin([
        'id' => 'form-signup',
    ]); ?>
    <?= $form->field($model, 'email')->textInput(['autofocus' => true])->label('Email') ?>
    <?= $form->field($model, 'password')->passwordInput()->label('Password') ?>
    <?= $form->field($model, 'password_repeat')->passwordInput()->label('Repeat Password') ?>

    <div class="form-group mb-3">
        <div class="text-center">
            <?= Html::submitButton('Регистрация', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>