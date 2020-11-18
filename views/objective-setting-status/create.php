<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ObjectiveSettingStatus */

$this->title = 'Create Objective Setting Status';
$this->params['breadcrumbs'][] = ['label' => 'Objective Setting Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="objective-setting-status-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
