<?php

class m131220_130148_remove_invalid_product_reviews extends CDbMigration
{
	public function up()
	{
		$this->delete('review_product', 'text LIKE "%<div%"');
		$this->delete('review_product', 'text LIKE "%&lt;div%"');
		$this->delete('review_product', 'text LIKE "%<a%"');
		$this->delete('review_product', 'text LIKE "%&lt;a%"');
		$this->delete('review_product', 'text LIKE "%<img%"');
		$this->delete('review_product', 'text LIKE "%&lt;img%"');
		$this->delete('review_product', 'text LIKE "%<table%"');
		$this->delete('review_product', 'text LIKE "%&lt;table%"');
		$this->delete('review_product', 'text LIKE "%<h%"');
		$this->delete('review_product', 'text LIKE "%&lt;h%"');
		$this->delete('review_product', 'text LIKE "%background%"');
	}

	public function down()
	{
		echo "m131220_130148_remove_invalid_product_reviews does not support migration down.\n";
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