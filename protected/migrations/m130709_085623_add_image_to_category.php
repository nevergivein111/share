<?php

class m130709_085623_add_image_to_category extends CDbMigration
{
	public function up()
	{
		$this->addColumn('category',"image","VARCHAR(100) NOT NULL AFTER name");
	}

	public function down()
	{
		echo "m130709_085623_add_image_to_category does not support migration down.\n";
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