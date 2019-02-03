<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Category;
use dosamigos\tinymce\TinyMce;

?>

<div class="product-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="row">
        <div class="col-md-6 col-xs-12">
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
            <?= $form->field($model, 'number')->textInput() ?>
        </div>
        <div class="col-md-6 col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">Narxlar</div>
                <div class="panel-body">
                    <?= $form->field($model, 'price')->textInput() ?>
                    <?= $form->field($model, 'price_last')->textInput() ?>
                    <?= $form->field($model, 'price_percent')->textInput() ?>
                    <?= $form->field($model, 'together')->textInput() ?>
                </div>
            </div>
        </div>
    </div>


    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'description')->widget(TinyMce::className(), [
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

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
