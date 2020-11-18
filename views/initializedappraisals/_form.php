<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Initializedappraisals */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="initializedappraisals-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'appraisalcalendarid')->dropDownList($appraisalCalendar, ['prompt' => 'Select ...']) ?>

    <?= $form->field($model, 'departmentid')->dropDownList($departments,['prompt' => 'Select ...']) ?>

    <?php $form->field($model, 'created_by')->textInput() ?>

    <?php $form->field($model, 'updated_by')->textInput() ?>

    <?php $form->field($model, 'created_at')->textInput() ?>

    <?php $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
