<?php

namespace app\controllers;

use app\models\Appraisalcalendar;
use app\models\Department;
use app\models\Employee;
use Yii;
use app\models\Initializedappraisals;
use app\models\InitializedappraisalsSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InitializedappraisalsController implements the CRUD actions for Initializedappraisals model.
 */
class InitializedappraisalsController extends Controller
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
     * Lists all Initializedappraisals models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InitializedappraisalsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Initializedappraisals model.
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
     * Creates a new Initializedappraisals model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Initializedappraisals();

        $departments = ArrayHelper::map(Department::find()->all(),'id','department');
        $appraisalCalendar = ArrayHelper::map(Appraisalcalendar::find()->all(),'id','calendar_year_description');

        if ($model->load(Yii::$app->request->post()) ) {

            if($model->save()){
                Yii::$app->session->setFlash('success','Appraisal Initialized Successfully.', true);
                return $this->redirect(['index']);
            }else{
                Yii::$app->recruitment->printrr($model->getErrors());
            }
        }

        return $this->render('create', [
            'model' => $model,
            'departments' => $departments,
            'appraisalCalendar' => $appraisalCalendar
        ]);
    }

    /**
     * Updates an existing Initializedappraisals model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $departments = ArrayHelper::map(Department::find()->all(),'id','department');
        $appraisalCalendar = ArrayHelper::map(Appraisalcalendar::find()->all(),'id','calendar_year_description');

        if ($model->load(Yii::$app->request->post()) ) {

            // For selected department initialize for all employees therein @to-do

            if($model->save()){
                Yii::$app->session->setFlash('success','Appraisal Initialization Updated Successfully.', true);
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                Yii::$app->recruitment->printrr($model->getErrors());
            }
        }

        return $this->render('update', [
            'model' => $model,
            'departments' => $departments,
            'appraisalCalendar' => $appraisalCalendar
        ]);
    }

    /**
     * Deletes an existing Initializedappraisals model.
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
     * Finds the Initializedappraisals model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Initializedappraisals the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Initializedappraisals::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
