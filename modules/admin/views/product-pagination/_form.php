<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Category;

?>

<div class="product-pagination-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <?php
    $cat=Category::find()->asArray()->all();
    $c=Category::find()->asArray()->all();
    $p=[];
    foreach($cat as $item=>$value)
    {
        $bool=1;
        foreach($c as $val){
            if($value['id']==$val['part']){
                $bool=0;
            }
        }
        if($bool){
            $p[$item]['name']=$value['name'];
            $p[$item]['id']=$value['id'];
        }
    }
    ?>
    <?= $form->field($model, 'category_id')->dropDownList(
        \yii\helpers\ArrayHelper::map($p,'id','name')
    ) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
