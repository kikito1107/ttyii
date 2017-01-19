<?php

use yii\db\Migration;

class m160420_183802_profile extends Migration
{
    public function up()
    {
        $this->createTable('{{%paciente}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11)->defaultValue(null),
            'nombre' => $this->string(50)->notNull(),
            'paterno' => $this->string(50)->notNull(),
            'materno' => $this->string(50)->notNull(),
            'genero' => $this->integer(1)->notNull(),
            'cumple' => $this->dateTime()->notNull(),
            'direccion' => $this->string(250)->null(),
            'telefono' => $this->string(10)->null(),
            'celular' => $this->string(10)->null(),
            'email' => $this->string(100)->notNull(),
            'password' => $this->string(15)->notNull(),
            'image_Photo' => $this->string(100)->null(),
            'status' => $this->integer(1)->notNull(),
            'user_type' => $this->integer(1)->notNull(),
            'update_date' => $this->dateTime()->defaultValue(null),
            'create_date' => $this->dateTime()->notNull(),
            'nss' => $this->string(50)->null(),
            'alergias' => $this->text()->defaultValue(null),
            'notificaciones' => $this->boolean()->null()
        ], 'ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1');

        $this->addForeignKey('{{%paciente_ibfk_1}}' , '{{%paciente}}' , 'user_id' , '{{%user}}' , 'id' );

    }

    public function down()
    {
    }
}
