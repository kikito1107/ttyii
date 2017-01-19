<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%medicamento}}".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $abreviatura
 * @property string $descripcion
 * @property string $update_date
 * @property string $create_date
 */
class Medicamento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%medicamento}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'abreviatura'], 'required'],
            [['update_date', 'create_date'], 'safe'],
            [['nombre', 'descripcion'], 'string', 'max' => 50],
            [['abreviatura'], 'string', 'max' => 6],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'id'),
            'nombre' => Yii::t('app', 'Nombre'),
            'abreviatura' => Yii::t('app', 'Abreviatura'),
            'descripcion' => Yii::t('app', 'Descripción'),
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
