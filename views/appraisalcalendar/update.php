<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Appraisalcalendar */

$this->title = 'Update Appraisal Calendar: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Appraisalcalendars', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';

$model->yearstart = date('Y-m-d',$model->yearstart);
$model->yearend = date('Y-m-d',$model->yearend);
$model->mid_year_start = date('Y-m-d',$model->mid_year_start);
$model->mid_year_end = date('Y-m-d',$model->mid_year_end);
$model->end_year_start = date('Y-m-d',$model->end_year_start);
$model->end_year_end = date('Y-m-d',$model->end_year_end);
?>
<div class="appraisalcalendar-update">

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
    </div>

</div>
