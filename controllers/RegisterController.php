<?php

namespace app\controllers;

use Yii;

class RegisterController extends \yii\web\Controller
{
    public function actionSendMail()
    {
//        Yii::$app->mailer->compose('@app/mail/layouts/html', ['content' => [
//                    'name'=>'enrique saul ramirez gonzalez',
//                    'id'=> 1,
//                    'email'=> 'enrique@mail.com']])
//                ->setFrom('kikito110792@gmail.com')
//                ->setTo('enriquesaul1@hotmail.com')
//                ->setSubject('Confirmación de la cuenta')
//                ->send();
//

        $template = $this->render('@app/mail/layouts/html', [
            'data' => [
                'name'=>'enrique saul ramirez gonzalez',
                'id'=> 1,
                'email'=> 'enrique@mail.com'
            ]
        ]);
        $email = \Yii::$app->mailer->compose();
        $email->setFrom('kikito110792@gmail.com');
        $email->setTo('enriquesaul1@hotmail.com');
        $email->setSubject('Confirmación de cuenta');
        $email->setHtmlBody($template);
        $email->send();

        return $this->render('send_success');
    }

}
