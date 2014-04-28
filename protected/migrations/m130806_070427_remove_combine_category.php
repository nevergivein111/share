<?php

class m130806_070427_remove_combine_category extends CDbMigration
{
	public function up()
	{
		$this->dropForeignKey('fk_combine_category_id', 'category');
		$this->dropColumn('category',"combine_category_id");
	}

	public function down()
	{
		echo "m130806_070427_remove_combine_category does not support migration down.\n";
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