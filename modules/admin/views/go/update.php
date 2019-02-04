<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Go */

$this->title = 'Update Go: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Gos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="go-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
