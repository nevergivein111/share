<?php

class m130708_084804_remove_name_sluf_from_category extends CDbMigration
{
	public function up()
	{
		$this->dropColumn('category',"name_slug");
	}

	public function down()
	{
		echo "m130708_084804_remove_name_sluf_from_category does not support migration down.\n";
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