<?php

class m130925_120656_change_table_filter_value extends CDbMigration
{
	public function up()
	{
		$this->dropColumn('filter_value', 'slug');
		$this->addColumn('filter_value', 'unique_id', 'INT(11) NOT NULL after filter_id');
		$this->addForeignKey('fk_filter_value_unique','filter_value','unique_id','unique_product_attribute','id','CASCADE','CASCADE');
	}

	public function down()
	{
		echo "m130925_120656_change_table_filter_value does not support migration down.\n";
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