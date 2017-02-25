<?php

namespace app\controllers;

use app\models\Paciente;
use app\models\Somatometria;
use Yii;

class ConsultaController extends \yii\web\Controller
{
    public function actionConsulta()
    {
        return $this->render('consulta');
    }

    public function actionConsulta2($id)
    {
        $paciente = Paciente::find()->where(['id' => $id])->one();

        $model = new Somatometria();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['repertorización', 'id' => $id]);
        } else {
            return $this->render('consulta2', [
                'paciente' => $paciente,
                'model' => $model
            ]);
        }
    }

    public function actionRepertorizacion()
    {
        return $this->render('repertorizacion');
    }

}
