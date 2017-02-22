<?php

use yii\db\Migration;

class m170217_151040_notificacion extends Migration
{
    public function up()
    {
        $this->createTable('{{%notificaciones}}', [
            'id' => $this->primaryKey(11),
            'sintoma_id' => $this->integer(5)->notNull(),
            'medicamento_id' => $this->integer(5)->notNull(),
            'organo_id' => $this->integer(5)->notNull(),
            'tratamiento_id' => $this->integer(5)->notNull(),
            'status' => $this->integer(1)->notNull(),
            'descripcion'=> $this->string(50)->defaultValue(null),
            'medico_id' => $this->integer(5)->notNull(),
            'update_date' => $this->dateTime()->defaultValue(null),
            'create_date' => $this->dateTime()->notNull()
        ], 'ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1');

        $this->addForeignKey('fk_notificacion_id1', '{{%notificaciones}}', 'sintoma_id', '{{%sintoma}}', 'id');
        $this->addForeignKey('fk_notificacion_id2', '{{%notificaciones}}', 'medicamento_id', '{{%medicamento}}', 'id');
        $this->addForeignKey('fk_notificacion_id3', '{{%notificaciones}}', 'organo_id', '{{%organo}}', 'id');
        $this->addForeignKey('fk_notificacion_id4', '{{%notificaciones}}', 'tratamiento_id', '{{%tratamiento}}', 'id');
        $this->addForeignKey('fk_notificacion_id5', '{{%notificaciones}}', 'medico_id', '{{%medico}}', 'id');


    }

    public function down()
    {
    }

}
