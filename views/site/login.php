<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= Html::encode($this->title) ?></h1>
<section class="login first grey">
    <div class="container">
        <div class="box-wrapper">
            <div class="box box-border">
                <div class="box-body">
                    <h4>Login</h4>
                    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                        <?= $form->field($model, 'username') ?>
                        <?= $form->field($model, 'password')->passwordInput() ?>
                        <?= $form->field($model, 'rememberMe')->checkbox() ?>
                        <div style="color:#999;margin:1em 0">
                            If you forgot your password you can <?= Html::a('reset it', ['user/request-password-reset']) ?>.
                            For new user you can <?= Html::a('signup', ['user/signup']) ?>.
                        </div>
                        <div class="form-group">
                            <?= Html::submitButton(Yii::t('rbac-admin', 'Login'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</section>