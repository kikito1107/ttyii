<?php

use yii\db\Migration;

class m170302_161344_repertorizacion extends Migration
{
    public function up()
    {
        $this->createTable('{{%repertorizacion}}', [
            'id' => $this->primaryKey(),
            'medico_id' => $this->integer(11)->defaultValue(null),
            'paciente_id' => $this->integer(11)->defaultValue(null),
            'sintomas' => $this->text()->defaultValue(null),
            'update_date' => $this->dateTime()->defaultValue(null),
            'create_date' => $this->dateTime()->notNull(),

        ], 'ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1');

        $this->addForeignKey('{{%paciente_ibfk_1}}' , '{{%repertorizacion}}' , 'paciente_id' , '{{%paciente}}' , 'id' );
        $this->addForeignKey('{{%medico_ibfk_1}}' , '{{%repertorizacion}}' , 'medico_id' , '{{%medico}}' , 'id' );
    }

    public function down()
    {
    }
}
