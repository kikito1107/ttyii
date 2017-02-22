<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%notificaciones}}".
 *
 * @property integer $id
 * @property integer $sintoma_id
 * @property integer $medicamento_id
 * @property integer $organo_id
 * @property integer $tratamiento_id
 * @property integer $status
 * @property string $descripcion
 * @property integer $medico_id
 * @property string $update_date
 * @property string $create_date
 */
class Notificaciones extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%notificaciones}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sintoma_id', 'medicamento_id', 'organo_id', 'tratamiento_id', 'status', 'medico_id'], 'integer'],
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
            'sintoma_id' => Yii::t('app', 'Sintoma ID'),
            'medicamento_id' => Yii::t('app', 'Medicamento ID'),
            'organo_id' => Yii::t('app', 'Organo ID'),
            'tratamiento_id' => Yii::t('app', 'Tratamiento ID'),
            'status' => Yii::t('app', 'Status'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'medico_id' => Yii::t('app', 'Medico ID'),
            'update_date' => Yii::t('app', 'Update Date'),
            'create_date' => Yii::t('app', 'Create Date'),
        ];
    }
}
