<?php

namespace app\controllers;

use Yii;

class RegisterController extends \yii\web\Controller
{
    public function actionSendMail()
    {
        Yii::$app->mailer->compose('@app/mail/layouts/html', ['content' => array(
                    'fullname' => 'enrique saul ramirez gonzalez',
                    'user_id' => 1,
                    'email' => 'enrique@mail.com'
                )])
                ->setFrom('kikito110792@gmail.com')
                ->setTo('enriquesaul1@hotmail.com')
                ->setSubject('Confirmación de la cuenta')
                ->send();
        return $this->render('send_success');
    }

}
