<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <div class="row">
        <div class="col-lg-12">
            <h1><?= Html::encode($this->title) ?></h1>

            <p>Please fill out the following fields to login:</p>

            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                /* 'layout' => 'horizontal',
                 'fieldConfig' => [
                     'template' => "{label}\n<div class=\"col-lg-6\">{input}</div>\n<div class=\"col-lg-6\">{error}</div>",
                     'labelOptions' => ['class' => 'col-lg-1 control-label'],
                 ],*/
            ]); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?= $form->field($model, 'rememberMe')->checkbox([
                'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
            ]) ?>

            <div style="margin:1em 0">
                If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                <br>
                Need new verification email? <?= Html::a('Resend', ['site/resend-verification-email']) ?>
            </div>

            <div class="form-group">
                <div class="col-lg-offset-1 col-lg-11">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    <?= Html::a('Sign Up',['signup'],['title' => 'I have no account, I wanna Register.']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>


        </div>
    </div>

</div>

<?php

$style = <<<CSS

    body, .site-login {
        color: #fff;
    }
    .login-page { 
          background: linear-gradient(0deg, rgba(0,0,0,0.2), rgba(0,0,0,0.6)),url("../../images/bg.jpg") no-repeat center center fixed; 
          -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: cover;
        
    }
    
    .top-logo {
        display: flex;
        margin-left: 10px;
       
    }
     .top-logo img { 
                width: 120px;
                height: auto;
                position: absolute;
                left: 15px;
                top:15px;
                
          
            }
     .login-logo a  {
        color: #E5173F!important;
        font-family: sans-serif, Verdana;
        font-size: larger;
        font-weight: 400;
     }

    input.form-control {
        border-left: 0!important;
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
        border: 1px solid #f6c844;
    }
    
    span.input-group-text {
        border-right: 0;
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
        border: 1px solid #f6c844;
    }

    span.unlock {
        position: absolute;
        right: 22px;
        top: 32%;
        cursor: pointer;

    }

    span.unlock *{
        font-size: 20px;
        color: #7a79e;
    }
    
   .card {
    background-color: rgba(0,0,0,.1);
   }
   
   .login-card-body {
     background-color: rgba(0,0,0,.1);
   }

    
    
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

