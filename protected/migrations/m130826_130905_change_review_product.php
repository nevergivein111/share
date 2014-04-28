<?php

class m130826_130905_change_review_product extends CDbMigration
{
	public function up()
	{
		$this->dropColumn("review_product", "pros");
		$this->dropColumn("review_product", "cons");
		$this->dropColumn("review_product", "title");
		$this->addColumn("review_product", "text","text after product_id");
	}

	public function down()
	{
		echo "m130826_130905_change_review_product does not support migration down.\n";
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