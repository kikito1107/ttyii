<?php

use yii\db\Migration;

class m170119_064948_pro extends Migration
{
    public function up()
    {
        $this->createTable('{{%profile}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11)->defaultValue(null),
            'name' => $this->string(50)->notNull(),
            'lastname' => $this->string(50)->notNull(),
            'second_lastname' => $this->string(50)->notNull(),
            'email' => $this->string(100)->notNull(),
            'birthday' => $this->date()->notNull(),
            'address' => $this->string(250)->notNull(),
            'phone' => $this->string(100)->notNull(),
            'image_Photo' => $this->string(100)->notNull(),
            'image_license' => $this->string(100)->notNull(),
            'status' => $this->integer(1)->notNull(),
            'user_type' => $this->integer(1)->notNull(),
            'last_known_location' => $this->string(100)->defaultValue(null),
            'update_date' => $this->dateTime()->defaultValue(null),
            'create_date' => $this->dateTime()->notNull()
        ], 'ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1');

        $this->addForeignKey('{{%profile_ibfk_1}}' , '{{%profile}}' , 'user_id' , '{{%user}}' , 'id' );

    }

    public function down()
    {
        $this->dropTable('{{%profile}}');
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
