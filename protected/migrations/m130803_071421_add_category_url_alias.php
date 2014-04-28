<?php

class m130803_071421_add_category_url_alias extends CDbMigration
{
	public function up()
	{
		$this->addColumn('category',"alias","VARCHAR(255) DEFAULT NULL AFTER name");
		$this->addColumn('product', "alias","VARCHAR(255) DEFAULT NULL AFTER name");
	}

	public function down()
	{
		echo "m130803_071421_add_category_url_alias does not support migration down.\n";
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