<?php

class m130805_112337_add_combine_to_category extends CDbMigration
{
	public function up()
	{
		$this->addColumn('category', "combine_category_id", "int(11) NULL AFTER category_id");
		$this->addForeignKey('fk_combine_category_id','category','combine_category_id','category','id','CASCADE','CASCADE');
	}

	public function down()
	{
		echo "m130805_112337_add_combine_to_category does not support migration down.\n";
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