<?php

class m130709_103337_add_category_image extends CDbMigration
{
	public function up()
	{
		$this->dropColumn('category',"image");
		$this->addColumn('category',"image","VARCHAR(100) NULL AFTER name");
	}

	public function down()
	{
		echo "m130709_103337_add_category_image does not support migration down.\n";
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