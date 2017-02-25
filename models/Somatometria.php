<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%somatometria}}".
 *
 * @property integer $id
 * @property integer $paciente_id
 * @property integer $estatura
 * @property integer $peso
 * @property integer $temperatura
 * @property integer $frecCardi
 * @property string $menstruacion
 */
class Somatometria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%somatometria}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['paciente_id', 'estatura', 'peso', 'temperatura', 'frecCardi'], 'required'],
            [['estatura'], 'string'],
            [['paciente_id', 'peso', 'temperatura', 'frecCardi', 'menstruacion'], 'integer'],
            [['update_date', 'create_date'], 'safe'],
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
            'estatura' => Yii::t('app', 'Estatura'),
            'peso' => Yii::t('app', 'Peso'),
            'temperatura' => Yii::t('app', 'Temperatura'),
            'frecCardi' => Yii::t('app', 'Frec Cardi'),
            'menstruacion' => Yii::t('app', 'Menstruacion'),
        ];
    }
}
