<?php

/** @var yii\web\View $this */

use yii\bootstrap5\Html;
use yii\widgets\ActiveForm;


$this->title = 'Upload';


?>
<div class="uploads-files">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <? foreach ($images as $item) { ?>
                <div class="col-lg-3">
                    <div class="card m-2 p-2">
                        <div class="text-center">
                            <img src="/uploads/<?= $item->filename ?>" class="card-img-top" style="max-width: 128px">
                            <p><?= $item->filename ?></p>
                            <p><?= $item->extension ?></p>
                        </div>
                    </div>
                </div>
        <? } ?>
    </div><!--row end-->
</div>
