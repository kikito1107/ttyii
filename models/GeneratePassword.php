<?php
/**
 * Created by PhpStorm.
 * User: enriqueramirez
 * Date: 16/08/16
 * Time: 11:27 AM
 */

namespace app\models;


use Yii;
use yii\base\Model;

class GeneratePassword extends Model
{

    /**
     * @var
     */
    public $email;

    /**
     * @var
     */
    public $password;

    /**
     * @var
     */
    public $passwordRepeat;

    /**
     * @inheritdoc
     */
    public function rules()
    {
       return [
           [['email', 'password', 'passwordRepeat'], 'required'],
           [['passwordRepeat'], 'compare', 'compareAttribute' => 'password', 'message' => Yii::t('app', 'Las contraseñas no coinciden')]
       ];
    }
}