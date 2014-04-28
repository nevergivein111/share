<?php

class m130712_070554_remove_user_field extends CDbMigration
{
	public function up()
	{
		$this->dropColumn('user',"state");
		$this->dropColumn('user',"address");
		$this->dropColumn('user',"city");
	}

	public function down()
	{
		echo "m130712_070554_remove_user_field does not support migration down.\n";
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