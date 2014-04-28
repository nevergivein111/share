<?php

class m130806_131335_add_combine_field_in_category extends CDbMigration
{
	public function up()
	{
		$this->addColumn('category',"combine_category_id","int(11) NULL AFTER category_id");
		$this->addForeignKey('fk_category_combine_1','category','combine_category_id','category','id','CASCADE','CASCADE');
	}

	public function down()
	{
		echo "m130806_131335_add_combine_field_in_category does not support migration down.\n";
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