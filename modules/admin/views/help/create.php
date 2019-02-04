<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Help */

$this->title = 'Qo\'shish';
$this->params['breadcrumbs'][] = ['label' => 'Helps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="help-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
