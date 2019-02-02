<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
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

<header class="primary">
    <div class="firstbar" style="padding: 0px">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12">
                    <div class="brand">
                        <a href="index.html">
                            <img src="images/logo.png" alt="Magz Logo">
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <form class="search" autocomplete="off">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" name="q" class="form-control" placeholder="qidiruv">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary"><i class="ion-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-3 col-sm-12 text-right">
                    <ul class="nav-icons">
                        <li><a href="register.html"><i class="ion-person"></i><div>Kabinet</div></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Start nav -->
    <nav class="menu">
        <div class="container">
            <div class="brand">
                <a href="#">
                    <img src="images/logo.png" alt="Magz Logo">
                </a>
            </div>
            <div class="mobile-toggle">
                <a href="#" data-toggle="menu" data-target="#menu-list"><i class="ion-navicon-round"></i></a>
            </div>
            <div class="mobile-toggle">
                <a href="#" data-toggle="sidebar" data-target="#sidebar"><i class="ion-ios-arrow-left"></i></a>
            </div>
            <div id="menu-list">
                <ul class="nav-list">
                    <li class="for-tablet nav-title"><a>Menu</a></li>
                    <li class="for-tablet"><a href="login.html">Login</a></li>
                    <li class="for-tablet"><a href="register.html">Register</a></li>
                    <li><a href="category.html">Bosh saxifa</a></li>
                    <li class="dropdown magz-dropdown">
                        <a href="category.html">Kategoriyalar<i class="ion-ios-arrow-right"></i></a>
                        <ul class="dropdown-menu">
                            <?= \app\components\MenuWidget::widget(['tpl'=>'menu']) ?>
                        </ul>
                    </li>
                    <li class="dropdown magz-dropdown"><a href="#">Chegirmalar <i class="ion-ios-arrow-right"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="category.html">Foizli</a></li>
                            <li><a href="category.html">Birgalikda</a></li>
                        </ul>
                    </li>
                    <li class="dropdown magz-dropdown magz-dropdown-megamenu"><a href="#">Bo'limlar <i class="ion-ios-arrow-right"></i></a>
                        <div class="dropdown-menu megamenu">
                            <div class="megamenu-inner">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2 class="megamenu-title">Trending</h2>
                                            </div>
                                        </div>
                                        <ul class="vertical-menu">
                                            <li><a href="#"><i class="ion-ios-circle-outline"></i> Mega menu is a new feature</a></li>
                                            <li><a href="#"><i class="ion-ios-circle-outline"></i> This is an example</a></li>
                                            <li><a href="#"><i class="ion-ios-circle-outline"></i> For a submenu item</a></li>
                                            <li><a href="#"><i class="ion-ios-circle-outline"></i> You can add</a></li>
                                            <li><a href="#"><i class="ion-ios-circle-outline"></i> Your own items</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <h2 class="megamenu-title">So'ngi mahsulotlar</h2>
                                            </div>
                                            <div class="col-md-4">
                                                <h2 class="megamenu-title">Ko'p tanlanganlar</h2>
                                            </div>
                                            <div class="col-md-4">
                                                <h2 class="megamenu-title">Chegirmalar</h2>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <article class="article col-md-4 mini">
                                                <div class="inner">
                                                    <figure>
                                                        <a href="single.html">
                                                            <img src="images/news/img10.jpg" alt="Sample Article">
                                                        </a>
                                                    </figure>
                                                    <div class="padding">
                                                        <div class="detail">
                                                            <div class="time">December 10, 2016</div>
                                                            <div class="category"><a href="category.html">Healthy</a></div>
                                                        </div>
                                                        <h2><a href="single.html">Duis aute irure dolor in reprehenderit in voluptate</a></h2>
                                                    </div>
                                                </div>
                                            </article>
                                            <article class="article col-md-4 mini">
                                                <div class="inner">
                                                    <figure>
                                                        <a href="single.html">
                                                            <img src="images/news/img11.jpg" alt="Sample Article">
                                                        </a>
                                                    </figure>
                                                    <div class="padding">
                                                        <div class="detail">
                                                            <div class="time">December 13, 2016</div>
                                                            <div class="category"><a href="category.html">Lifestyle</a></div>
                                                        </div>
                                                        <h2><a href="single.html">Duis aute irure dolor in reprehenderit in voluptate</a></h2>
                                                    </div>
                                                </div>
                                            </article>
                                            <article class="article col-md-4 mini">
                                                <div class="inner">
                                                    <figure>
                                                        <a href="single.html">
                                                            <img src="images/news/img14.jpg" alt="Sample Article">
                                                        </a>
                                                    </figure>
                                                    <div class="padding">
                                                        <div class="detail">
                                                            <div class="time">December 14, 2016</div>
                                                            <div class="category"><a href="category.html">Travel</a></div>
                                                        </div>
                                                        <h2><a href="single.html">Duis aute irure dolor in reprehenderit in voluptate</a></h2>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown magz-dropdown"><a href="#">Foydalanish <i class="ion-ios-arrow-right"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><i class="icon ion-card "></i>Tetkazib berish</a></li>
                            <li><a href="#"><i class="icon ion-help-circled"></i>Yordam</a></li>
                            <li><a href="#"><i class="icon ion-person"></i>Kabinet</a></li>
                            <li><a href="#"><i class="icon ion-chatbox"></i> Kamentariyalar</a></li>
                            <li><a href="#"><i class="icon ion-log-out"></i> Chiqish</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End nav -->
</header>

<?= $content ?>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="block">
                    <h1 class="block-title">Mypro.uz haqida</h1>
                    <div class="block-body">
                        <figure class="foot-logo">
                            <img src="images/logo-light.png" class="img-responsive" alt="Logo">
                        </figure>
                        <p class="brand-description">
                            Online Magazin
                        </p>
                        <a href="page.html" class="btn btn-magz white">Biz haqimizda <i class="ion-ios-arrow-thin-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="copyright">
                    COPYRIGHT &copy; MAGZ 2019. Barcha huquqlar himoyalangan.
                </div>
            </div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
