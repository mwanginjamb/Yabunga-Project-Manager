<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Initializedappraisals */

$this->title = 'Initialize an Appraisal';
$this->params['breadcrumbs'][] = ['label' => 'Initialized Appraisals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Initialize An Appraisal', 'url' => ['create']];
?>
<div class="initializedappraisals-create">


    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h3><?= Html::encode($this->title) ?></h3>
            </div>
        </div>
        <div class="card-body">
            <?= $this->render('_form', [
                'model' => $model,
                'departments' => $departments,
                'appraisalCalendar' => $appraisalCalendar
            ]) ?>
        </div>
    </div>





</div>
