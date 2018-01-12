<?php

use common\components\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),

            'status' => $this->smallInteger()->defaultValue(10),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'created_by' => $this->timestamp(),
            'updated_by' => $this->timestamp(),
            'deleted_by' => $this->timestamp(),
        ], $tableOptions);

        $this->createTable('{{%profile}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'ic_no' => $this->integer(),
            'contact' => $this->string(),
            'email' => $this->string()->notNull()->unique(),

            'status' => $this->smallInteger()->defaultValue(10),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'created_by' => $this->timestamp(),
            'updated_by' => $this->timestamp(),
            'deleted_by' => $this->timestamp(),
        ], $tableOptions);

        $this->insertFk();
    }

    public function down()
    {
        $this->customDrop();
    }

    public function insertFk() {
        $i = 1;
        $this->addForeignKey('fk'.$i++,'{{user}}','id','{{profile}}','id');
        $this->addForeignKey('fk'.$i++,'{{profile}}','id','{{user}}','id');

        $this->addForeignKey('fk'.$i++,'{{location}}','company_id','{{company}}','id');
        $this->addForeignKey('fk'.$i++,'{{efies}}','company_id','{{company}}','id');
        $this->addForeignKey('fk'.$i++,'{{company_pic}}','company_id','{{company}}','id');
        $this->addForeignKey('fk'.$i++,'{{company_pic}}','user_id','{{user}}','id');
        $this->addForeignKey('fk'.$i++,'{{user_attachment}}','user_id','{{user}}','id');
    }
}
