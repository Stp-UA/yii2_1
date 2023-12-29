<?php

/** @var yii\web\View $this */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'New password';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="">
    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-lg-12">
            <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>
            <?= $form->field($model, 'password')->passwordInput(['autofocus' => true])->label('Password') ?>
            <?= $form->field($model, 'password_repeat')->passwordInput()->label('Repeat Password') ?>
            <div class="form-group mb-3">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-primary', 'name' => 'save-password-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
