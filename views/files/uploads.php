<?php

/** @var yii\web\View $this */

use yii\bootstrap5\Html;
use yii\widgets\ActiveForm;


$this->title = 'Upload';


?>
<div class="uploads-files">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-lg-12">
            <?php $form = ActiveForm::begin(
                [
                    'options' => ['enctype' => 'multipart/form-data'],
                    'id' => 'upload-attachment',
                ]
            ) ?>
            <?= $form->field($model, 'file')->fileInput(); ?>
            <div class="form-group mb-3">
                <label class="btn btn-primary">
                    Загрузить файл
                    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-default', 'style' => 'display:none']) ?>
                </label>
            </div>
            <?php ActiveForm::end(); ?>

        </div>

    </div><!--row end-->
</div>
