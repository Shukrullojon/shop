<?php
    use yii\helpers\Url;
    use yii\helpers\html;
?>

<section class="home" style="padding-top: 0px">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="owl-carousel owl-theme slide" id="featured">
                    <?php if(count($carousel)): ?>
                        <?php foreach($carousel as $item=>$value): ?>
                            <div class="item">
                                <article class="featured">
                                    <figure>
                                        <img src="images/pro_pagination/<?= $value['image'] ?>" alt="Sample Article">
                                    </figure>
                                    <div class="details">
                                        <div class="category"><a href="category.html">Computer</a></div>
                                        <h1><a href="single.html"><?= $value['name'] ?></a></h1>
                                    </div>
                                </article>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div class="line">
                    <div>So'ngi mahsulotlar</div>
                </div>
                <div class="row">
                    <?php if(count($product)): ?>
                        <?php foreach($product as $item=>$value):?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <article class="article col-md-12">
                                    <div class="inner">
                                        <figure>
                                            <a href="<?= Url::to(['site/product','id'=>$value['id']]) ?>">
                                                <img src="images/product/<?= $value['image'] ?>" alt="Sample Article">
                                            </a>
                                        </figure>
                                        <div class="padding">
                                            <h2><a href="<?= Url::to(['site/product','id'=>$value['id']]) ?>"><?= $value['name'] ?></a></h2>
                                            <p><?= $value['price'] ?> ming</p>
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
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div class="banner">
                    <a href="#">
                        <img src="images/ads.png" alt="Sample Article">
                    </a>
                </div>
                <div class="line transparent little"></div>

            </div>
            <div class="col-xs-6 col-md-4 sidebar" id="sidebar">
                <div class="sidebar-title for-tablet">Sidebar</div>
                <aside>
                    <h1 class="aside-title">Ko'p tanlanganlar <a href="#" class="all">Barchasi <i class="ion-ios-arrow-right"></i></a></h1>
                    <div class="aside-body">
                        <?php if(count($bestpro)): ?>
                            <?php foreach($bestpro as $item=>$value): ?>
                                <article class="article-mini">
                            <div class="inner">
                                <figure>
                                    <a href="<?= Url::to(['site/product','id'=>$value['id']]) ?>">
                                        <img src="images/product/<?= $value['image'] ?>" alt="Sample Article">
                                    </a>
                                </figure>
                                <div class="padding">
                                    <h1><a href="<?= Url::to(['site/product','id'=>$value['id']]) ?>"><?= $value['name'] ?></a></h1>
                                    <num><?= $value['count_view'] ?></num> || <num><?= $value['price'] ?> ming</num><br>
                                    <a href="single.html">
                                        Savatchaga qo'shish
                                    </a>
                                </div>
                            </div>
                        </article>
                            <?php endforeach;?>
                        <?php endif;?>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <h1 style="font-size: 25px"><div class="text">Tavsiya etamiz</div></h1>
    <div class="row">
        <?php if(count($pro)):?>
            <?php foreach($pro as $item=>$value): ?>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <article class="article col-md-12">
                        <div class="inner">
                            <figure>
                                <a href="<?=Url::to(['site/product','id'=>$value['id']])?>" style="padding: 0px 0px">
                                    <img src="images/product/<?= $value['image'] ?>" class="img-responsive" alt="Sample Article" >
                                </a>
                            </figure>
                            <div class="padding">
                                <h2 style="font-size: 15px"><a href="<?= Url::to(['site/product','id'=>$value['id']]) ?>"><?= $value['name'] ?></a></h2>
                                <footer>
                                    <a href="#" class="love"><i class="ion-android-favorite-outline"></i> <div><?= $value['count_view'] ?></div></a>
                                    <a class="btn btn-primary more" href="single.html">
                                        <div>Savatchaga qo'shish</div>
                                        <div><i class="ion-ios-arrow-thin-right"></i></div>
                                    </a>
                                </footer>
                            </div>
                        </div>
                    </article>
                </div>
            <?php endforeach;?>
        <?php endif; ?>
    </div>
</div>
<?php
$script =<<< JS
    $(document).on("keyup","#search",function(){
        var a = $(this).val();
        $.ajax({
            url:"index.php/site/search",
            method:"GET",
            data:{search:a},
            dataType:"json",
            success:function(data){
              $("#result").html(data.data);
            }
        })
    })
JS;
$this->registerJs($script);
?>