<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Organizationalgoal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="organizationalgoal-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'goal')->textarea(['rows' => 2]) ?>

    <?= $form->field($model, 'strategicplanid')->dropDownList($strategicPlans,['prompt' => 'Select ..']) ?>

    <?php $form->field($model, 'updated_by')->textInput() ?>

    <?php $form->field($model, 'created_by')->textInput() ?>

    <?php $form->field($model, 'created_at')->textInput() ?>

    <?php $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
