<?php

namespace app\controllers;

class ConsultaController extends \yii\web\Controller
{
    public function actionConsulta()
    {
        return $this->render('consulta');
    }

    public function actionConsultaAdvance()
    {
        return $this->render('consulta2');
    }
}
