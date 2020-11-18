<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrganizationalgoalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Organizational Goals';
$this->params['breadcrumbs'][] = ['label' => 'Organizational Goals', 'url' => ['index']];
?>
<div class="organizationalgoal-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Organizational Goal', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'goal:ntext',
            'strategicplan.strategicplan_description',
            //'updated_by',
            //'created_by',
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
