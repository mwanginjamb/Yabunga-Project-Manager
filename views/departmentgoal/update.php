<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Departmentgoal */

$this->title = 'Update Departmentgoal: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Departmentgoals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="departmentgoal-update">

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
                'organizationalGoals' => $organizationalGoals,
                'appraisalCalendar' => $appraisalCalendar
            ]) ?>
        </div>
    </div>

</div>
