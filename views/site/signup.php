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
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-12">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => 'Username'])->label(false) ?>

            <?= $form->field($model, 'email')->textInput(['placeholder' => 'Email'])->label(false) ?>

            <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Password'])->label(false) ?>

            <?= $form->field($model, 'passwordconfirm')->passwordInput(['placeholder' => 'Confirm Password'])->label(false) ?>

            <div class="form-group">
                <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

<?php
$style = <<<CSS

        body, .site-signup {
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

