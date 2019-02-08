<?php
    use yii\helpers\Url;
    use yii\helpers\Html;
?>
<section class="category">
    <div class="container">
        <div class="row">
            <div class="col-md-8 text-left">
                <div class="line"></div>
                <div class="row">
                        <article class="col-md-12 article-list">
                        <div class="inner">
                            <figure>
                                <a href="#">
                                    <img src="/images/product/<?= $product->image ?>">
                                </a>
                            </figure>
                            <div class="details">
                                <h1><a href="single.html"><?= $product->name ?></a></h1>
                                <p>
                                    <?php echo $product->title ?>
                                </p>
                                <footer>
                                    <a href="#" class="love"><i class="ion-android-favorite-outline"></i> <div><?= $product->like ?></div></a>
                                    <input type="hidden" name="hidden_name" id="name<?= $value->id ?>" value="<?= $product->name ?>">
                                    <input type="hidden" name="hidden_price" id="price<?= $value->id ?>" value="<?= $product->price?>">
                                    <input type="hidden" name="image_hidden" id="image<?= $value->id ?>" value="<?= $product->image ?>">
                                    <input type="button" class="btn add_cart_btn" value="Savatchaga qo'shish" id="<?= $product->id ?>">
                                </footer>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
            <div class="col-md-4 sidebar">
                <aside>
                    <div class="aside-body">
                        <figure class="ads">
                            <h4><?= $product->name ?></h4>
                        </figure>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Texnik imkoniyatlari</a></li>
                <li><a data-toggle="tab" href="#menu1">Mahsulot haqida</a></li>
                <li><a data-toggle="tab" href="#menu2">Sharhlar</a></li>
            </ul>
            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <?= $product->description ?>
                </div>
                <div id="menu1" class="tab-pane fade">
                    <h3>Menu 1</h3>
                    <p>Some content in menu 1.</p>
                </div>
                <div id="menu2" class="tab-pane fade">
                    <h3>Menu 2</h3>
                    <p>Some content in menu 2.</p>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</section>