<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EmployeeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Employees';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Employee', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'firstname',
            'middlename',
            'lastname',
            'email:email',
            //'cell',
            //'employee_no',
            'department.department',
            //'nhif',
            //'nssf',
            //'passportno',
            //'krapin',
            //'userid',
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
