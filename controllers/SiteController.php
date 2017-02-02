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
use app\models\FormRegister;
use app\models\Users;

class SiteController extends Controller
{
    private function randKey($str='', $long=0)
    {
        $key = null;
        $str = str_split($str);
        $start = 0;
        $limit = count($str)-1;
        for($x=0; $x<$long; $x++)
        {
            $key .= $str[rand($start, $limit)];
        }
        return $key;
    }

    public function actionConfirm()
    {
        ////AQUI VA EL CODIGO DEL CORREO Q SE LE ENVIA AL PACIENTE CUANDO SE REGISTRA
        $table = new Users;
        if (Yii::$app->request->get())
        {

            //Obtenemos el valor de los parámetros get
            $id = Html::encode($_GET["id"]);
            $authKey = $_GET["authKey"];

            if ((int) $id)
            {
                //Realizamos la consulta para obtener el registro
                $model = $table
                    ->find()
                    ->where("id=:id", [":id" => $id])
                    ->andWhere("authKey=:authKey", [":authKey" => $authKey]);

                //Si el registro existe
                if ($model->count() == 1)
                {
                    $activar = Users::findOne($id);
                    $activar->activate = 1;
                    if ($activar->update())
                    {
                        echo "Enhorabuena registro llevado a cabo correctamente, redireccionando ...";
                        echo "<meta http-equiv='refresh' content='8; ".Url::toRoute("site/login")."'>";
                    }
                    else
                    {
                        echo "Ha ocurrido un error al realizar el registro, redireccionando ...";
                        echo "<meta http-equiv='refresh' content='8; ".Url::toRoute("site/login")."'>";
                    }
                }
                else //Si no existe redireccionamos a login
                {
                    return $this->redirect(["site/login"]);
                }
            }
            else //Si id no es un número entero redireccionamos a login
            {
                return $this->redirect(["site/login"]);
            }
        }
    }

    public function actionRegister()
    {

    }



////////////////////AQUI TERMINA

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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
