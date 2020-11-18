<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Initializedappraisals */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Initialized Appraisals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Initialized Appraisal', 'url' => ['view','id'=>$model->id]];
\yii\web\YiiAsset::register($this);
?>
<div class="initializedappraisals-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if(Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success alert-dismissable"><?= Yii::$app->session->getFlash('success') ?></div>
    <?php endif; ?>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Add', ['create'], ['class' => 'btn btn-success']) ?>
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
            'id',
            'appraisalcalendar.calendar_year_description',
            'department.department',
            //'created_by',
            //'updated_by',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
