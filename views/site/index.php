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
                                                <input type="hidden" name="hidden_name" id="name<?= $value['id'] ?>" value="<?= $value['name'] ?>">
                                                <input type="hidden" name="hidden_price" id="price<?= $value['id'] ?>" value="<?= $value['price']?>">
                                                <input type="hidden" name="image_hidden" id="image<?= $value['id'] ?>" value="<?= $value['image'] ?>">
                                                <input type="button" class="btn add_cart_btn" value="Savatchaga qo'shish" id="<?= $value['id'] ?>">
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
                                    <input type="hidden" name="hidden_name" id="name<?= $value['id'] ?>" value="<?= $value['name'] ?>">
                                    <input type="hidden" name="hidden_price" id="price<?= $value['id'] ?>" value="<?= $value['price']?>">
                                    <input type="hidden" name="image_hidden" id="image<?= $value['id'] ?>" value="<?= $value['image'] ?>">
                                    <input type="button" class="btn add_cart_btn" value="Savatchaga qo'shish" id="<?= $value['id'] ?>">

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
                                    <input type="hidden" name="hidden_name" id="name<?= $value['id'] ?>" value="<?= $value['name'] ?>">
                                    <input type="hidden" name="hidden_price" id="price<?= $value['id'] ?>" value="<?= $value['price']?>">
                                    <input type="hidden" name="image_hidden" id="image<?= $value['id'] ?>" value="<?= $value['image'] ?>">
                                    <input type="button" class="btn btn-primary more add_cart_btn" value="Savatchaga qo'shish" id="<?= $value['id'] ?>">
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
    $(document).on("click",".add_cart_btn",function(){
        var product_id=$(this).attr("id");
        var product_name=$("#name"+product_id).val();
        var product_price=$("#price"+product_id).val();
        var product_image=$("#image"+product_id).val();
        var action="create";
        $.ajax({
            url:"index.php/site/cart",
            method:"GET",
            data:
            {
              product_id:product_id,
              product_name:product_name,
              product_price:product_price,
              product_image:product_image,
              action:action,  
            },
            dataType:"json",
            success:function(data){
              $("#cart_count").text(data.count);
              $("#cart_result").html(data.output);
            }           
        });
    })
    $(document).on("click",".delete_cart",function(){
        var del=$(this).attr("id");
        var action="delete";
        $.ajax({
            url:"index.php/site/cart",
            method:"GET",
            data:
            {
                del:del,
                action:action,
            },
            dataType:"json",
            success:function(data){
              $("#cart_count").text(data.count);
              $("#cart_result").html(data.output);
            }
        });
    })
JS;
$this->registerJs($script);
?>