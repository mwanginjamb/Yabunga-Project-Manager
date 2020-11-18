<?php

namespace app\controllers;

use app\models\Appraisalcalendar;
use app\models\Department;
use app\models\Organizationalgoal;
use Yii;
use app\models\Departmentgoal;
use app\models\DepartmentgoalSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DepartmentgoalController implements the CRUD actions for Departmentgoal model.
 */
class DepartmentgoalController extends Controller
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
     * Lists all Departmentgoal models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DepartmentgoalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Departmentgoal model.
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
     * Creates a new Departmentgoal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Departmentgoal();

        $departments = ArrayHelper::map(Department::find()->all(),'id','department');
        $organizationalGoals = ArrayHelper::map(Organizationalgoal::find()->all(),'id','goal');
        $appraisalCalendar = ArrayHelper::map(Appraisalcalendar::find()->all(),'id','calendar_year_description');

        if ($model->load(Yii::$app->request->post()) ) {
            if($model->save()){
                Yii::$app->session->setFlash('success','Department Goal Created Successfully.', true);
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                Yii::$app->recruitment->printrr($model->getErrors());
            }
        }

        return $this->render('create', [
            'model' => $model,
            'departments' => $departments,
            'organizationalGoals' => $organizationalGoals,
            'appraisalCalendar' => $appraisalCalendar
        ]);
    }

    /**
     * Updates an existing Departmentgoal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $departments = ArrayHelper::map(Department::find()->all(),'id','department');
        $organizationalGoals = ArrayHelper::map(Organizationalgoal::find()->all(),'id','goal');
        $appraisalCalendar = ArrayHelper::map(Appraisalcalendar::find()->all(),'id','calendar_year_description');

        if ($model->load(Yii::$app->request->post()) ) {
            if($model->save()){
                Yii::$app->session->setFlash('success','Department Goal Updated Successfully.', true);
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                Yii::$app->recruitment->printrr($model->getErrors());
            }
        }

        return $this->render('update', [
            'model' => $model,
            'departments' => $departments,
            'organizationalGoals' => $organizationalGoals,
            'appraisalCalendar' => $appraisalCalendar
        ]);
    }

    /**
     * Deletes an existing Departmentgoal model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Departmentgoal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Departmentgoal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Departmentgoal::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
