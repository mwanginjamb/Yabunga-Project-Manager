<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Departmentgoal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="departmentgoal-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'departmentgoal')->textarea(['rows' => 3]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'departmentid')->dropDownList($departments,['prompt' => 'Select..']) ?>

            <?= $form->field($model, 'organization_goal_id')->dropDownList($organizationalGoals, ['prompt' => 'Select..']) ?>

            <?= $form->field($model, 'calendarid')->dropDownList($appraisalCalendar, ['prompt' => 'Select ..']) ?>

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
