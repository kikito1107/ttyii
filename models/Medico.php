<?php

namespace app\models;

use auth\models\User;
use messaging\shared\helpers\Dates;
use Yii;

/**
 * This is the model class for table "{{%medico}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $username
 * @property string $nombre
 * @property string $paterno
 * @property string $materno
 * @property integer $genero
 * @property string $cumple
 * @property string $direccion
 * @property string $telefono
 * @property string $celular
 * @property string $email
 * @property string $password
 * @property string $image_Photo
 * @property integer $status
 * @property integer $user_type
 * @property string $update_date
 * @property string $create_date
 * @property string $cedula
 * @property string $escuela
 * @property string $especialidad
 * @property string $descripcion
 */
class Medico extends \yii\db\ActiveRecord
{
    /**
     * Usuario con permiso de administrador
     */
    const USER_ADMINISTRATOR = 1;

    /**
     * usuario con permiso de supervisor
     */
    const USER_SUPERVISOR = 2;

    /**
     * Usuario con permiso de operador o conductor
     */
    const USER_OPERATOR = 3;

    /**
     * Usuario con permiso de cliente
     */
    const USER_CLIENT = 4;

    /**
     * Estatus inactivo
     */
    const STATUS_INACTIVE = 0;

    /**
     * Estatus activo
     */
    const STATUS_ACTIVE = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%medico}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'genero', 'status', 'user_type'], 'integer'],
            [['username','email'], 'required'],
            [['cumple', 'update_date', 'create_date'], 'safe'],
            [['descripcion'], 'string'],
            [['username', 'nombre', 'paterno', 'materno', 'cedula'], 'string', 'max' => 50],
            [['direccion'], 'string', 'max' => 250],
            [['telefono', 'celular'], 'string', 'max' => 10],
            [['email', 'image_Photo'], 'string', 'max' => 100],
            [['password'], 'string', 'max' => 15],
            [['escuela', 'especialidad'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'username' => Yii::t('app', 'Nombre de usuario'),
            'nombre' => Yii::t('app', 'Nombre'),
            'paterno' => Yii::t('app', 'Apellido paterno'),
            'materno' => Yii::t('app', 'Apellido materno'),
            'genero' => Yii::t('app', 'Género'),
            'cumple' => Yii::t('app', 'Fecha de nacimiento'),
            'direccion' => Yii::t('app', 'Dirección'),
            'telefono' => Yii::t('app', 'Teléfono fijo'),
            'celular' => Yii::t('app', 'Teléfono celular'),
            'email' => Yii::t('app', 'Correo electrónico'),
            'password' => Yii::t('app', 'Contraseña'),
            'image_Photo' => Yii::t('app', 'Foto de perfil'),
            'status' => Yii::t('app', 'status'),
            'user_type' => Yii::t('app', 'Tipo de usuario'),
            'update_date' => Yii::t('app', 'Fecha de actualización'),
            'create_date' => Yii::t('app', 'Fecha de registro en el sistema'),
            'cedula' => Yii::t('app', 'Cédula profesional'),
            'escuela' => Yii::t('app', 'Nombre de la escuela'),
            'especialidad' => Yii::t('app', 'Especialidad'),
            'descripcion' => Yii::t('app', 'Breve descripción'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        $this->username = rtrim($this->username);

        if(parent::beforeSave($insert)){
            $now = date('Y-m-d H:i:s');
            $this->create_date = $now;
            $this->status = Medico::STATUS_ACTIVE;
            $this->user_type = 2;
            $this->password = $this->generatePassword();

            if ($this->isNewRecord) {
                $_userId = $this->registerUser();
                $this->setAttribute('user_id', $_userId);

                $template = \Yii::$app->view->render('@app/mail/layouts/medico', [
                    'data' => [
                        'name'=> $this->username,
                        'password' => $this->password,
                        'email'=> $this->email
                    ]
                ]);

                $email = \Yii::$app->mailer->compose();
                $email->setFrom('kikito110792@gmail.com');
                $email->setTo($this->email);
                $email->setSubject('Datos de inicio de sesión - Sistema homeopático');
                $email->setHtmlBody($template);
                $email->send();
            }else{
                $this->update_date = $now;
            }
            return true;
        }
        return false;
    }

    /**
     * Genera un usuario
     *
     * Creamos una instancia de
     * @return bool|int
     */
    public function registerUser()
    {
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $password = $this->password;
        $user->setPassword($password);
        $user->generateAuthKey();
        $user->status = User::STATUS_ACTIVE;
        $user->save();

        if($user->save()) {
            $auth = Yii::$app->authManager;
            $role = $auth->getRole('supervisor');
            $auth->assign($role, $user->id);
            return $user->id;
        }

        return false;
    }

    /**
     * Genera un password aleatorio
     * @return string
     */
    private function generatePassword()
    {
        $password = substr(md5(microtime()), 1, 8);
        return $password;
    }

    /**
    * Devuelve el tipo de role que le pertenece al usuario
    * @return string
    */
    public function getUserRole()
    {
        switch ($this->user_type) {
            case $this::USER_ADMINISTRATOR:
                $role = "administrator";
                break;
            case $this::USER_SUPERVISOR:
                $role = "supervisor";
                break;
            case $this::USER_OPERATOR:
                $role = "operator";
                break;
            case $this::USER_CLIENT:
                $role = "client";
                break;
            default:
                $role = "guest";
                break;
        }
    }
}
