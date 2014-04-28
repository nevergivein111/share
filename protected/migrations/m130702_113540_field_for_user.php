<?php

class m130702_113540_field_for_user extends CDbMigration
{
	public function up()
	{
		$this->addColumn('user',"firstname","VARCHAR(50) NULL AFTER email");
		$this->addColumn('user',"lastname","VARCHAR(50) NULL AFTER firstname");
		$this->addColumn('user',"image","VARCHAR(100) NULL AFTER lastname");
		$this->addColumn('user',"create_date","DATETIME NOT NULL AFTER last_login");
		$this->addColumn('user',"delete_date","DATETIME NULL AFTER create_date");
	}

	public function down()
	{
		echo "m130702_113540_field_for_user does not support migration down.\n";
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