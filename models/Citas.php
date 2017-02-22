<?php

namespace app\models;

use DateTime;
use messaging\shared\helpers\Dates;
use Yii;

/**
 * This is the model class for table "{{%citas}}".
 *
 * @property integer $id
 * @property integer $paciente_id
 * @property integer $medico_id
 * @property string $dia
 * @property integer $hora
 * @property string $update_date
 * @property string $create_date
 * @property integer $status
 */
class Citas extends \yii\db\ActiveRecord
{
    const STATUS_APROVED = 3;

    const STATUS_CANCEL = 2;

    const STATUS_PENDING = 1;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%citas}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dia', 'hora', 'paciente_id', 'medico_id'], 'required'],
            [['dia'], 'date', 'minString' => date('d/m/y', strtotime('3 Days')), 'maxString' => date('d/m/y', strtotime("3 Months")), 'format' => 'd/m/y'],
            [['paciente_id', 'medico_id', 'hora', 'status'], 'integer'],
            [['dia', 'update_date', 'create_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'paciente_id' => Yii::t('app', 'Paciente'),
            'medico_id' => Yii::t('app', 'Médico'),
            'dia' => Yii::t('app', 'Día'),
            'hora' => Yii::t('app', 'Hora'),
            'update_date' => Yii::t('app', 'Fecha de actualización'),
            'create_date' => Yii::t('app', 'Fecha de creación'),
            'status' => Yii::t('app', 'Estado'),
        ];
    }

    public function beforeSave($insert)
    {
        $dia = date("d-m-y", strtotime(str_replace('/','-',$this->dia)));
        $mes = date("m", strtotime(str_replace('/','-',$this->dia)));
        $ano = date("y", strtotime(str_replace('/','-',$this->dia)));

        if(parent::beforeSave($insert)){

            $this->status = Citas::STATUS_PENDING;
            $now = date('Y-m-d H:i:s');

            $this->dia = Dates::convertSqlDate($this->dia);

            $this->dia = date("Y-m-d H:i:s", strtotime(str_replace('/','-',$this->dia)));


            if ($this->isNewRecord) {

                $this->create_date = $now;
            }else{
                $this->update_date = $now;
            }
            return true;
        }
        return false;
    }

    public static function getHours()
    {
        return [
            1 => "8:00 horas",
            2 => "9:00 horas",
            3 => "10:00 horas",
            4 => "11:00 horas",
            5 => "12:00 horas",
            6 => "13:00 horas",
            7 => "14:00 horas",
            8 => "15:00 horas",
            9 => "16:00 horas",
            10 => "17:00 horas",
            11 => "18:00 horas",
            12 => "19:00 horas",
            13 => "20:00 horas"
        ];
    }
}
