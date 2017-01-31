<?php

use yii\db\Migration;

class m170127_190210_citas extends Migration
{
    public function up()
    {
        $this->createTable('{{%citas}}', [
            'id' => $this->primaryKey(10),
            'paciente_id' => $this->integer(10)->notNull(),
            'medico_id' => $this->integer(10)->notNull(),
            'dia' => $this->dateTime()->notNull(),
            'hora' => $this->integer(2)->notNull(),
            'update_date' => $this->dateTime()->defaultValue(null),
            'create_date' => $this->dateTime()->notNull(),
            'status'=> $this->integer(1)->notNull(),

        ], 'ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1');
        $this->addForeignKey('{{%citas_ibfk_1}}' , '{{%citas}}', 'paciente_id' , '{{%paciente}}' , 'id' );
        $this->addForeignKey('{{%citas_ibfk_2}}' , '{{%citas}}' , 'medico_id' , '{{%medico}}' , 'id' );
    }


    public function down()
    {
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
