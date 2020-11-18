<?php

namespace app\controllers;

use app\models\Appraisalheader;
use app\models\AppraisalStatus;
use app\models\Midyearperformancelevels;
use app\models\ObjectiveSettingStatus;
use app\models\ResetPasswordForm;
use app\models\SignupForm;
use app\models\VerifyEmailForm;
use app\models\PasswordResetRequestForm;
use Psr\Log\InvalidArgumentException;
use Yii;
use yii\base\InvalidParamException;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\ResendVerificationEmailForm;


class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout','index','list','appraisal'],
                'rules' => [
                    [
                        'actions' => ['logout','index','list','appraisal'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    //'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $this->layout = 'login';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $this->layout = 'login';
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {

                /*Do not auto login user*/
                //if (Yii::$app->getUser()->login($user)) {
                return $this->goHome();
                //}
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $this->layout = 'login';
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();//customize to redirect to same page
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        $this->layout = 'login';
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    public function actionResendVerificationEmail()
    {
        $this->layout = 'login';
        $model = new ResendVerificationEmailForm();
        if ($model->sendEmail()) {
            Yii::$app->session->setFlash('success', ' Verification Email Resent Successfully.');

            return $this->goHome();
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model,
        ]);
    }

    /*yii defaults*/

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                return $this->goHome();
            }
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    // List Appraisals

    public function actionList()
    {
        //get Employee Details
        Yii::$app->response->format = Response::FORMAT_JSON;
        $employee = Yii::$app->user->identity->employee;

        // Get Appraisal Header

        $Appraisals = Appraisalheader::find()->where(['employee_no' => $employee->employee_no ])->all();
        $count = 0;
        $result = [];
        foreach($Appraisals as $app)
        {
            $link = Html::a('View <i class="fa fa-eye"></i>', ['appraisal','app' => $app->id],['class' => 'btn btn-xs btn-success']);
            ++$count;
            $result['data'][] = [
                    'id' => $count,
                    'calendar' => $app->initialization->appraisalcalendar->calendar_year_description,
                    'Employee_no' => $app->employee_no,
                    'Department' => $app->initialization->department->department,
                    'link' => $link
            ];
        }

        return $result;
    }

    // Appraisal Card

    public function actionAppraisal($app)
    {
        $model = Appraisalheader::find()->where(['id' => $app])->one();
        $objectiveSettingStatus = ArrayHelper::map(ObjectiveSettingStatus::find()->all(),'id','status');
        $appraisalStatus = ArrayHelper::map(AppraisalStatus::find()->all(),'id','status');
        $myPls = ArrayHelper::map(Midyearperformancelevels::find()->all(),'id','level');
        return $this->render('appraisal',[
            'model' => $model,
            'objectiveSettingStatus' => $objectiveSettingStatus,
            'appraisalStatus' => $appraisalStatus,
            'myPls' => $myPls
        ]);
    }


}
