<?php
    $session = Yii::$app->session;
    echo "<pre>";
    print_r($_SESSION['shopping_cart']);
    $session=Yii::$app->session->destroy();
    die();
    if(count($help)){
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-12">
                <?php foreach($help as $item=>$value){ ?>
                    <div class="panel panel-success" style="margin-bottom:0px">
                        <div class="panel-heading">
                        </div>
                        <div class="panel-body">
                            <h5 style="color: red;">
                                <?= $value['title'] ?>
                            </h5>
                            <p>
                                <?= $value['description'] ?>
                            </p>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="col-md-3 col-sm-12"></div>
        </div>
    </div>
</section>
<?php }else{
        echo "Malumot topilmadi";
    } ?>