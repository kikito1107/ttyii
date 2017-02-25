<?php

use yii\db\Migration;

class m170119_154506_medicamento extends Migration
{
    public function up()
    {
        $this->createTable('{{%medicamento}}', [
            'id' => $this->primaryKey(11),
            'nombre' => $this->string(50)->notNull(),
            'abreviatura' => $this->string(6)->notNull(),
            'status' => $this->integer(1)->notNull(),
            'descripcion'=> $this->string(50)->defaultValue(null),
            'update_date' => $this->dateTime()->defaultValue(null),
            'create_date' => $this->dateTime()->notNull()
        ], 'ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1');
    }

    public function down()
    {
    }
}
