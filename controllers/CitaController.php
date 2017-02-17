<?php

namespace app\controllers;

use app\models\Paciente;
use app\models\Medico;
use Yii;
use app\models\Citas;
use app\models\CitasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CitaController implements the CRUD actions for Citas model.
 */
class CitaController extends Controller
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
     * Lists all Citas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CitasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $id = \Yii::$app->user->id;
        $paciente = Paciente::find()->where(['user_id' => $id])->one();
        $cita = Citas::find()->where(['paciente_id' => $paciente->id])
            ->where(['status' => Citas::STATUS_PENDING])
            ->one();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $cita
        ]);
    }

    public function actionIndexM($id)
    {
        // información del medico obtenida mediante id
        $medico = Medico::find()->where(['id' => $id])->one();
        // Busqueda de todas las citas asociadas a el médico
        $citas_pendientes = Citas::find()->where(['medico_id' => $medico->id])
            ->where(['status' => Citas::STATUS_PENDING])
            ->all();
        $citas_canceladas = Citas::find()->where(['medico_id' => $medico->id])
            ->where(['status' => Citas::STATUS_CANCEL])
            ->all();
        $citas_aprobadas = Citas::find()->where(['medico_id' => $medico->id])
            ->where(['status' => Citas::STATUS_APROVED])
            ->all();

        return $this->render('index_m', [
            'pendientes' => $citas_pendientes,
            'canceladas' => $citas_canceladas,
            'aprobadas' => $citas_aprobadas
        ]);
    }


    /**
     * Displays a single Citas model.
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
     * Creates a new Citas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionCreate($id)
    {
        //var_dump($id);
        $model = new Citas();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('index');
        } else {
            return $this->render('create', [
                'model' => $model,
                'id' => $id,
            ]);
        }
    }


    /**
     * Creates a new Citas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionCreateM($id)
    {
        $medico = Medico::find()->where(['user_id' => $id])->one();
        $model = new Citas();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('index-m');
        } else {
            return $this->render('create', [
                'model' => $model,
                'id' => $medico->$id,
            ]);
        }
    }



    /**
     * Updates an existing Citas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id,$paciente_id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'id' => $paciente_id
            ]);
        }
    }

    /**
     * Deletes an existing Citas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Citas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Citas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Citas::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
