<?php
    session_start();
    use yii\helpers\Url;
    use yii\helpers\Html;
?>
<section>
    <div class="container-fluid">
        <div class="row" id="shop_result">
            <div class="col-md-9">
                <table class="table table-hover">
                    <tr>
                        <th>Mahsulot</th>
                        <th>Summa</th>
                        <th>Soni</th>
                        <th>Jami</th>
                        <th>Action</th>
                    </tr>
                    <?php
                        $number='';
                        $total='';
                        foreach($_SESSION['shopping_cart'] as $item=>$value):
                            $number += $value['product_quantity'];
                            $total += $value['product_quantity']*$value['product_price'];
                    ?>
                        <tr>
                            <td>
                                <img src="/images/product/<?= $value['product_image'] ?>" style="height: 70px; width: 70px">
                                <p style="display: inline-block"><?= $value['product_name'] ?></p>
                            </td>
                            <td>
                                <?= number_format($value['product_price']) ?>
                            </td>
                            <td>
                                <?= number_format($value['product_quantity']) ?>
                            </td>
                            <td>
                                <?= number_format($value['product_price']*$value['product_quantity']) ?>
                            </td>
                            <td>
                                <button id="<?= $value['product_id'] ?>" class="product_delete btn btn-danger"><i class="icon ion-android-delete"></i></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <div class="col-md-3">
                <table class="table table-bordered">
                    <tr>
                        <th>Jami</th>
                        <th></th>
                    </tr>
                    <tr>
                        <th>Mahsulot soni</th>
                        <th><?= $number ?></th>
                    </tr>
                    <tr>
                        <th>Narxi</th>
                        <th><?= number_format($total) ?></th>
                    </tr>
                    <tr>
                        <th>
                            <a href="<?= Url::to(['site/checkout']) ?>" class="btn btn-success">Rasmiylashtirish</a>
                        </th>
                        <th></th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</section>
<?php
$script=<<< JS
    $(document).on("click",".product_delete",function(){
        var del=$(this).attr("id");
        var action="delete";
        $.ajax({
            url:"index.php/site/del",
            method:"GET",
            data:
            {
                action:action,
                del:del,
            },
            dataType:"text",
            success:function(data){
              $("#cart_count").text(data.count);
              $("#shop_result").html(data.output);
            }

        })
    })
JS;
$this->registerJs($script);
?>