<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

    <div class="form-container sign-up-container">

            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>


                <h1>Sign In </h1>

                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>

                <span>Use your Credentials to Sign In</span>

                <?= $form->field($model, 'username')->textInput(['placeholder' => 'Username','autofocus' => true,'autocomplete'=> 'off'])->label(false) ?>

                <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Password','autocomplete'=> 'off'])->label(false) ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>


               <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>


            <?php ActiveForm::end(); ?>

    </div>

    <div class="action-buttons">
        <?= Html::a('Reset Password', ['site/request-password-reset'],['class' => 'btn btn-outline-primary']) ?>
        <?= Html::a('Resend Verification Email', ['site/resend-verification-email'],['class' => 'btn btn-outline-primary']) ?>
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

