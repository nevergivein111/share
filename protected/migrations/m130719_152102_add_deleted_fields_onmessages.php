<?php

class m130719_152102_add_deleted_fields_onmessages extends CDbMigration
{
	public function up()
	{
        $this->addColumn('message',"is_deleted","tinyint(1) NOT NULL DEFAULT 0 AFTER status");
        $this->addColumn('message',"delete_date","datetime  AFTER is_deleted");

        $this->addColumn('user',"is_deleted","tinyint(1) NOT NULL DEFAULT 0 AFTER status");
        $this->addColumn('user',"delete_date","datetime  AFTER is_deleted");

	}

	public function down()
	{
		echo "m130719_152102_add_deleted_fields_onmessages does not support migration down.\n";
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}