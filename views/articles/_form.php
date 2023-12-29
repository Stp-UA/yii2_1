<?php
use yii\bootstrap5\Html;
use yii\widgets\ActiveForm;

?>

<?php $form = ActiveForm::begin(['id' => 'edit-field', 'method' => 'POST']); ?>
<?= $form->field($article, 'title')->input(['autofocus' => true])->textInput()->label(Yii::t('app', 'Заголовок')) ?>
<?= $form->field($article, 'url')->label(Yii::t('app', 'URL статті')) ?>
<?= $form->field($article, 'text')->label(Yii::t('app', 'Вміст статті'))->textarea() ?>

<div class="form-group mb-3">
    <div class="text-center">
        <?= Html::submitButton($buttonName, ['class' => 'btn btn-success', 'name' => 'save-update']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>
