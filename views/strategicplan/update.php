<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Strategicplan */

$this->title = 'Update Strategic Plan: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Strategicplans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Update', 'url' => ['update', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
$model->start_year = date('Y-m-d',$model->start_year);
$model->end_year = date('Y-m-d',$model->end_year);
?>
<div class="strategicplan-update">

    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h3><?= Html::encode($this->title) ?></h3>
            </div>
        </div>
        <div class="card-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>del' => $model,
    ]) ?>

</div>
