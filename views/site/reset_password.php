<?php

/** @var yii\web\View $this */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Reset password';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin([
        'id' => 'request-password-reset-form',
    ]);
    ?>
    <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>
    <div class="form-group mb-3">
        <div class="text-center">
            <?= Html::submitButton('Reset pass', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
