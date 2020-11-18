<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Initializedappraisals */

$this->title = 'Update Initializedappraisals: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Initializedappraisals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="initializedappraisals-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'departments' => $departments,
        'appraisalCalendar' => $appraisalCalendar
    ]) ?>

</div>
