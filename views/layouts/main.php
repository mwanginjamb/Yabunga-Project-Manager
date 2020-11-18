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

AdminlteAsset::register($this);

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

<body class="hold-transition sidebar-mini layout-fixed accent-info">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark navbar-info">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
                <?php if(!Yii::$app->user->isGuest): ?>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="<?= $absoluteUrl ?>site" class="nav-link">Home</a>
                    </li>

                <?php if(Yii::$app->controller->id == 'applicantprofile'){ ?>

                    <li class="nav-item d-none d-sm-inline-block">
                        <?= Html::a('My Applications',['recruitment/applications'],['class'=>"nav-link"])?>

                    </li>

                <?php } ?>

                <?php endif; ?>
                <!--<li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>-->
            </ul>

            <!-- SEARCH FORM -->
            <!--<form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>-->

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto ">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <!--<a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>-->
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="https://via.placeholder.com/128/cccccc/FFFFFF/?text=Employee" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="https://via.placeholder.com/128/cccccc/FFFFFF/?text=Employee" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="https://via.placeholder.com/128/cccccc/FFFFFF/?text=Employee" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-th-large"></i>

                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!--<span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>-->






                        <div class="dropdown-divider"></div>

                        <?= (Yii::$app->user->isGuest)? Html::a('<i class="fas fa-sign-in-alt "></i> Signup','/site/signup/',['class'=> 'dropdown-item']): ''; ?>

                        <div class="dropdown-divider"></div>

                        <?= (Yii::$app->user->isGuest)? Html::a('<i class="fas fa-lock-open"></i> Login','/site/login/',['class'=> 'dropdown-item']): ''; ?>

                        <div class="dropdown-divider"></div>

                        <div class="dropdown-divider"></div>

                        <?= (!Yii::$app->user->isGuest)? Html::a('<i class="fas fa-sign-out-alt"></i> Logout','/site/logout/',['class'=> 'dropdown-item']):''; ?>

                        <div class="dropdown-divider"></div>

                        <?= (!Yii::$app->user->isGuest)?Html::a('<i class="fas fa-user"></i> Profile',['employee/view','userid'=> Yii::$app->user->id ],['class'=> 'dropdown-item']):''; ?>


                    </div>
                </li>
               <!-- <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="false" href="#">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>-->
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar elevation-4 sidebar-light-info">
            <!-- Brand Logo -->
            <a href="<?= $absoluteUrl ?>site" class="brand-link">
                <!--<img src="<?= $webroot ?>/images/Logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                     style="opacity: .8">-->
                <span class="brand-text font-weight-light"><?= Yii::$app->name ?></span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="https://via.placeholder.com/160/cccccc/FFFFFF/?text=user" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="<?= $absoluteUrl ?>employee/view?userid=<?= Yii::$app->user->id ?>" class="d-block"><?= (!Yii::$app->user->isGuest)?Yii::$app->user->identity->username:'' ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                             with font-awesome or any other icon font library -->


<!--Approval Management -->
                        <?php if(!Yii::$app->user->isGuest ): ?>
                        <li class="nav-item has-treeview <?= Yii::$app->recruitment->currentCtrl('approvals')?'menu-open':'' ?>">

                            <a href="#" class="nav-link <?= Yii::$app->recruitment->currentCtrl('approvals')?'active':'' ?>">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Approval Management
                                    <i class="fas fa-angle-left right"></i>
                                    <!--<span class="badge badge-info right">6</span>-->
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= $absoluteUrl ?>site" class="nav-link <?= Yii::$app->recruitment->currentaction('approvals','index')?'active':'' ?>">
                                        <i class="fa fa-check-square nav-icon"></i>
                                        <p>Submitted Objectives</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= $absoluteUrl ?>site" class="nav-link <?= Yii::$app->recruitment->currentaction('approvals','index')?'active':'' ?>">
                                        <i class="fa fa-check-square nav-icon"></i>
                                        <p>Mid Year Reviews</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= $absoluteUrl ?>site" class="nav-link <?= Yii::$app->recruitment->currentaction('approvals','index')?'active':'' ?>">
                                        <i class="fa fa-check-square nav-icon"></i>
                                        <p>End Year Reviews</p>
                                    </a>
                                </li>


                            </ul>
                        </li>
                        <?php endif; ?>
<!--end Aprroval Management-->


                        <li class="nav-item has-treeview  <?= Yii::$app->recruitment->currentCtrl(['leave','leavestatement','leaverecall','leaveplan'])?'menu-open':'' ?>">
                            <a href="#" class="nav-link <?= Yii::$app->recruitment->currentCtrl('leave')?'active':'' ?>">
                                <i class="nav-icon fas fa-chess-rook"></i>
                                <p>
                                    Admin Setups
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="<?= $absoluteUrl ?>appraisalcalendar" class="nav-link <?= Yii::$app->recruitment->currentaction('appraisalcalendar','index')?'active':'' ?> ">
                                        <i class="fa fa-chess-rook nav-icon"></i>
                                        <p>Appraisal Calendar</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= $absoluteUrl ?>strategicplan" class="nav-link <?= Yii::$app->recruitment->currentaction('leave','create')?'active':'' ?> ">
                                        <i class="fa fa-chess-rook nav-icon"></i>
                                        <p>Strategic Plan</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= $absoluteUrl ?>organizationalgoal" class="nav-link <?= Yii::$app->recruitment->currentaction('leave','create')?'active':'' ?> ">
                                        <i class="fa fa-chess-rook nav-icon"></i>
                                        <p>Organizational Goals</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= $absoluteUrl ?>departmentgoal" class="nav-link <?= Yii::$app->recruitment->currentaction('leave','create')?'active':'' ?> ">
                                        <i class="fa fa-chess-rook nav-icon"></i>
                                        <p>Departments Goals</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= $absoluteUrl ?>department" class="nav-link <?= Yii::$app->recruitment->currentaction('leave','create')?'active':'' ?> ">
                                        <i class="fa fa-chess-rook nav-icon"></i>
                                        <p>Departments</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= $absoluteUrl ?>appraisal-status" class="nav-link <?= Yii::$app->recruitment->currentaction('leave','index')?'active':'' ?>">
                                        <i class="fa fa-chess-rook nav-icon"></i>
                                        <p>Appraisal Statuses</p>
                                    </a>
                                </li>

    

                                <li class="nav-item">
                                    <a href="<?= $absoluteUrl ?>objective-setting-status" class="nav-link <?= Yii::$app->recruitment->currentaction('leavestatement','index')?'active':'' ?>">
                                        <i class="fa fa-chess-rook nav-icon"></i>
                                        <p>Objective Setting Statuses</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= $absoluteUrl ?>employee" class="nav-link <?= Yii::$app->recruitment->currentaction('leaverecall','create')?'active':'' ?>">
                                        <i class="fa fa-chess-rook nav-icon"></i>
                                        <p>Employees</p>
                                    </a>
                                </li>



                                <li class="nav-item">
                                    <a href="<?= $absoluteUrl ?>initializedappraisals" class="nav-link <?= Yii::$app->recruitment->currentaction('leave','create')?'active':'' ?> ">
                                        <i class="fa fa-chess-rook nav-icon"></i>
                                        <p>Initialized Appraisals</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= $absoluteUrl ?>midyearperformancelevels" class="nav-link <?= Yii::$app->recruitment->currentaction('leave','create')?'active':'' ?> " title="Mid Year Performance Levels">
                                        <i class="fa fa-chess-rook nav-icon"></i>
                                        <p>Mid Year PLs</p>
                                    </a>
                                </li>


                                <li class="nav-item">
                                    <a href="<?= $absoluteUrl ?>objective-setting-status" class="nav-link <?= Yii::$app->recruitment->currentaction('leave','create')?'active':'' ?> " title="Mid Year Performance Levels">
                                        <i class="fa fa-chess-rook nav-icon"></i>
                                        <p>Objective Setting Status</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= $absoluteUrl ?>appraisal-status" class="nav-link <?= Yii::$app->recruitment->currentaction('leave','create')?'active':'' ?> " title="Mid Year Performance Levels">
                                        <i class="fa fa-chess-rook nav-icon"></i>
                                        <p>Appraisal Status</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= $absoluteUrl ?>rating" class="nav-link <?= Yii::$app->recruitment->currentaction('leave','create')?'active':'' ?> " title="Mid Year Performance Levels">
                                        <i class="fa fa-chess-rook nav-icon"></i>
                                        <p>Performance Rating</p>
                                    </a>
                                </li>







                            </ul>
                        </li>



                       
                            
                       





                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark"></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <!--<li class="breadcrumb-item"><a href="site">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard v1</li>-->
                                <?=
                                Breadcrumbs::widget([
                                'itemTemplate' => "<li class=\"breadcrumb-item\"><i>{link}</i></li>\n", // template for all links
                                'homeLink' => [
                                'label' => Yii::t('yii', 'Home'),
                                'url' => Yii::$app->homeUrl,
                                ],
                                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                                ])
                                ?>
                            </ol>

                        </div><!-- /.col-6 bread ish -->

                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    <?= $content ?>
                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->

        </div>
        <!-- /.content-wrapper -->


        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; <?= Yii::$app->params['Company'] ?> -  <?= Html::encode(Yii::$app->name) ?>  <?= date('Y') ?>   <a href="#"> </a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b><?= Yii::signature() ?></b>
            </div>
        </footer>


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-light">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->




    </div>

</body>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();





?>
