<?php

namespace app\controllers;

use app\models\Mail;
use app\models\Medico;
use auth\components\User;
use Yii;
use app\models\Paciente;
use app\models\PacienteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PacienteController implements the CRUD actions for Paciente model.
 */
class PacienteController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all Paciente models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $pacientes = Paciente::find()->where(['medico_id' => $id])->all();

        return $this->render('index', [
            'pacientes' => $pacientes
        ]);
    }

    /**
     * Displays a single Paciente model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Paciente model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Paciente();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['register/send-mail']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Paciente model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if (Yii::$app->request->isPost) {
            $model->imagePhoto = UploadedFile::getInstance($model, 'imagePhoto');

            if(!empty($model->imagePhoto)) {
                $model->upload('imagePhoto', 'image_Photo');
            }


            $model->load(Yii::$app->request->post());

            if($model->validate() && $model->save()) {
                return $this->redirect(['profile', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Paciente model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionViewPaciente($id) {
        return $this->render('view_paciente', [
            'model' => $this->findModel($id),
            'text' => 'Hola mundo'
        ]);
    }

    public function actionProfile($id)
    {
        return $this->render('view-paciente', [
            'model' => $this->findModel($id)
        ]);
    }
    /**
     * Finds the Paciente model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Paciente the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Paciente::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Activa/Desactiva un elemento
     * @param $id
     * @param $status
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionActivate($id)
    {
        $paciente = Paciente::find()->where(['user_id' => $id])->one();
        if($paciente != null){
            $paciente->setAttribute('status', Paciente::STATUS_ACTIVE);
            $paciente->save();
            if ($paciente->save()){
                $user = \auth\models\User::find()->where(['id' => $id])->one();
                $user->setAttribute('status', \auth\models\User::STATUS_ACTIVE);
                $user->save();
                if ($user->save()){
                    return $this->redirect(['register/success']);
                }
                return $this->redirect(['register/error']);
            }
        }
        return $this->redirect(['register/error']);
    }

    public function actionActivateCount($id)
    {
        $model = $this->findModel($id);

        if ($model->status == Paciente::STATUS_ACTIVE){
            $model->setAttribute('status', Paciente::STATUS_INACTIVE);
        } else {
            $model->setAttribute('status', Paciente::STATUS_ACTIVE);
        }

        $model->save();

        return $this->redirect(['/paciente']);
    }

    public function actionHistory($id)
    {
        $model = $this->findModel($id);

        if ($model->status == Paciente::STATUS_ACTIVE){
            return $this->render('historial', [
                'model' => $model
            ]);
        } else {
            return $this->redirect(['paciente', [
                'id' => $model->medico_id
            ]]);
        }
    }
}
