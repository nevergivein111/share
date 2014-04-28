<?php

class m130805_063056_add_order_to_categories extends CDbMigration
{
	public function up()
	{
		$this->addColumn('category',"ordering","int(11) default 1 AFTER status");
	}

	public function down()
	{
		echo "m130805_063056_add_order_to_categories does not support migration down.\n";
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