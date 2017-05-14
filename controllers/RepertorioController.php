<?php

namespace app\controllers;

class RepertorioController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionTradicional()
    {
        return $this->render('tradicional');
    }

}
