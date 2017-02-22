<?php

namespace app\controllers;

use app\models\Paciente;
use app\models\Somatometria;

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

        return $this->render('consulta2', [
            'paciente' => $paciente,
            'model' => $model
        ]);
    }
}
