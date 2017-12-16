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

        $this->createTable('{{%company}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'address' => $this->string(),
            'city' => $this->string(),
            'poscode' => $this->integer(),
            'state' => $this->string(),
            'country' => $this->string(),
            'contact' => $this->string(),
            'fax' => $this->string(),
            'email' => $this->string()->notNull()->unique(),
            'email_secondary' => $this->string(),

            'status' => $this->smallInteger()->defaultValue(10),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'created_by' => $this->timestamp(),
            'updated_by' => $this->timestamp(),
            'deleted_by' => $this->timestamp(),
        ], $tableOptions);

        $this->createTable('{{%company_pic}}', [
            'id' => $this->primaryKey(),
            'company_id' => $this->string(),
            'user_id' => $this->string(),

            'status' => $this->smallInteger()->defaultValue(10),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'created_by' => $this->timestamp(),
            'updated_by' => $this->timestamp(),
            'deleted_by' => $this->timestamp(),
        ], $tableOptions);

        $this->createTable('{{%location}}', [
            'id' => $this->primaryKey(),
            'company_id' => $this->string(),
            'name' => $this->string(),

            'status' => $this->smallInteger()->defaultValue(10),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'created_by' => $this->timestamp(),
            'updated_by' => $this->timestamp(),
            'deleted_by' => $this->timestamp(),
        ], $tableOptions);

        $this->createTable('{{%attachment}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'description' => $this->string(),
            'file_path' => $this->string(),

            'status' => $this->smallInteger()->defaultValue(10),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'created_by' => $this->timestamp(),
            'updated_by' => $this->timestamp(),
            'deleted_by' => $this->timestamp(),
        ], $tableOptions);

        $this->createTable('{{%attachment_access}}', [
            'id' => $this->primaryKey(),
            'attachment_id' => $this->integer(),
            'viewable_by' => $this->integer(),
            'downloadable_by' => $this->integer(),

            'status' => $this->smallInteger()->defaultValue(10),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'created_by' => $this->timestamp(),
            'updated_by' => $this->timestamp(),
            'deleted_by' => $this->timestamp(),
        ], $tableOptions);

        $this->createTable('{{%attachment}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'description' => $this->string(),
            'file_path' => $this->string(),

            'status' => $this->smallInteger()->defaultValue(10),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'created_by' => $this->timestamp(),
            'updated_by' => $this->timestamp(),
            'deleted_by' => $this->timestamp(),
        ], $tableOptions);

        $this->createTable('{{%efeis}}', [
            'id' => $this->primaryKey(),
            'company_id' => $this->integer(),
            'location_id' => $this->integer(),
            'total' => $this->integer(),
            'total_by_level' => $this->integer(),
            'type_fe' => $this->integer(),
            'efies_no' => $this->integer(),
            'efies_expired' => $this->date(),
            'cylinder_expired' => $this->integer(),
            'last_date_service' => $this->date(),
            'next_date_service' => $this->date(),
            'replacement_type' => $this->integer(),

            'status' => $this->smallInteger()->defaultValue(10),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'created_by' => $this->timestamp(),
            'updated_by' => $this->timestamp(),
            'deleted_by' => $this->timestamp(),
        ], $tableOptions);

        $this->createTable('{{%fe_type}}', [
            'id' => $this->primaryKey(),
            'class' => $this->string(),

            'status' => $this->smallInteger()->defaultValue(10),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'created_by' => $this->timestamp(),
            'updated_by' => $this->timestamp(),
            'deleted_by' => $this->timestamp(),
        ], $tableOptions);

        $this->createTable('{{%fe_status}}', [
            'id' => $this->primaryKey(),
            'class' => $this->string(),

            'status' => $this->smallInteger()->defaultValue(10),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'created_by' => $this->timestamp(),
            'updated_by' => $this->timestamp(),
            'deleted_by' => $this->timestamp(),
        ], $tableOptions);

        $this->createTable('{{%replacement_type}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),

            'status' => $this->smallInteger()->defaultValue(10),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'created_by' => $this->timestamp(),
            'updated_by' => $this->timestamp(),
            'deleted_by' => $this->timestamp(),
        ], $tableOptions);

        $this->createTable('{{%service_status}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),

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
