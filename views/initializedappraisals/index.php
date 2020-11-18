<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InitializedappraisalsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Initialized Appraisals';
$this->params['breadcrumbs'][] = ['label' => 'Initializedappraisals', 'url' => ['index']];

?>
<div class="initializedappraisals-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php if(Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success alert-dismissable"><?= Yii::$app->session->getFlash('success') ?></div>
    <?php endif; ?>
    <p>
        <?= Html::a('Initialize an Appraisal', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'appraisalcalendar.calendar_year_description',
            'department.department',
            //'created_by',
            //'updated_by',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn',


                    'buttons' => [
                        'view' => function($url){
                            return Html::a('<i class="fa fa-eye"></i>', $url);
                        },
                        'update' => function($url){
                            return Html::a('<i class="fa fa-edit"></i>', $url);
                        },
                        'delete' => function( $url )
                        {
                            return Html::a('<i class="fa fa-trash"></i>', $url,[

                                'data' => [
                                    'confirm' => 'Are you sure you wanna delete this record?',
                                    'method' => 'POST',
                                    'params' => [
                                        '_csrf' => Yii::$app->request->csrfToken
                                    ]

                                ]
                            ]);
                        }
                    ],

                ],
        ],
    ]); ?>


</div>
