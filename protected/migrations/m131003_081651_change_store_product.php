<?php

class m131003_081651_change_store_product extends CDbMigration
{
	public function up()
	{
		$this->alterColumn('store_product_info', 'price', 'decimal(6,2) NOT NULL');
	}

	public function down()
	{
		echo "m131003_081651_change_store_product does not support migration down.\n";
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