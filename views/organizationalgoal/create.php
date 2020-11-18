<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Organizationalgoal */

$this->title = 'Create Organizational Goal';
$this->params['breadcrumbs'][] = ['label' => 'Organizational Goals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Create Organizational Goals', 'url' => ['create']];
?>
<div class="organizationalgoal-create">

    <div class="card">
        <div class="card-header">
            <div class="card-title"><h3><?= Html::encode($this->title) ?></h3></div>
        </div>
        <div class="card-body">
            <?= $this->render('_form', [
                'model' => $model,
                'strategicPlans' => $strategicPlans
            ]) ?>
        </div>
    </div>



</div>
