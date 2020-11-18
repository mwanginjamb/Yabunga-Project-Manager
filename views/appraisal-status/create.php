<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AppraisalStatus */

$this->title = 'Create Appraisal Status';
$this->params['breadcrumbs'][] = ['label' => 'Appraisal Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'New Appraisal Status', 'url' => ['create']];
?>
<div class="appraisal-status-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
