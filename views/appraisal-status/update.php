<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AppraisalStatus */

$this->title = 'Update Appraisal Status: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Appraisal Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="appraisal-status-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
