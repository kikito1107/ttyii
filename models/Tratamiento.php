<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%tratamiento}}".
 *
 * @property integer $id
 * @property integer $sintoma_id
 * @property integer $medicamento_id
 * @property integer $organo_padre_id
 * @property integer $ponderacion
 * @property integer $status
 * @property string $descripcion
 * @property string $update_date
 * @property string $create_date
 */
class Tratamiento extends \yii\db\ActiveRecord
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
        return '{{%tratamiento}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sintoma_id', 'medicamento_id', 'organo_padre_id', 'ponderacion', 'status', 'create_date'], 'required'],
            [['sintoma_id', 'medicamento_id', 'organo_padre_id', 'ponderacion', 'status'], 'integer'],
            [['update_date', 'create_date'], 'safe'],
            [['descripcion'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'sintoma_id' => Yii::t('app', 'Sintoma'),
            'medicamento_id' => Yii::t('app', 'Medicamento'),
            'organo_padre_id' => Yii::t('app', 'Organo'),
            'ponderacion' => Yii::t('app', 'Ponderacion'),
            'status' => Yii::t('app', 'Status'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'update_date' => Yii::t('app', 'Update Date'),
            'create_date' => Yii::t('app', 'Create Date'),
        ];
    }

    public static function getPonderacion()
    {
        return [
            1 => "Menor efectividad",
            2 => "Normal efectividad",
            3 => "Mayor efectivadad",
        ];
    }
}
