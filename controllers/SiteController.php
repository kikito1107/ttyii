<?php

namespace app\controllers;

use auth\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\Session;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
//            'error' => [
//                'class' => 'yii\web\ErrorAction',
//            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * @return string
     */
    public function actionError()
    {
        $error = Yii::$app->errorHandler->exception;

        /** @noinspection PhpUndefinedFieldInspection */
        switch( $error->statusCode ) {
            case 404:
                return $this->render('error', [
                    'name' => Yii::t('app', '404'),
                    'error' => Yii::t('app', 'No encontrado'),
                    'message' => Yii::t('app', 'La página que está buscando no se encuentra o no está disponible')
                ]);
                break;
            case 403:
                return $this->render('error', [
                    'name' => Yii::t('app', '403'),
                    'error' => Yii::t('app', 'Prohibido'),
                    'message' => 'Usted no esta autorizado para visualizar este contenido',
                ]);
                break;
            case 500:
                return $this->render('error', [
                    'name' => Yii::t('app', '500'),
                    'error' => Yii::t('app', 'Error interno del servidor'),
                    'message' => 'Ocurrió un error inesperado',
                ]);
                break;
            default:
                return $this->render('error', [
                    'name' => Yii::t('app', 'Error'),
                    'error' => Yii::t('app', 'Error'),
                    'message' => $error->getMessage()
                ]);
                break;
        }
    }

//    public function actionLogin()
//    {
//        if (!\Yii::$app->user->isGuest) {
//            return $this->goHome();
//        }
//
//        $model = new LoginForm();
//        if ($model->load(Yii::$app->request->post()) && $model->login()) {
//            return $this->goBack();
//        }
//        return $this->render('login', [
//            'model' => $model,
//        ]);
//    }
//
//    public function actionLogout()
//    {
//        Yii::$app->user->logout();
//
//        return $this->goHome();
//    }
//
//    public function actionContact()
//    {
//        $model = new ContactForm();
//        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
//            Yii::$app->session->setFlash('contactFormSubmitted');
//
//            return $this->refresh();
//        }
//        return $this->render('contact', [
//            'model' => $model,
//        ]);
//    }
//
//    public function actionAbout()
//    {
//        return $this->render('about');
//    }
}
