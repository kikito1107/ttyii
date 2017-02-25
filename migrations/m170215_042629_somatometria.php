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
            'menstruacion' => $this->integer(10)->notNull(),
            'update_date' => $this->dateTime()->defaultValue(null),
            'create_date' => $this->dateTime()->notNull(),

        ],'ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1');
        $this->addForeignKey('{{%sometria_ibfk_1}}' , '{{%somatometria}}', 'paciente_id' , '{{%paciente}}' , 'id' );
    }

    public function down()
    {
        $this->dropTable('{{%somatometria}}');
    }
}
