<?php

class m130816_073225_add_product_fields extends CDbMigration
{
	public function up()
	{
		$this->addColumn('product',"model","varchar(100) NULL AFTER slug");
		$this->addColumn('product',"upc","varchar(100) NULL AFTER model");
	}

	public function down()
	{
		echo "m130816_073225_add_product_fields does not support migration down.\n";
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