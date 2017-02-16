<?php

use yii\db\Migration;

class m170216_143237_tratamiento extends Migration
{
    public function up()
    {
        $this->createTable('{{%tratamiento}}', [
            'id' => $this->primaryKey(11),
            'sintoma_id' => $this->integer(5)->notNull(),
            'medicamento_id' => $this->integer(5)->notNull(),
            'organo_padre_id' => $this->integer(5)->notNull(),
            'ponderacion' => $this->integer(1)->notNull(),
            'status' => $this->integer(1)->notNull(),
            'descripcion'=> $this->string(50)->defaultValue(null),
            'update_date' => $this->dateTime()->defaultValue(null),
            'create_date' => $this->dateTime()->notNull()
        ], 'ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1');

        $this->addForeignKey('fk_tratamiento_id1', '{{%tratamiento}}', 'sintoma_id', '{{%sintoma}}', 'id');
        $this->addForeignKey('fk_tratamiento_id2', '{{%tratamiento}}', 'medicamento_id', '{{%medicamento}}', 'id');
        $this->addForeignKey('fk_tratamiento_id3', '{{%tratamiento}}', 'organo_padre_id', '{{%organo}}', 'id');
    }

    public function down()
    {

    }
}
