<?php

class m130820_135600_add_view_status extends CDbMigration
{
	public function up()
	{
		$this->renameTable('last_view','view_review');

		$this->addColumn('view_review', 'status', 'tinyint(3) NOT NULL AFTER review_product_id');
	}

	public function down()
	{
		echo "m130820_135600_add_view_status does not support migration down.\n";
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