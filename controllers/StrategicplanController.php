<?php

namespace app\controllers;

use Yii;
use app\models\Strategicplan;
use app\models\StrategicplanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StrategicplanController implements the CRUD actions for Strategicplan model.
 */
class StrategicplanController extends Controller
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
     * Lists all Strategicplan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StrategicplanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Strategicplan model.
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
     * Creates a new Strategicplan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Strategicplan();

        if ($model->load(Yii::$app->request->post())) {

            $model->start_year = strtotime(Yii::$app->request->post()['Strategicplan']['start_year']);
            $model->end_year = strtotime(Yii::$app->request->post()['Strategicplan']['end_year']);
            if($model->save()){
                Yii::$app->session->setFlash('success','Strategic Plan Period Created Successfully.', true);
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
     * Updates an existing Strategicplan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {
            $model->start_year = strtotime(Yii::$app->request->post()['Strategicplan']['start_year']);
            $model->end_year = strtotime(Yii::$app->request->post()['Strategicplan']['end_year']);
            if($model->save()){
                Yii::$app->session->setFlash('success','Strategic Plan Period Updated Successfully.', true);
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
     * Deletes an existing Strategicplan model.
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
     * Finds the Strategicplan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Strategicplan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Strategicplan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
