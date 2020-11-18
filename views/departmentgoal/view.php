<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Departmentgoal */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Departmentgoals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Department Goals', 'url' => ['view','id' => $model->id]];
\yii\web\YiiAsset::register($this);
?>
<div class="departmentgoal-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if(Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success alert-dismissable"><?= Yii::$app->session->getFlash('success') ?></div>
    <?php endif; ?>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Add', ['create'], ['class' => 'btn btn-info']) ?>
        <?= Html::a('View All', ['index'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'departmentgoal:ntext',
            'department.department',
            'organizationGoal.goal',
            'calendar.calendar_year_description',
            //'updated_by',
            //'created_by',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
