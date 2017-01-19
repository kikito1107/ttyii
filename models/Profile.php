<?php

namespace app\models;

use messaging\shared\helpers\Dates;
use Yii;
use auth\models\User;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

/**
 * This is the model class for table "{{%profile}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 * @property string $lastname
 * @property string $second_lastname
 * @property string $email
 * @property string $birthday
 * @property string $address
 * @property string $phone
 * @property string $image_Photo
 * @property string $image_license
 * @property integer $status
 * @property integer $user_type
 * @property string $last_known_location
 * @property string $update_date
 * @property string $create_date
 * @property User user
 */
class Profile extends ActiveRecord
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
     * @var UploadedFile $imageLicense
     */
    public $imagePhoto;

    /**
     * @var UploadedFile $imageLicense
     */
    public $imageLicense;

    /**
     * @var string $password Contraseña
     */
    public $password;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%profile}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'status', 'user_type'], 'integer'],
            [['name', 'lastname', 'second_lastname', 'birthday', 'address', 'phone', 'image_Photo', 'user_type'], 'required'],
            [['birthday', 'update_date', 'create_date', 'last_known_location'], 'safe'],
            [['name', 'lastname', 'second_lastname'], 'string', 'max' => 50],
            [['email', 'phone'], 'string', 'max' => 100],
            [['email'], 'email'],
            [['address'], 'string', 'max' => 250],
            [['image_license', 'image_Photo'], 'string', 'max' => 100],
            [['imagePhoto', 'imageLicense'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, pdf, docx, xlsx, pptx, jpeg'],
            [['email'], 'unique', 'on' => 'create', 'targetClass' => 'auth\models\User', 'message' => Yii::t('app', 'Este email ya se encuentra registrado')],
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
            'name' => Yii::t('app', 'Nombre'),
            'lastname' => Yii::t('app', 'Apellido paterno'),
            'second_lastname' => Yii::t('app', 'Apellido materno'),
            'email' => Yii::t('app', 'Correo electrónico'),
            'birthday' => Yii::t('app', 'Fecha de nacimiento'),
            'address' => Yii::t('app', 'Domicilio'),
            'phone' => Yii::t('app', 'Teléfono'),
            'image_Photo' => Yii::t('app', 'Foto de perfil'),
            'image_license' => Yii::t('app', 'Imagen de la licencia'),
            'imagePhoto' => Yii::t('app', 'Foto de perfil'),
            'imageLicense' => Yii::t('app', 'Imagen de la licencia'),
            'status' => Yii::t('app', 'Status'),
            'user_type' => Yii::t('app', 'Tipo de usuario'),
            'update_date' => Yii::t('app', 'Fecha de actualización'),
            'create_date' => Yii::t('app', 'Fecha de creación'),
        ];
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
        $this->password = $this->generatePassword();
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
            self::USER_SUPERVISOR => Yii::t('app', 'Supervisor'),
            self::USER_OPERATOR => Yii::t('app', 'Operador'),
            self::USER_CLIENT => Yii::t('app', 'Cliente')
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
     * Sube un archivo al servidor
     * @param $image
     * @param $attribute
     */
    public function upload($image, $attribute)
    {
        if(isset($this->{$attribute})) {
            $path = Yii::getAlias('@webroot') . DIRECTORY_SEPARATOR . 'uploads/image' . DIRECTORY_SEPARATOR . $this->{$attribute};
            if(file_exists($path)){
                unlink('uploads/image/' . $this->{$attribute});
            }
        }

        $filename = md5(time() . $this->{$image}->baseName) . '.' . $this->{$image}->extension;
        $this->{$image}->saveAs('uploads/image/' . $filename);
        $this->{$attribute} = $filename;
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        $this->name = rtrim($this->name);
        $this->lastname = trim($this->lastname);
        $this->second_lastname = trim($this->second_lastname);

        if(parent::beforeSave($insert)){
            $now = date('Y-m-d H:i:s');
            $date = Dates::convertSqlDate($this->birthday);
            $this->birthday = $date;

            if ($this->isNewRecord) {
                $this->create_date = $now;
            }else{
                $this->update_date = $now;
            }
            return true;
        }
        return false;
    }

    /**
     * Devuelve el nombre completo del usuario
     * @return string
     */
    public function getFullName()
    {
        return "{$this->name} {$this->lastname} {$this->second_lastname}";
    }

    /**
     * Devuelve la latitude del usuario
     * @return mixed
     */
    public function getLatitude()
    {
        $latLng = explode(',', $this->last_known_location);
        return $latLng[0];
    }

    /**
     * DEvuelve la longitude del usuario
     * @return mixed
     */
    public function getLongitude()
    {
        $latLng = explode(',', $this->last_known_location);
        return $latLng[1];
    }
}
