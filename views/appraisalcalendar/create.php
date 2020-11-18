<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Appraisalcalendar */

$this->title = 'Create Appraisal Calendar';
$this->params['breadcrumbs'][] = ['label' => 'Appraisalcalendars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="appraisalcalendar-create">

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
