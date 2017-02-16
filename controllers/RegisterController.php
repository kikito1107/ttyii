<?php

namespace app\controllers;

use app\models\Paciente;
use app\models\PacienteSearch;
use messaging\shared\helpers\HttpRequest;
use Yii;
use yii\data\ActiveDataProvider;

class RegisterController extends \yii\web\Controller
{
    public function actionSendMail()
    {
        return $this->render('send_success');
    }

    public function actionResendMail()
    {
        return $this->render('resend_mail');

    }

    public function actionValidate()
    {
        $request = Yii::$app->request;
        $email = null;

        if ($request->isPost) {
            $post = HttpRequest::post();
            $email = $post['Paciente']['email'];
        }

        if ($email != null) {

            $paciente = Paciente::find()->where(['email' => $email])->one();

            if ($paciente != null) {

                $template = $this->render('@app/mail/layouts/html', [
                    'data' => [
                        'name' => $paciente->getFullName(),
                        'id' => $paciente->user_id,
                        'email' => $paciente->email
                    ]
                ]);
                $email = \Yii::$app->mailer->compose();
                $email->setFrom('kikito110792@gmail.com');
                $email->setTo($paciente->email);
                $email->setSubject('Confirmación de cuenta');
                $email->setHtmlBody($template);
                $email->send();

                return $this->redirect(['register/send-mail']);
            } else {
                return $this->redirect(['register/resend-mail',[
                    'error' => 1001
                ]]);
            }
        }
    }
}
