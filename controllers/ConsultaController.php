<?php

namespace app\controllers;

use app\models\Consulta;
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
        $sometria = Somatometria::find()->where(['paciente_id' => $id])->one();
        if ($sometria != null){
            $model= $sometria;
        } else {
            $model = new Somatometria();
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['repertorizacion', 'id' => $id]);
        } else {

            return $this->render('consulta2', [
                'paciente' => $paciente,
                'model' => $model
            ]);
        }
    }

    public function actionRepertorizacion($id)
    {
        $model = new Consulta();

        $paciente = Paciente::find()->where(['id' => $id])->one();
        return $this->render('repertorizacion', [
            'paciente' => $paciente,
            'model' => $model
        ]);
    }

}
