<?php
/**
 * Created by PhpStorm.
 * User: HP ELITEBOOK 840 G5
 * Date: 2/21/2020
 * Time: 2:39 PM
 */

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AdminlteAsset;
use common\widgets\Alert;
use app\assets\YabungaAsset;

YabungaAsset::register($this);

$webroot = Yii::getAlias(@$webroot);
$absoluteUrl = \yii\helpers\Url::home(true);
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

<?php $this->beginBody() ?>

<body>

        <!-- Navbar -->
        <div class="navbar sticky">
            <div class="container flex">
                <h1 class="logo"><?= Yii::$app->name ?></h1>
                <nav>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="features.html">Features</a></li>
                        <li><a href="docs.html">Docs</a></li>
                        <li><?= html::a('logout',['logout'])?></li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /.navbar -->

        <?= $content ?>




<!--    Footer section-->

    <footer class="footer bg-dark py-5 ">
        <div class="container grid grid-3">
            <div>
                <h1>La Francois</h1>
                <p>Copyright &copy; 2020</p>
            </div>
            <nav>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="features.html">Features</a></li>
                    <li><a href="privacy.html">Privacy Policy</a></li>
                    <li><a href="docs.html">Docs</a></li>
                </ul>
            </nav>

            <div class="social">
                <a href="#"><i class="fab fa-github fa-2x"></i></a>
                <a href="#"><i class="fab fa-facebook fa-2x"></i></a>
                <a href="#"><i class="fab fa-linkedin fa-2x"></i></a>
                <a href="#"><i class="fab fa-instagram fa-2x"></i></a>
                <a href="#"><i class="fab fa-pinterest fa-2x"></i></a>
            </div>
        </div>
    </footer>




<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage(); ?>
