<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AppraisalcalendarSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="appraisalcalendar-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'yearstart') ?>

    <?= $form->field($model, 'yearend') ?>

    <?= $form->field($model, 'calendar_year_description') ?>

    <?= $form->field($model, 'mid_year_start') ?>

    <?php // echo $form->field($model, 'mid_year_end') ?>

    <?php // echo $form->field($model, 'end_year_start') ?>

    <?php // echo $form->field($model, 'end_year_end') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
