<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Go */

$this->title = 'Qo\'shish';
$this->params['breadcrumbs'][] = ['label' => 'Gos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="go-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
