<?php

class m130719_132106_add_deleted_fields extends CDbMigration
{
	public function up()
	{
        $this->addColumn('product',"is_deleted","tinyint(1) NOT NULL DEFAULT 0 AFTER brand_id");
        $this->addColumn('product',"delete_date","datetime  AFTER is_deleted");

        $this->addColumn('category',"is_deleted","tinyint(1) NOT NULL DEFAULT 0 AFTER status");
        $this->addColumn('category',"delete_date","datetime  AFTER is_deleted");

        $this->addColumn('brand',"is_deleted","tinyint(1) NOT NULL DEFAULT 0 AFTER status");
        $this->addColumn('brand',"delete_date","datetime  AFTER is_deleted");
	}

	public function down()
	{
		echo "m130719_132106_add_deleted_fields does not support migration down.\n";
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