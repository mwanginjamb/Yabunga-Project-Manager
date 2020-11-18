<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Strategicplan */

$this->title = 'Create Strategic Plan';
$this->params['breadcrumbs'][] = ['label' => 'Strategicplans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Create Strategic plan Period', 'url' => ['create']];
?>
<div class="strategicplan-create">

    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h3><?= Html::encode($this->title) ?></h3>
            </div>
        </div>
        <div class="card-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>




</div>
