<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Appraisalcalendar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="appraisalcalendar-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'yearstart')->textInput(['type' => 'date']) ?>





            <?= $form->field($model, 'mid_year_start')->textInput(['type' => 'date']) ?>

            <?= $form->field($model, 'end_year_start')->textInput(['type' => 'date']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'yearend')->textInput(['type' => 'date']) ?>

            <?= $form->field($model, 'mid_year_end')->textInput(['type' => 'date']) ?>

            <?= $form->field($model, 'end_year_end')->textInput(['type' => 'date']) ?>

            <?= $form->field($model, 'calendar_year_description')->textarea(['rows' => 2,'maxlength' => 150]) ?>
        </div>
    </div>









    <?php $form->field($model, 'updated_by')->textInput() ?>

    <?php $form->field($model, 'created_by')->textInput() ?>

    <?php $form->field($model, 'created_at')->textInput() ?>

    <?php $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
