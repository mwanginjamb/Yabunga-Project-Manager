<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Employee */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employee-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php $form->field($model, 'id')->textInput(['maxlength' => true]) ?>

    <div class="row">
        <div class="col-md-6">

            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'middlename')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>
                </div>
            </div>





            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'cell')->textInput(['maxlength' => true]) ?>

            <?php $form->field($model, 'employee_no')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'departmentid')->dropDownList($departments,['prompt' => 'Select Department ..','required' =>  true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'userid')->dropDownList($users,['prompt' => 'Select Users','required' => true]) ?>

            <?= $form->field($model, 'nhif')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'nssf')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'passportno')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'krapin')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'supervisor_id')->dropDownList($employees,['prompt' => 'Select Supervisor ..','required' =>  true]) ?>



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
