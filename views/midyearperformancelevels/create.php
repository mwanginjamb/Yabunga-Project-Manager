<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Midyearperformancelevels */

$this->title = 'Create Midyearperformancelevels';
$this->params['breadcrumbs'][] = ['label' => 'Midyearperformancelevels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="midyearperformancelevels-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
