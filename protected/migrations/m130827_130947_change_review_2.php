<?php

class m130827_130947_change_review_2 extends CDbMigration
{
	public function up()
	{
		$this->addColumn("review_product","status", "tinyint(4) null after text");
	}

	public function down()
	{
		echo "m130827_130947_change_review_2 does not support migration down.\n";
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