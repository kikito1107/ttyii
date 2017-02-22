<?php

namespace app\controllers;

use app\models\Notificaciones;

class NotificacionesController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $notificaciones = Notificaciones::find()->where(['status' => 0])->all();

        return $this->render('index', [
            'notificaciones' => $notificaciones
        ]);
    }

}
