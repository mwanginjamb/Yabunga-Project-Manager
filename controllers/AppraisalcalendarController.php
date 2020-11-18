<?php

namespace app\controllers;

use Yii;
use app\models\Appraisalcalendar;
use app\models\AppraisalcalendarSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AppraisalcalendarController implements the CRUD actions for Appraisalcalendar model.
 */
class AppraisalcalendarController extends Controller
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
     * Lists all Appraisalcalendar models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AppraisalcalendarSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Appraisalcalendar model.
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
     * Creates a new Appraisalcalendar model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Appraisalcalendar();

        if ($model->load(Yii::$app->request->post()) ) {

            $model->yearstart = strtotime(Yii::$app->request->post()['Appraisalcalendar']['yearstart']);
            $model->yearend = strtotime(Yii::$app->request->post()['Appraisalcalendar']['yearend']);
            $model->mid_year_start = strtotime(Yii::$app->request->post()['Appraisalcalendar']['mid_year_start']);
            $model->mid_year_end = strtotime(Yii::$app->request->post()['Appraisalcalendar']['mid_year_end']);
            $model->end_year_start = strtotime(Yii::$app->request->post()['Appraisalcalendar']['end_year_start']);
            $model->end_year_end = strtotime(Yii::$app->request->post()['Appraisalcalendar']['end_year_end']);
            if($model->save()){
                Yii::$app->session->setFlash('success','Calendar Created Successfully', true);
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                Yii::$app->recruitment->printrr($model->getErrors());
            }

        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Appraisalcalendar model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {
            $model->yearstart = strtotime(Yii::$app->request->post()['Appraisalcalendar']['yearstart']);
            $model->yearend = strtotime(Yii::$app->request->post()['Appraisalcalendar']['yearend']);
            $model->mid_year_start = strtotime(Yii::$app->request->post()['Appraisalcalendar']['mid_year_start']);
            $model->mid_year_end = strtotime(Yii::$app->request->post()['Appraisalcalendar']['mid_year_end']);
            $model->end_year_start = strtotime(Yii::$app->request->post()['Appraisalcalendar']['end_year_start']);
            $model->end_year_end = strtotime(Yii::$app->request->post()['Appraisalcalendar']['end_year_end']);
            if($model->save()){
                Yii::$app->session->setFlash('success','Calendar Updated Successfully.', true);
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                Yii::$app->recruitment->printrr($model->getErrors());
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Appraisalcalendar model.
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
     * Finds the Appraisalcalendar model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Appraisalcalendar the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Appraisalcalendar::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
