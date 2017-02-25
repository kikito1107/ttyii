<?php

namespace app\controllers;

use app\models\Notificaciones;
use app\models\Organo;
use app\models\Sintoma;

class NotificacionesController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $notificaciones = Notificaciones::find()->where(['status' => 0])->all();

        $organos = Organo::find()->where(['status' => Organo::STATUS_INACTIVE])->all();
        $sintomas = Sintoma::find()->where(['status' => Sintoma::STATUS_INACTIVE])->all();

        return $this->render('index', [
            'notificaciones' => $notificaciones,
            'organos' => $organos,
            'sintomas' => $sintomas
        ]);
    }

}
