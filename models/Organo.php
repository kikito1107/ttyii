<?php

namespace app\models;

use messaging\shared\helpers\Dates;
use Yii;

/**
 * This is the model class for table "{{%organo}}".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $update_date
 * @property string $create_date
 */
class Organo extends \yii\db\ActiveRecord
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
        return '{{%organo}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'status'], 'required'],
            [['status'], 'integer'],
            [['update_date', 'create_date'], 'safe'],
            [['nombre'], 'string', 'max' => 50],
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
            'status' => Yii::t('app', 'estatus'),
            'update_date' => Yii::t('app', 'Fecha de actualización'),
            'create_date' => Yii::t('app', 'Fecha de creación'),
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
            if ($this->isNewRecord) {
                $this->create_date = $now;
            }else{
                $this->update_date = $now;
            }
            return true;
        }
        return false;
    }
}
