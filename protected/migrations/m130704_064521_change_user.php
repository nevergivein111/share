<?php

class m130704_064521_change_user extends CDbMigration
{
	public function up()
	{
		$this->dropColumn('user',"username");
		$this->dropColumn('user',"firstname");
		$this->dropColumn('user',"lastname");
		$this->dropColumn('user',"email");
		$this->addColumn('user',"firstname","VARCHAR(50) NOT NULL AFTER password");
		$this->addColumn('user',"lastname","VARCHAR(50) NOT NULL AFTER firstname");
		$this->addColumn('user',"email","VARCHAR(50) NOT NULL AFTER id");
	}

	public function down()
	{
		echo "m130704_064521_change_user does not support migration down.\n";
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