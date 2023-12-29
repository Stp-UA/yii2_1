<?php

/** @var yii\web\View $this */

/** @var string $content */

use app\assets\AppAsset;
use yii\bootstrap5\Html;

$this->registerCssFile("@web/css/template_02.css");
// $this->registerJsFile("@web/javascripts/myscript.js");
$this->registerJsFile('@web/javascript/myscript.js', ['depends' => [\yii\bootstrap5\BootstrapPluginAsset::class]]);


//AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<header>
    мой заголовок
</header>

<div>
    <?= $content ?>
</div>

<footer>
    Мой футер
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
