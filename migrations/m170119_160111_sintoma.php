<?php

use yii\db\Migration;

class m170119_160111_sintoma extends Migration
{
    public function up()
    {
        $this->createTable('{{%sintoma}}', [
            'id' => $this->primaryKey(11),
            'nombre' => $this->string(50)->notNull(),
            'organo' => $this->string(6)->notNull(),
            'organo_padre' => $this->string(6)->notNull(),
            'descripcion'=> $this->string(50)->defaultValue(null),
            'update_date' => $this->dateTime()->defaultValue(null),
            'create_date' => $this->dateTime()->notNull()
        ], 'ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1');

//        $this->addForeignKey('fk_sintoma_id', '{{%sintoma}}', 'organo_padre', '{{%sintoma}}', 'id');

        $this->createTable('{{%organo}}', [
            'id' => $this->primaryKey(11),
            'nombre' => $this->string(50)->notNull(),
            'update_date' => $this->dateTime()->defaultValue(null),
            'create_date' => $this->dateTime()->notNull()
        ], 'ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1');

        $this->addForeignKey('fk_sintoma_id', '{{%sintoma}}', 'organo_padre', '{{%organo}}', 'id');

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
