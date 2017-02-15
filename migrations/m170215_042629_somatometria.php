<?php

use yii\db\Migration;

class m170215_042629_somatometria extends Migration
{
    public function up()
    {
        $this->createTable('{{%somatometria}}', [
            'id' => $this->primaryKey(10),
            'paciente_id' => $this->integer(10)->notNull(),
            'estatura' => $this->integer(10)->notNull(),
            'peso' => $this->integer(10)->notNull(),
            'temperatura' => $this->integer(10)->notNull(),
            'frecCardi' => $this->integer(10)->notNull(),
            'menstruacion' => $this->dateTime(),

        ],'ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1');
        $this->addForeignKey('{{%sometria_ibfk_1}}' , '{{%sometria}}', 'paciente_id' , '{{%paciente}}' , 'id' );
    }

    public function down()
    {
        echo "m170215_042629_somatometria No se puede revertir.\n";

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
