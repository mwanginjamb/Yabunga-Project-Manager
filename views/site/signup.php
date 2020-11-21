<?php
/**
 * Created by PhpStorm.
 * User: HP ELITEBOOK 840 G5
 * Date: 10/30/2020
 * Time: 12:54 AM
 */


/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>


    <div class="form-container sign-up-container">

            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>




        <h1>Create Account</h1>

        <div class="social-container">
            <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="social"><i class="fab fa-twitter"></i></a>
            <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
        </div>

        <span>Sign Up using a valid E-mail Address.</span>


            <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => 'Username'])->label(false) ?>

            <?= $form->field($model, 'email')->textInput(['placeholder' => 'Email'])->label(false) ?>

            <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Password'])->label(false) ?>

            <?= $form->field($model, 'passwordconfirm')->passwordInput(['placeholder' => 'Confirm Password'])->label(false) ?>

            <div class="form-group">
                <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
    </div>

<?php
$style = <<<CSS



CSS;

$this->registerCss($style);


$script = <<<JS
        toggleEl = document.querySelector('.unlock');
        const pfield = document.querySelector('#loginform-password');

        toggleEl.addEventListener('click', function() {
const typeAttr = pfield.getAttribute('type');
(typeAttr === 'password')?pfield.setAttribute('type','text'):pfield.setAttribute('type','password');

});
JS;

$this->registerJs($script);

