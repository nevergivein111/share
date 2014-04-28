<?php

class m130925_084545_change_filter extends CDbMigration
{
	public function up()
	{
		$this->dropColumn('filter','name');
		$this->dropColumn('filter_value', 'value');
		$this->addColumn('filter_value', 'name', "varchar(255) NOT NULL");
	   $this->addColumn('filter_value', 'slug', "varchar(255) NOT NULL");
	}

	public function down()
	{
		echo "m130925_084545_change_filter does not support migration down.\n";
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