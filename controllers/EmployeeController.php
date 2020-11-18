<?php

namespace app\controllers;

use app\models\Department;
use app\models\User;
use app\models\Users;
use Yii;
use app\models\Employee;
use app\models\EmployeeSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EmployeeController implements the CRUD actions for Employee model.
 */
class EmployeeController extends Controller
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
     * Lists all Employee models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmployeeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Employee model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id="")
    {
        return $this->render('view', [
            'model' => (Yii::$app->request->get('userid'))? Employee::findOne(['userid' => Yii::$app->request->get('userid') ]) :$this->findModel($id),
        ]);
    }

    /**
     * Creates a new Employee model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Employee();
        $departments = ArrayHelper::map(Department::find()->all(),'id','department');
        $users = ArrayHelper::map(Users::find()->all(),'id','username');
        $employees = ArrayHelper::map(Employee::find()->select(["CONCAT(firstname,' ',lastname) as name","employee_no"])->asArray()->all(),'employee_no','name'
        );


        if ($model->load(Yii::$app->request->post()) ) {

            $model->employee_no = 'EMP-'.Yii::$app->request->post()['Employee']['userid'];
            //Yii::$app->recruitment->printrr($model);
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                Yii::$app->recruitment->printrr($model->getErrors());
            }

        }

        return $this->render('create', [
            'model' => $model,
            'departments' => $departments,
            'users' => $users,
            'employees' => $employees
        ]);
    }

    /**
     * Updates an existing Employee model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $departments = ArrayHelper::map(Department::find()->all(),'id','department');
        $users = ArrayHelper::map(Users::find()->all(),'id','username');
        $employees = ArrayHelper::map(Employee::find()->select(["CONCAT(firstname,' ',lastname) as name","employee_no"])->asArray()->all(),'employee_no','name'
        );

       // Yii::$app->recruitment->printrr($employees);

        if ($model->load(Yii::$app->request->post()) ) {
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                Yii::$app->recruitment->printrr($model->getErrors());
            }

        }

        return $this->render('update', [
            'model' => $model,
            'departments' => $departments,
            'users' => $users,
            'employees' => $employees
        ]);
    }

    /**
     * Deletes an existing Employee model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Employee model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Employee the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Employee::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }



}
