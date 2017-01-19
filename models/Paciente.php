<?php

namespace app\models;

use auth\models\User;
use messaging\shared\helpers\Dates;
use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "{{%paciente}}".
 *
 * @property integer $id
 * @property integer $user_id
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
 * @property string $nss
 * @property string $alergias
 * @property integer $notificaciones
 * @property User user
 */
class Paciente extends \yii\db\ActiveRecord
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
        return '{{%paciente}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'genero', 'status', 'user_type'], 'integer'],
            [['nombre', 'paterno', 'materno', 'genero'], 'required'],
            [['cumple', 'update_date', 'create_date'], 'safe'],
            [['alergias'], 'string'],
            [['nombre', 'paterno', 'materno', 'nss'], 'string', 'max' => 50],
            [['direccion'], 'string', 'max' => 250],
            [['telefono', 'celular'], 'string', 'max' => 10],
            [['email', 'image_Photo'], 'string', 'max' => 100],
            [['email'], 'email'],
            [['password'], 'string', 'max' => 15],
            [['email'], 'unique', 'on' => 'create', 'targetClass' => 'auth\models\User', 'message' => Yii::t('app', 'Este email ya se encuentra registrado')]
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
            'nombre' => Yii::t('app', 'Nombre'),
            'paterno' => Yii::t('app', 'Apellido paterno'),
            'materno' => Yii::t('app', 'Apellido materno'),
            'genero' => Yii::t('app', 'Género'),
            'cumple' => Yii::t('app', 'Fecha de nacimiento'),
            'direccion' => Yii::t('app', 'Dirección'),
            'telefono' => Yii::t('app', 'Teléfono'),
            'celular' => Yii::t('app', 'Teléfono celular'),
            'email' => Yii::t('app', 'Correo electrónico'),
            'password' => Yii::t('app', 'Contraseña'),
            'image_Photo' => Yii::t('app', 'Foto de perfil'),
            'status' => Yii::t('app', 'Status'),
            'user_type' => Yii::t('app', 'Tipo de usuario'),
            'update_date' => Yii::t('app', 'Fecha de actualización'),
            'create_date' => Yii::t('app', 'Fecha de creación'),
            'nss' => Yii::t('app', 'Nùmero de seguridad social'),
            'alergias' => Yii::t('app', 'Alergias'),
            'notificaciones' => Yii::t('app', 'Notificaciones pendientes'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        $this->nombre = rtrim($this->nombre);

        if(parent::beforeSave($insert)){
            $now = date('Y-m-d H:i:s');

            $date = Dates::convertSqlDate($this->cumple);
            $this->cumple = $date;
            $this->create_date = $now;
            $this->status = 1;
            $this->user_type = 3;
            if ($this->isNewRecord) {
                $_userId = $this->registerUser();
                $this->setAttribute('user_id', $_userId);
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
        $user->username = $this->email;
        $user->email = $this->email;
        $user->setPassword('123456');
        $user->generateAuthKey();
        $user->status = $this::STATUS_ACTIVE;

        if($user->save()) {
            $auth = Yii::$app->authManager;
            $role = $auth->getRole($this->getUserRole());
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

        return $role;
    }

    /**
     * Convierte una fecha en formato para guardar en mysql Y-m-d
     * @param $date
     * @return mixed
     */
    public static function convertSqlDate($date)
    {
        $time = strtotime($date);
        $newDate = date('Y-m-d', $time);
        return $newDate;
    }

    /**
     * Devuelve un listado de tipo de usuarios
     * @return array
     */
    public static function getUserType()
    {
        return [
            self::USER_ADMINISTRATOR => Yii::t('app', 'Administrador'),
            self::USER_MEDICO => Yii::t('app', 'Supervisor'),
            self::USER_PACIENTE => Yii::t('app', 'Operador')
        ];
    }

    /**
     * Relación con la tabla de usuarios
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * Devuelve el nombre completo del usuario
     * @return string
     */
    public function getFullName()
    {
        return "{$this->nombre} {$this->paterno} {$this->materno}";
    }
}
