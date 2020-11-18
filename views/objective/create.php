<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Objective */

$this->title = 'Create Objective';
$this->params['breadcrumbs'][] = ['label' => 'Objectives', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="objective-create">


    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="card-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>




</div>