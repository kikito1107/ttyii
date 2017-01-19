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
        $this->nombre = rtrim($this->nombre);

        if(parent::beforeSave($insert)){
            $now = date('Y-m-d H:i:s');

            $date = Dates::convertSqlDate($this->cumple);
            $this->cumple = $date;
            $this->create_date = $now;
            $this->status = 1;
            $this->user_type = 2;
            if ($this->isNewRecord) {
                $_userId = $this->registerUser();
                $this->setAttribute('user_id', $_userId);
            }else{
                $this->update_date = $now;
                $user = new User();
                $user->setPassword($password = '123456');

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
        $password = '123456';
        $user->setPassword($password);
        $user->generateAuthKey();
        $user->status = 2;
        if($user->save()) {
            $auth = Yii::$app->authManager;
            $role = $auth->getRole('medico');
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
}
