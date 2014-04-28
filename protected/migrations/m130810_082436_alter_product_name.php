<?php

class m130810_082436_alter_product_name extends CDbMigration
{
	public function up()
	{
		$this->alterColumn('product','name','varchar(150) NOT NULL');
	}

	public function down()
	{
		echo "m130810_082436_alter_product_name does not support migration down.\n";
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