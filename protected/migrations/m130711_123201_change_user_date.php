<?php

class m130711_123201_change_user_date extends CDbMigration
{
	public function up()
	{
		$this->dropColumn('user',"create_date");
		$this->addColumn('user',"create_date","datetime NULL AFTER last_login");
		$this->addColumn('user',"update_date","datetime NULL AFTER create_date");
	}

	public function down()
	{
		echo "m130711_123201_change_user_date does not support migration down.\n";
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