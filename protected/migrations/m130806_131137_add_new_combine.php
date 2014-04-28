<?php

class m130806_131137_add_new_combine extends CDbMigration
{
	public function up()
	{
		$this->dropTable('combine_category');
		$this->dropTable('combine');

	}

	public function down()
	{
		echo "m130806_131137_add_new_combine does not support migration down.\n";
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