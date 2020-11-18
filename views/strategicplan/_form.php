<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Strategicplan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="strategicplan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'start_year')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'end_year')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'strategicplan_description')->textarea(['rows' => 2]) ?>

    <?php $form->field($model, 'updated_by')->textInput() ?>

    <?php $form->field($model, 'created_by')->textInput() ?>

    <?php $form->field($model, 'created_at')->textInput() ?>

    <?php $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
