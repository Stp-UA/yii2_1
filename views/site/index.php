<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
$lang = Yii::$app->language;    //текущий язык
?>
<div class="site-index">
    <div class="row">
        <ul>
            <? foreach ($cats as $item) { ?>
                        <a href="/category/<?= $item->url ?>"><li><h5 class="card-title"><?= $item->lang->title ?></h5></li></a>
            <? } ?>
        </ul>
    </div><!--row end-->
</div>
