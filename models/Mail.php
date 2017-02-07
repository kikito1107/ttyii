<?php
/**
 * Created by PhpStorm.
 * User: saul
 * Date: 06/02/17
 * Time: 20:43
 */
namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 */
class Mail extends Model
{
    public $username;
    public $name;
    public $password;
    public $email;
    public $subject;
    public $body;


    public function rules()
    {
        return [
            [['name', 'email', 'username'], 'required '],
            [['email'], 'email'],

        ];
    }

    public function contact($email)
    {
        $message = '<p>'.$this->email.'</p>';
        $message.= '<p>'.$this->username.'</p>';

        if ($this->validate()){
            Yii::$app->mailer->compose('@app/mail/layouts/html', ['content' => $message])
                ->setTo($email)
                ->setFrom([$this->email => $this->name])
                ->setSubject($this->subject)
                ->setTextBody($this->body)
                ->send();
            return true;
        } else {
            return false;
        }
    }
}