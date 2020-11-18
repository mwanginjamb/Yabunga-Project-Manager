<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AppraisalStatus */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Appraisal Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Appraisal Status', 'url' => ['index','id'=>$model->id]];
\yii\web\YiiAsset::register($this);
?>
<div class="appraisal-status-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Add New', ['create'], ['class' => 'btn btn-info']) ?>
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
            'status',
        ],
    ]) ?>

</div>
