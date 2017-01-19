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
            [['nombre'], 'required'],
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
