<?php

class m130715_123705_add_status_to_user extends CDbMigration
{
	public function up()
	{
		$this->dropColumn('user',"delete_date");
		$this->addColumn('user',"status","tinyint(4) NULL AFTER birthday");
	}

	public function down()
	{
		echo "m130715_123705_add_status_to_user does not support migration down.\n";
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