<?php

use yii\db\Migration;

class m170222_001349_consulta extends Migration
{
    public function up()
    {
        $this->createTable("{{%consulta}}", [
            'id' => $this->primaryKey(),
            'paciente_id' => $this->integer(11)->defaultValue(null),
            'medico_id' => $this->integer(11)->defaultValue(null),
            'cita_id' => $this->integer(11)->defaultValue(null),
            'update_date' => $this->dateTime()->defaultValue(null),
            'create_date' => $this->dateTime()->notNull(),


        ], 'ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1');

        $this->addForeignKey('{{%paciente_ibfk_1}}' , '{{%consulta}}' , 'paciente_id' , '{{%paciente}}' , 'id' );
        $this->addForeignKey('{{%medico_ibfk_1}}' , '{{%consulta}}' , 'medico_id' , '{{%medico}}' , 'id' );
        $this->addForeignKey('{{%cita_ibfk_1}}' , '{{%consulta}}' , 'cita_id' , '{{%citas}}' , 'id' );

    }

    public function down()
    {
        echo "m170222_001349_consulta No se puede revertir.\n";

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
