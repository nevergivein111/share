<?php

class m130909_121254_add_column_view extends CDbMigration
{
	public function up()
	{
		$this->addColumn('view_review', 'is_view','tinyint(4) NOT NULL AFTER status');
		$this->addColumn('review_comment', 'status','tinyint(4) NOT NULL AFTER comment');
	}

	public function down()
	{
		echo "m130909_121254_add_column_view does not support migration down.\n";
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