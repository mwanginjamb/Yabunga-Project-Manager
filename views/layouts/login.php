<?php
/**
 * Created by PhpStorm.
 * User: HP ELITEBOOK 840 G5
 * Date: 2/21/2020
 * Time: 4:19 PM
 */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\LoginAsset;
use app\widgets\Alert;

LoginAsset::register($this);
$this->title = Yii::$app->params['WelcomeText'];
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?= \yii\helpers\Url::to('/images/fav.png')?>" sizes="32x32" />
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>


<div class="container" id="container">



        <?= $content?>


    <!-- Overlay Container -->

    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Welcome Back</h1>

                <p>If you are one of our, sign in with your account details.</p>
                <button class="ghost">Sign In</button>
            </div>

            <div class="overlay-panel overlay-right">
                <h1>Hello There!</h1>
                <p>Welcome to Yabunga Projects. Start your prosperity journey with us.</p>
                <!--<button class="ghost">Sign Up</button>-->

                <?= (Yii::$app->controller->action->id == 'login')?html::a('Sign Up',['signup'],['class' => 'ghost btn btn-outline-primary']):''?>
                <?= (Yii::$app->controller->action->id == 'signup')?html::a('Sign In',['login'],['class' => 'ghost btn btn-outline-primary']):''?>
            </div>


        </div>
    </div>

</div>











<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage(); ?>


