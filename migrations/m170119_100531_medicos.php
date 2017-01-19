<?php

use yii\db\Migration;

class m170119_100531_medicos extends Migration
{
    public function up()
    {
        $this->createTable('{{%medico}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11)->defaultValue(null),
            'username' => $this->string(50)->notNull(),
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
            'cedula' => $this->string(50)->null(),
            'escuela' => $this->string(150)->null(),
            'especialidad' => $this->string(150)->null(),
            'descripcion' => $this->text()->defaultValue(null),
        ], 'ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1');

        $this->addForeignKey('{{%medico_ibfk_1}}' , '{{%medico}}' , 'user_id' , '{{%user}}' , 'id' );
    }

    public function down()
    {
        $this->dropTable('{{%medico}}');
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
