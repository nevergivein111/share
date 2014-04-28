<?php

class m140102_093623_remove_invalid_product_reviews extends CDbMigration
{
	public function up()
	{
		$this->update('review_product', array('text' => '<p>test test</p>'), "text RLIKE '<[^p/]' OR text RLIKE '<p[^>]'");
	}

	public function down()
	{
		echo "m140102_093623_remove_invalid_product_reviews does not support migration down.\n";
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