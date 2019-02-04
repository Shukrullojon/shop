<?php
    use yii\helpers\Html;
    use yii\helpers\Url;
?>
<section class="category">
    <div class="container">
        <div class="row">
            <div class="col-md-8 text-left">
                <div class="row">
                    <div class="col-md-12">
                        <ol class="breadcrumb">
                            <li><a href="<?= Url::home() ?>">Bosh saxifa</a></li>
                            <li class="active">Kategoriya</li>
                        </ol>
                        <h1 class="page-title">Kategoriya: <?php echo $categorys['name'] ?></h1>
                    </div>
                </div>
                <div class="line"></div>
                <div class="row">
                    <?php if(count($category)){ ?>
                    <?php foreach($category as $item=>$value):?>
                    <article class="col-md-12 article-list">
                        <div class="inner">
                            <figure>
                                <a href="<?= Url::to(['site/product','id'=>$value['id']]) ?>">
                                    <img src="/images/product/<?= $value['image'] ?>">
                                </a>
                            </figure>
                            <div class="details">
                                <h1><a href="single.html"><?= $value['name'] ?></a></h1>
                                <p>
                                    <?= $value['title'] ?>
                                </p>
                                <footer>
                                    <a href="#" class="love"><i class="ion-android-favorite-outline"></i><div><?= $value['like'] ?></div></a>
                                    <a class="btn btn-primary more" href="single.html">
                                        <div>Savatchaga qo'shish</div>
                                        <div><i class="ion-ios-arrow-thin-right"></i></div>
                                    </a>
                                </footer>
                            </div>
                        </div>
                    </article>
                    <?php endforeach; ?>
                    <?php }else{
                        echo "<h5>Kategoriya bo'yich topilmadi</h5>";
                    } ?>
                </div>
            </div>
            <div class="col-md-4 sidebar">
                <aside>
                    <h1 class="aside-title">Ko'p tanlanganlar</h1>
                    <div class="aside-body">
                        <?php foreach($bestpro as $item=>$value){ ?>
                        <article class="article-mini">
                            <div class="inner">
                                <figure>
                                    <a href="single.html">
                                        <img src="/images/product/<?= $value['image'] ?>">
                                    </a>
                                </figure>
                                <div class="padding">
                                    <h1><a href="single.html"><?= $value['name'] ?></a></h1>
                                    <num><?= $value['count_view'] ?></num> || <num><?= $value['price'] ?> ming</num><br>
                                    <a href="single.html">
                                        Savatchaga qo'shish
                                    </a>
                                </div>
                            </div>
                        </article>
                        <?php } ?>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>