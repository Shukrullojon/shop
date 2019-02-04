<?php

use yii\helpers\Html;
use app\assets\AdminAsset;
use yii\helpers\Url;

AdminAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?= Url::to(['default/index']) ?>">Bosh Saxifa</a>
        </div>
        <ul class="nav navbar-nav">
            <?php  ?>
            <li><a href="<?= Url::to(['product/index']) ?>">Mahsulotlar</a></li>
            <li><a href="<?= Url::to(['product-pagination/index']) ?>">Karusel</a></li>
            <li><a href="<?= Url::to(['category/index']) ?>">Kategoriyalar</a></li>
            <li><a href="<?= Url::to(['go/index']) ?>">Yetqazib berish</a></li>
            <li><a href="<?= Url::to(['help/index']) ?>">Yordam</a></li>
        </ul>
    </div>
</nav>

<div style="margin: 10px 10px">
    <?= $content ?>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
