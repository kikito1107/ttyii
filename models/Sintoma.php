<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%sintoma}}".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $organo
 * @property string $organo_padre
 * @property string $descripcion
 * @property string $update_date
 * @property string $create_date
 */
class Sintoma extends \yii\db\ActiveRecord
{
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
        return '{{%sintoma}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'organo_padre'], 'required'],
            [['update_date', 'create_date'], 'safe'],
            [['status'], 'integer'],
            [['nombre', 'descripcion'], 'string', 'max' => 50],
            [['organo', 'organo_padre'], 'string', 'max' => 6],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nombre' => Yii::t('app', 'Nombre'),
            'organo' => Yii::t('app', 'Organo'),
            'organo_padre' => Yii::t('app', 'Organo Padre'),
            'status' => Yii::t('app', 'status'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'update_date' => Yii::t('app', 'Update Date'),
            'create_date' => Yii::t('app', 'Create Date'),
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
            $this->create_date = $now;
            if ($this->isNewRecord) {

            }else{
                $this->update_date = $now;
            }
            return true;
        }
        return false;
    }
}


