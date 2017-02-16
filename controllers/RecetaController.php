<?php

namespace app\controllers;

use app\models\Paciente;
use kartik\mpdf\Pdf;

class RecetaController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionPdf($id)
    {
        $paciente = Paciente::find()->where(['id' => $id])->one();
        $content = $this->renderPartial('_reportView', ['paciente' => $paciente]);

        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            'cssInline' => '.kv-heading-1{font-size:18px}',
            // set mPDF properties on the fly
            'options' => ['title' => 'Sistema Homeopático'],
            //Html::img('../img/logo.jpg'),
            // call mPDF methods on the fly
            'methods' => [
                'SetHeader'=>['Sistema Homeopático'],
                'SetFooter'=>['Desarrollado por Alumnos de la Escuela Superior de Cómputo', '{PAGENO}'],
                //'SetFooter'=>['{PAGENO}'],
            ]
        ]);

        // return the pdf output as per the destination setting
        return $pdf->render();
    }
}
