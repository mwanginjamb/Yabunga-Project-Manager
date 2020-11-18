<?php

namespace app\controllers;

use Yii;
use app\models\Objective;
use app\models\ObjectiveSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ObjectiveController implements the CRUD actions for Objective model.
 */
class ObjectiveController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Objective models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ObjectiveSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Objective model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Objective model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Objective();



        if ($model->load(Yii::$app->request->post()) && Yii::$app->request->get('dgid')) {
            /*return $this->redirect(['view', 'id' => $model->id]);*/
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;



            // Validate Count

            $count = Objective::find()->where(['departmentgoalid' => Yii::$app->request->get('dgid'),'employee_no' => Yii::$app->request->get('Employee_No'), 'appraisal_id' => Yii::$app->request->get('appraisal_Id') ])->count();

            if($count >= 5){
                return ['note' => '<div class="alert alert-info">You are only allowed to set a maximum of 5 main objectives. </div>'];
                exit;
            }

            $model->departmentgoalid = Yii::$app->request->get('dgid');
            $model->employee_no = Yii::$app->request->get('Employee_No');
            $model->appraisal_id = Yii::$app->request->get('appraisal_Id');
            if($model->save())
            {
                return ['note' => '<div class="alert alert-success">Employee Objective Added Successfully. </div>'];
            }else{
               // return $model->getErrors();
                return ['note' => '<div class="alert alert-success">Error Adding Employee Objective. </div>'];
            }
        }

        if(Yii::$app->request->isAjax){
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Objective model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Objective model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        if($this->findModel($id)->delete()){
            return ['note' => '<div class="alert alert-success">Record Purged Successfully</div>'];
        }else{
            return ['note' => '<div class="alert alert-danger">Error Purging Record.</div>' ];
        }
    }

    /**
     * Finds the Objective model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Objective the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Objective::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
