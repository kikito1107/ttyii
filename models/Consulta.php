<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%consulta}}".
 *
 * @property integer $id
 * @property integer $paciente_id
 * @property integer $medico_id
 * @property integer $cita_id
 * @property string $create_date
 * @property string $update_date
 */
class Consulta extends \yii\db\ActiveRecord
{
    public $sintoma;

    public $medicamento;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%consulta}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['paciente_id', 'medico_id', 'cita_id'], 'integer'],
            [['create_date'], 'required'],
            [['sintomas'], 'string'],
            [['create_date', 'update_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'paciente_id' => Yii::t('app', 'Paciente ID'),
            'medico_id' => Yii::t('app', 'Medico ID'),
            'cita_id' => Yii::t('app', 'Cita ID'),
            'create_date' => Yii::t('app', 'Create Date'),
            'update_date' => Yii::t('app', 'Update Date'),
        ];
    }
}
