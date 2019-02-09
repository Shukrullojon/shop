<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;
use yii\helpers\Url;
?>
<div style="margin-top: 100px"></div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-9">
            <div class="client-form">
                <?php $form = ActiveForm::begin(); ?>
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'pay')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <?= $form->field($model, 'address')->widget(TinyMce::className(), [
                    'options' => ['rows' => 6],
                    'language' => 'es',
                    'clientOptions' => [
                        'plugins' => [
                            "advlist autolink lists link charmap print preview anchor",
                            "searchreplace visualblocks code fullscreen",
                            "insertdatetime media table contextmenu paste"
                        ],
                        'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
                    ]
                ]);?>
                <?= Html::submitButton('Xarid qilish', ['class' => 'btn btn-info form-control']) ?>
            <?php ActiveForm::end(); ?>

            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <p style="text-align: center; font-size: 20px">Buyurtmalar ro'yxati</p>
                </div>
                <div class="panel-body">
                    <?php
                        session_start();
                        $total=0;
                        $summa=0;
                        foreach($_SESSION['shopping_cart'] as $item => $value){
                            $summa += $value['product_quantity']*$value['product_price'];
                            $total += $value['product_quantity'];
                    ?>
                        <article class="article-mini">
                            <div class="inner">
                                <figure>
                                    <a href="<?= Url::to(['site/product','id'=>$value['product_id']]) ?>">
                                        <img src="/images/product/<?= $value['product_image'] ?>" alt="Sample Article">
                                    </a>
                                </figure>
                                <div class="padding">
                                    <p style="margin-top: 15px; margin-bottom: 0px"><a href="<?= Url::to(['site/product','id'=>$value['product_id']]) ?>"><?= $value['product_name'] ?></a></p>
                                    <p style="margin: 0px 0px">Soni: <?= $value['product_quantity'] ?></p>
                                    <p style="margin: 0px 0px">Narxi: <?= $value['product_price']*$value['product_quantity'] ?></p>
                                </div>
                            </div>
                        </article>
                    <?php } ?>
                </div>
                <div class="panel-footer">
                    <p>Buyurtmalar soni: <?php echo $total ?></p>
                    <p>Jami: <?php echo number_format($summa) ?></p>
                    <div class="form-group">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
