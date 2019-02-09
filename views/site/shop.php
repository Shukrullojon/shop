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
                                <input type="number" product_id="<?= $value['product_id'] ?>" id="quantity<?= $value['product_id'] ?>" value="<?= number_format(abs($value['product_quantity'])) ?>" class="form-control quantity" style="width: 30%" min="1">
                            </td>
                            <td>
                                <?= number_format($value['product_price']*$value['product_quantity']) ?>
                            </td>
                            <td>
                                <a href="<?= Url::to(['site/delete','id'=>$value['product_id']]) ?>"><i class="icon ion-android-delete" style="font-size: 25px"></i></a>
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
                        <th><?php if($total != '') echo number_format($total) ?></th>
                    </tr>
                    <tr>
                        <th>
                            <a href="<?= Url::to(['client/create']) ?>" class="btn btn-success">Rasmiylashtirish</a>
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
     $(document).on("keyup",".quantity",function(){
        var product_id=$(this).attr("product_id");
        var quantity=$(this).val();
        //var action="quantity_change";
        $.ajax({
            url:"/index.php/site/change",
            method:"GET",
            data:
            {
                product_id:product_id,
                quantity:quantity,
            },  
            dataType:"json",
            success:function(data){
                $("#shop_result").html(data.output);
            }
        })
    });
    
    $(document).on("keyup",".quantity",function(){
        var quantity=$(this).val();
        if(quantity < 1){
            $(this).val(1);
            alert("Mahsulotni soni 0 bolishi mumkun emas, yoki o'chiring");
        }
    })

    $(document).on("change",".quantity",function(){
        var product_id=$(this).attr("product_id");
        var quantity=$(this).val();
        //var action="quantity_change";
        $.ajax({
            url:"/index.php/site/change",
            method:"GET",
            data:
            {
                product_id:product_id,
                quantity:quantity,
            },  
            dataType:"json",
            success:function(data){
                $("#shop_result").html(data.output);
            }
        })
    })
JS;
$this->registerJs($script);
?>