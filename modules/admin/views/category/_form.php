<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Category;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'icon')->textInput(['maxlength' => true]) ?>
    <?php
        $cat=Category::find()->asArray()->all();
        $p=[];
        foreach($cat as $item=>$value)
        {
            $p[$item]['id']=$value['id'];
            $p[$item]['name']=$value['name'];
        }
    ?>

    <?= $form->field($model, 'part')->dropDownList(
            ArrayHelper::map(Category::find()->all(),'id','name'),
            [
                    'prompt'=>'Kategoriyani tanlang',
            ]
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
