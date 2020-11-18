<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Departmentgoal */

$this->title = 'Create Department Goal';
$this->params['breadcrumbs'][] = ['label' => 'Departmentgoals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Create Department Goal', 'url' => ['create']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="departmentgoal-create">

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
