<?php

use yii\db\Migration;

class m170130_025248_historial extends Migration
{
    public function up()
    {
        $this->createTable('{{%historial}}',[
            'id' => $this->primaryKey(10),
            'tratamientos_id' => $this->integer(11),
            'sintomas_id' => $this->integer(11),
            'medicamentos_id'=> $this->integer(11),
            'paciente_id' => $this->integer(10),
            'medico_id' => $this -> integer(10),
            'update_date' => $this->dateTime()->defaultValue(null),
            'create_date' => $this->dateTime()->notNull(),
            'status'=> $this->integer(1)->notNull(),


        ], 'ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1');
        $this->addForeignKey('{{%citas_ibfk_1}}' , '{{%historial}}' , 'tratamientos_id' , '{{%tratamientos}}' , 'id' );
        $this->addForeignKey('{{%citas_ibfk_2}}' , '{{%historial}}' , 'sintomas_id' , '{{%sintoma}}' , 'id' );
        $this->addForeignKey('{{%citas_ibfk_3}}' , '{{%historial}}' , 'medicamentos_id' , '{{%medicamentos}}' , 'id' );
        $this->addForeignKey('{{%citas_ibfk_4}}' , '{{%historial}}' , 'medico_id' , '{{%medico}}' , 'id' );
        $this->addForeignKey('{{%citas_ibfk_5}}' , '{{%historial}}' , 'paciente_id' , '{{%paciente}}' , 'id' );

    }

    public function down()
    {
        echo "m170130_025248_historial cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
