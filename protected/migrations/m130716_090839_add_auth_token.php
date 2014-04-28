<?php

class m130716_090839_add_auth_token extends CDbMigration
{
	public function up()
	{
		$this->addColumn('user',"auth_token","VARCHAR(100) NULL AFTER birthday");
	}

	public function down()
	{
		echo "m130716_090839_add_auth_token does not support migration down.\n";
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