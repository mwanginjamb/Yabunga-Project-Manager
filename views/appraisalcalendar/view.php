<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Appraisalcalendar */

$this->title = 'Appraisal Year : '.$model->calendar_year_description;
$this->params['breadcrumbs'][] = ['label' => 'Appraisalcalendars', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->calendar_year_description, 'url' => ['view','id'=> $model->id]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="appraisalcalendar-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if(Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success alert-dismissable"><?= Yii::$app->session->getFlash('success') ?></div>
    <?php endif; ?>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('New', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('View All', ['index'], ['class' => 'btn btn-info']) ?>
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
            //'id',
            'yearstart:datetime',
            'yearend:datetime',
            'calendar_year_description:ntext',
            'mid_year_start:datetime',
            'mid_year_end:datetime',
            'end_year_start:datetime',
            'end_year_end:datetime',
            'updated_by',
            'created_by',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
